<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegistrationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RegistrationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RegistrationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Registration::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/registration');
        CRUD::setEntityNameStrings('registration', 'registrations');

        $this->crud->denyAccess('create');
        $this->crud->denyAccess('update'); // Disable edit functionality

        // Remove show/preview button
        $this->crud->removeButton('show');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->query->with(['hangout', 'classSchedule', 'eventRegistration']);

        // Enable search functionality including event titles
        $this->crud->addClause('where', function($query) {
            if (request()->has('search') && request('search')['value']) {
                $searchTerm = request('search')['value'];
                $query->where(function($q) use ($searchTerm) {
                    $q->where('first_name', 'like', '%'.$searchTerm.'%')
                      ->orWhere('last_name', 'like', '%'.$searchTerm.'%')
                      ->orWhere('email', 'like', '%'.$searchTerm.'%')
                      ->orWhere('type', 'like', '%'.$searchTerm.'%')
                      ->orWhere('city', 'like', '%'.$searchTerm.'%')
                      ->orWhere('phone', 'like', '%'.$searchTerm.'%')
                      // Search in event titles for hangout registrations
                      ->orWhereHas('eventRegistration', function($eventQuery) use ($searchTerm) {
                          $eventQuery->where('title', 'like', '%'.$searchTerm.'%');
                      })
                      // Search in class levels for class registrations
                      ->orWhereHas('classSchedule', function($classQuery) use ($searchTerm) {
                          $classQuery->where('level', 'like', '%'.$searchTerm.'%');
                      });
                });
            }
        });

        // Modern styling with custom CSS
        $this->crud->addClause('orderBy', 'created_at', 'desc');

        // Single column that shows everything - works on both desktop and mobile
        CRUD::addColumn([
            'name' => 'registration_card',
            'label' => 'Registration Details',
            'type' => 'closure',
            'function' => function ($entry) {
                $initials = strtoupper(substr($entry->first_name, 0, 1) . substr($entry->last_name, 0, 1));
                $colors = ['#667eea', '#764ba2', '#f093fb', '#f5576c', '#4facfe', '#00f2fe', '#43e97b', '#38f9d7'];
                $color = $colors[crc32($entry->email) % count($colors)];

                // Type configuration
                $typeConfig = [
                    'Classes' => ['color' => '#667eea', 'bg' => '#f0f9ff', 'icon' => '🎓', 'label' => 'Classes'],
                    'Hangout' => ['color' => '#059669', 'bg' => '#ecfdf5', 'icon' => '☕', 'label' => 'Hangout'],
                ];
                $config = $typeConfig[$entry->type] ?? ['color' => '#6b7280', 'bg' => '#f9fafb', 'icon' => '📝', 'label' => $entry->type];

                // Get details based on type
                $details = '';
                if ($entry->classSchedule) {
                    $level = $entry->classSchedule->level;
                    $date = \Carbon\Carbon::parse($entry->classSchedule->date)->format('M d, Y');
                    $time = $entry->classSchedule->start_time . '–' . $entry->classSchedule->end_time;
                    $details = "
                    <div style='background: {$config['bg']}; border-left: 3px solid {$config['color']}; border-radius: 6px; padding: 8px 10px; margin-top: 8px;'>
                        <div style='font-weight: 600; color: #1f2937; font-size: 12px; margin-bottom: 4px;'>📚 Level {$level}</div>
                        <div style='font-size: 11px; color: #6b7280; margin-bottom: 2px;'>📅 {$date}</div>
                        <div style='font-size: 11px; color: #6b7280;'>⏰ {$time}</div>
                    </div>";
                } elseif ($entry->type === 'Hangout' && $entry->eventRegistration) {
                    // For event registrations (hangout_id stores event_id)
                    $event = $entry->eventRegistration;
                    $date = \Carbon\Carbon::parse($event->event_date)->format('M d, Y');
                    $time = $event->event_time ? \Carbon\Carbon::parse($event->event_time)->format('H:i') : 'TBA';
                    $details = "
                    <div style='background: {$config['bg']}; border-left: 3px solid {$config['color']}; border-radius: 6px; padding: 8px 10px; margin-top: 8px;'>
                        <div style='font-weight: 600; color: #1f2937; font-size: 12px; margin-bottom: 4px;'>🎯 {$event->title}</div>
                        <div style='font-size: 11px; color: #6b7280; margin-bottom: 2px;'>📅 {$date}</div>
                        <div style='font-size: 11px; color: #6b7280;'>⏰ {$time}</div>
                    </div>";
                } elseif ($entry->hangout) {
                    // For old hangout system
                    $date = \Carbon\Carbon::parse($entry->hangout->date)->format('M d, Y');
                    $time = \Carbon\Carbon::parse($entry->hangout->time)->format('H:i');
                    $details = "
                    <div style='background: {$config['bg']}; border-left: 3px solid {$config['color']}; border-radius: 6px; padding: 8px 10px; margin-top: 8px;'>
                        <div style='font-weight: 600; color: #1f2937; font-size: 12px; margin-bottom: 4px;'>☕ Coffee Chat</div>
                        <div style='font-size: 11px; color: #6b7280; margin-bottom: 2px;'>📅 {$date}</div>
                        <div style='font-size: 11px; color: #6b7280;'>⏰ {$time}</div>
                    </div>";
                }

                $regDate = $entry->created_at->format('M d, Y');
                $regTime = $entry->created_at->format('H:i');
                $ago = $entry->created_at->diffForHumans();
                $isRecent = $entry->created_at->diffInDays(now()) <= 3;

                return "
                <div class='registration-card' style='
                    width: 100%;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 16px;
                    margin-bottom: 12px;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                '>
                    <!-- Header -->
                    <div style='display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;'>
                        <div style='display: flex; align-items: center; gap: 12px;'>
                            <div style='
                                width: 45px;
                                height: 45px;
                                border-radius: 50%;
                                background: {$color};
                                color: white;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-weight: 700;
                                font-size: 16px;
                                flex-shrink: 0;
                            '>{$initials}</div>
                            <div>
                                <h6 style='margin: 0; font-weight: 600; color: #111827; font-size: 15px;'>
                                    {$entry->first_name} {$entry->last_name}
                                </h6>
                                <div style='font-size: 12px; color: #6b7280; margin-top: 2px;'>
                                    📧 {$entry->email}
                                </div>
                            </div>
                        </div>
                        <span style='
                            background: {$config['color']};
                            color: white;
                            padding: 6px 10px;
                            border-radius: 12px;
                            font-size: 10px;
                            font-weight: 600;
                        '>{$config['icon']} {$config['label']}</span>
                    </div>

                    <!-- Details -->
                    {$details}

                    <!-- Footer -->
                    <div style='
                        background: #f9fafb;
                        border-radius: 8px;
                        padding: 10px;
                        margin-top: 12px;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    '>
                        <div>
                            <div style='font-size: 11px; color: #6b7280;'>Registered</div>
                            <div style='font-size: 12px; font-weight: 600; color: #374151;'>
                                {$regDate} at {$regTime}
                            </div>
                        </div>
                        <div style='text-align: right;'>
                            " . ($isRecent ? "<span style='background: #dcfce7; color: #166534; padding: 2px 6px; border-radius: 8px; font-size: 10px; font-weight: 600;'>✨ NEW</span><br>" : "") . "
                            <span style='font-size: 10px; color: #9ca3af;'>{$ago}</span>
                        </div>
                    </div>
                </div>
                ";
            },
            'escaped' => false,
        ]);

        // Modern Email Button
        CRUD::addButtonFromView('line', 'send_email', 'send_email_button', 'beginning');

        // Add custom CSS for modern look
        $this->crud->enableBulkActions();
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RegistrationRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    // Email sending method
    public function sendEmail($id)
    {
        $registration = \App\Models\Registration::findOrFail($id);

        return view('admin.send_email', [
            'registration' => $registration,
            'crud' => $this->crud
        ]);
    }

    // Process email sending
    public function processEmail($id, \Illuminate\Http\Request $request)
    {
        $registration = \App\Models\Registration::findOrFail($id);

        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            \Mail::to($registration->email)->send(new \App\Mail\ClientEmail(
                $registration,
                $request->subject,
                $request->message
            ));

            \Alert::success('Email sent successfully to ' . $registration->email)->flash();
        } catch (\Exception $e) {
            \Alert::error('Failed to send email: ' . $e->getMessage())->flash();
        }

        return redirect(url($this->crud->route));
    }
}
