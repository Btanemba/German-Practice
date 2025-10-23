<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Carbon\Carbon;

class EventCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/event');
        CRUD::setEntityNameStrings('event', 'events');

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
        // Delete expired events before showing the list
        \App\Models\Event::whereDate('event_date', '<', Carbon::today())->delete();

        // Order by date (newest first)
        $this->crud->addClause('orderBy', 'event_date', 'desc');

        // Modern Event Card Layout
        CRUD::addColumn([
            'name' => 'event_card',
            'label' => 'Event Details',
            'type' => 'closure',
            'function' => function ($entry) {
                $date = Carbon::parse($entry->event_date);
                $isUpcoming = $date->isFuture();
                $daysUntil = $isUpcoming ? $date->diffInDays(Carbon::now()) : null;

                // Tag styling
                $tagColors = [
                    'free' => 'background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);',
                    'paid' => 'background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);',
                    'premium' => 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);'
                ];
                $tagStyle = $tagColors[strtolower($entry->tag)] ?? 'background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);';

                // Status badge
                $statusBadge = $isUpcoming
                    ? "<span style='background: #e6fffa; color: #065f46; padding: 4px 8px; border-radius: 12px; font-size: 10px; font-weight: 600;'>✅ UPCOMING</span>"
                    : "<span style='background: #fef2f2; color: #991b1b; padding: 4px 8px; border-radius: 12px; font-size: 10px; font-weight: 600;'>📅 PAST</span>";

                $imageUrl = $entry->image ? asset('storage/' . $entry->image) : asset('images/default-event.jpg');

                return "
                <div style='display: flex; align-items: center; gap: 15px; padding: 12px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;'>
                    <!-- Event Image -->
                    <div style='flex-shrink: 0;'>
                        <img src='{$imageUrl}'
                             style='width: 80px; height: 80px; border-radius: 12px; object-fit: cover; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'
                             alt='Event Image'>
                    </div>

                    <!-- Event Info -->
                    <div style='flex-grow: 1;'>
                        <div style='display: flex; align-items: center; gap: 8px; margin-bottom: 6px;'>
                            <h6 style='margin: 0; font-weight: 600; color: #1a202c; font-size: 16px;'>{$entry->title}</h6>
                            {$statusBadge}
                        </div>

                        <div style='display: flex; align-items: center; gap: 15px; margin-bottom: 8px;'>
                            <div style='display: flex; align-items: center; gap: 5px;'>
                                <span style='font-size: 12px;'>📅</span>
                                <span style='color: #4a5568; font-size: 13px; font-weight: 500;'>{$date->format('M d, Y')}</span>
                            </div>

                            " . ($daysUntil !== null ? "<div style='display: flex; align-items: center; gap: 5px;'>
                                <span style='font-size: 12px;'>⏰</span>
                                <span style='color: #4a5568; font-size: 13px;'>{$daysUntil} days to go</span>
                            </div>" : "") . "
                        </div>

                        <div>
                            <span style='{$tagStyle} color: white; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase;'>
                                " . ($entry->tag === 'free' ? '🆓' : ($entry->tag === 'paid' ? '💰' : '⭐')) . " {$entry->tag}
                            </span>
                        </div>
                    </div>
                </div>";
            },
            'escaped' => false,
        ]);

        // Quick Stats Column
        CRUD::addColumn([
            'name' => 'event_stats',
            'label' => 'Quick Info',
            'type' => 'closure',
            'function' => function ($entry) {
                $date = Carbon::parse($entry->event_date);
                $dayOfWeek = $date->format('l');
                $timeLeft = $date->isFuture() ? $date->diffForHumans() : $date->diffForHumans() . ' (past)';

                return "
                <div style='text-align: center; padding: 8px;'>
                    <div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px; border-radius: 12px; margin-bottom: 8px;'>
                        <div style='font-size: 24px; font-weight: 700; margin-bottom: 4px;'>{$date->format('d')}</div>
                        <div style='font-size: 12px; opacity: 0.9;'>{$date->format('M Y')}</div>
                    </div>
                    <div style='font-size: 11px; color: #4a5568; font-weight: 500;'>{$dayOfWeek}</div>
                    <div style='font-size: 10px; color: #718096; margin-top: 4px;'>{$timeLeft}</div>
                </div>";
            },
            'escaped' => false,
        ]);

        // Enable bulk actions for modern management
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
        CRUD::setValidation(EventRequest::class);

        // Modern form styling
        CRUD::addField([
            'name' => 'title',
            'label' => '📝 Event Title',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Enter a catchy event title...',
                'class' => 'form-control',
            ],
            'wrapper' => [
                'class' => 'form-group col-md-8'
            ],
        ]);

        CRUD::addField([
            'name' => 'tag',
            'label' => '🏷️ Event Tag',
            'type' => 'select_from_array',
            'options' => [
                'free' => '🆓 Free Event',
                'paid' => '💰 Paid Event',
                'premium' => '⭐ Premium Event',
                'workshop' => '🔧 Workshop',
                'webinar' => '💻 Webinar',
            ],
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
        ]);

        CRUD::addField([
            'name' => 'event_date',
            'label' => '📅 Event Date',
            'type' => 'date',
            'attributes' => [
                'min' => Carbon::today()->format('Y-m-d'), // Prevent past dates
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        CRUD::addField([
            'name' => 'image',
            'label' => '🖼️ Event Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        // Add description field for more details
        CRUD::addField([
            'name' => 'description',
            'label' => '📄 Event Description',
            'type' => 'textarea',
            'attributes' => [
                'placeholder' => 'Describe your event in detail...',
                'rows' => 4,
            ],
        ]);
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

    // Add custom method to get event statistics
    public function getEventStats()
    {
        $totalEvents = \App\Models\Event::count();
        $upcomingEvents = \App\Models\Event::whereDate('event_date', '>=', Carbon::today())->count();
        $freeEvents = \App\Models\Event::where('tag', 'free')->count();
        $paidEvents = \App\Models\Event::where('tag', 'paid')->count();

        return [
            'total' => $totalEvents,
            'upcoming' => $upcomingEvents,
            'free' => $freeEvents,
            'paid' => $paidEvents,
        ];
    }
}
