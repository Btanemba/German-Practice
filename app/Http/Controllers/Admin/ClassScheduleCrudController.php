<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClassScheduleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Carbon\Carbon;

class ClassScheduleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // Removed ShowOperation for cleaner interface

    public function setup()
    {
        CRUD::setModel(\App\Models\ClassSchedule::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/class-schedule');
        CRUD::setEntityNameStrings('class schedule', 'class schedules');

        // Remove show/preview button
        $this->crud->removeButton('show');
    }

    protected function setupListOperation()
    {
        // Order by date (upcoming first, then past) - SQLite compatible
        $today = Carbon::today()->format('Y-m-d');
        $this->crud->addClause('orderByRaw', "CASE WHEN date >= '{$today}' THEN 0 ELSE 1 END, date ASC");

        // Mobile-Optimized Class Card Layout
        CRUD::addColumn([
            'name' => 'class_card',
            'label' => 'German Class Details',
            'type' => 'closure',
            'function' => function ($entry) {
                $date = Carbon::parse($entry->date);
                $startTime = Carbon::parse($entry->start_time);
                $endTime = Carbon::parse($entry->end_time);
                $isUpcoming = $date->isFuture() || $date->isToday();
                $daysUntil = $isUpcoming ? $date->diffInDays(Carbon::now()) : null;

                // Get registration count
                $registrationCount = \App\Models\Registration::where('class_schedule_id', $entry->id)->count();

                // Level color coding
                $levelColors = [
                    'A1' => 'background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);',
                    'A2' => 'background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);',
                    'B1' => 'background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);',
                    'B2' => 'background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);',
                    'C1' => 'background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);',
                    'C2' => 'background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);'
                ];
                $levelStyle = $levelColors[$entry->level] ?? 'background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);';

                // Status badge
                $statusBadge = $isUpcoming
                    ? "<span style='background: #dcfce7; color: #166534; padding: 4px 8px; border-radius: 12px; font-size: 10px; font-weight: 600;'>✅ UPCOMING</span>"
                    : "<span style='background: #fef2f2; color: #991b1b; padding: 4px 8px; border-radius: 12px; font-size: 10px; font-weight: 600;'>📅 COMPLETED</span>";

                // Popularity badge
                $popularityBadge = '';
                if ($registrationCount >= 15) {
                    $popularityBadge = "<span style='background: #fef3c7; color: #92400e; padding: 2px 6px; border-radius: 8px; font-size: 9px; font-weight: 600; margin-left: 4px;'>🔥 FULL</span>";
                } elseif ($registrationCount >= 10) {
                    $popularityBadge = "<span style='background: #e0e7ff; color: #3730a3; padding: 2px 6px; border-radius: 8px; font-size: 9px; font-weight: 600; margin-left: 4px;'>👥 POPULAR</span>";
                }

                // Duration calculation
                $duration = $startTime->diffInMinutes($endTime);
                $durationText = $duration >= 60 ? ($duration / 60) . 'h' : $duration . 'min';

                return "
                <div style='
                    width: 100%;
                    max-width: 100%;
                    padding: 12px;
                    background: linear-gradient(135deg, #fef7ff 0%, #f3e8ff 100%);
                    border-radius: 12px;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                    margin-bottom: 8px;
                '>
                    <!-- Header Section -->
                    <div style='display: flex; align-items: center; gap: 10px; margin-bottom: 10px;'>
                        <!-- Level Badge - Smaller for mobile -->
                        <div style='
                            flex-shrink: 0;
                            width: 50px;
                            height: 50px;
                            {$levelStyle}
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-weight: 800;
                            font-size: 14px;
                            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
                        '>
                            {$entry->level}
                        </div>

                        <!-- Title and Status -->
                        <div style='flex-grow: 1; min-width: 0;'>
                            <div style='font-weight: 700; color: #1e293b; font-size: 14px; margin-bottom: 4px;'>
                                Level {$entry->level} Class
                            </div>
                            <div style='display: flex; align-items: center; gap: 4px; flex-wrap: wrap;'>
                                {$statusBadge}
                                {$popularityBadge}
                            </div>
                        </div>
                    </div>

                    <!-- Date and Time Section -->
                    <div style='margin-bottom: 10px;'>
                        <div style='display: flex; align-items: center; gap: 6px; margin-bottom: 4px;'>
                            <span style='font-size: 12px;'>📅</span>
                            <span style='color: #475569; font-size: 12px; font-weight: 600;'>{$date->format('D, M d, Y')}</span>
                        </div>

                        <div style='display: flex; align-items: center; gap: 15px; flex-wrap: wrap;'>
                            <div style='display: flex; align-items: center; gap: 4px;'>
                                <span style='font-size: 12px;'>⏰</span>
                                <span style='color: #475569; font-size: 11px; font-weight: 600;'>{$startTime->format('H:i')}-{$endTime->format('H:i')}</span>
                            </div>

                            <div style='display: flex; align-items: center; gap: 4px;'>
                                <span style='font-size: 12px;'>⌛</span>
                                <span style='color: #475569; font-size: 11px; font-weight: 600;'>{$durationText}</span>
                            </div>

                            " . ($daysUntil !== null && $daysUntil <= 7 ? "
                            <div style='display: flex; align-items: center; gap: 4px;'>
                                <span style='font-size: 12px;'>🎯</span>
                                <span style='color: #7c2d12; font-size: 11px; font-weight: 600;'>{$daysUntil}d to go</span>
                            </div>
                            " : "") . "
                        </div>
                    </div>

                    <!-- Stats Section -->
                    <div style='display: flex; align-items: center; gap: 8px; flex-wrap: wrap;'>
                        <div style='
                            background: white;
                            padding: 4px 8px;
                            border-radius: 6px;
                            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
                            flex-shrink: 0;
                        '>
                            <span style='color: #059669; font-weight: 600; font-size: 11px;'>👥 {$registrationCount}</span>
                        </div>

                        <div style='
                            background: white;
                            padding: 4px 8px;
                            border-radius: 6px;
                            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
                            flex-shrink: 0;
                        '>
                            <span style='color: #7c3aed; font-weight: 600; font-size: 11px;'>🎓 {$entry->level}</span>
                        </div>

                        <!-- Capacity Bar -->
                        <div style='flex-grow: 1; min-width: 80px;'>
                            <div style='background: #f3f4f6; height: 4px; border-radius: 2px; overflow: hidden;'>
                                <div style='background: " . ($registrationCount >= 18 ? '#dc2626' : ($registrationCount >= 15 ? '#f59e0b' : '#059669')) . "; height: 100%; width: " . (($registrationCount / 20) * 100) . "%; transition: width 0.3s ease;'></div>
                            </div>
                            <div style='font-size: 9px; color: #6b7280; margin-top: 2px; text-align: right;'>{$registrationCount}/20</div>
                        </div>
                    </div>
                </div>";
            },
            'escaped' => false,
        ]);

        // Remove the stats column for mobile - everything is in one card now
        // Enable bulk actions for modern management
        $this->crud->enableBulkActions();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ClassScheduleRequest::class);

        // Modern form styling
        CRUD::addField([
            'name' => 'level',
            'label' => '🎓 German Level',
            'type' => 'select_from_array',
            'options' => [
                'A1' => '🟢 A1 - Beginner',
                'A2' => '🔵 A2 - Elementary',
                'B1' => '🟡 B1 - Intermediate',
                'B2' => '🔴 B2 - Upper Intermediate',
                
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        CRUD::addField([
            'name' => 'topic',
            'label' => '📚 Class Topic',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'e.g., Introduction to German Grammar, Conversational Practice...',
                'class' => 'form-control',
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        CRUD::addField([
            'name' => 'image',
            'label' => '🖼️ Class Image (Optional)',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
            'hint' => 'Upload an image for this class (optional)',
        ]);

        CRUD::addField([
            'name' => 'cost',
            'label' => '💰 Class Cost (€)',
            'type' => 'number',
            'attributes' => [
                'step' => '0.01',
                'min' => '0',
                'placeholder' => '0.00',
                'class' => 'form-control',
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
            'hint' => 'Leave empty or set to 0 for free classes',
        ]);

        CRUD::addField([
            'name' => 'date',
            'label' => '📅 Class Date',
            'type' => 'date',
            'attributes' => [
                'min' => Carbon::today()->format('Y-m-d'), // Prevent past dates
                'class' => 'form-control',
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        CRUD::addField([
            'name' => 'start_time',
            'label' => '🕐 Start Time',
            'type' => 'time',
            'attributes' => [
                'class' => 'form-control',
                'step' => '300', // 5-minute intervals
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        CRUD::addField([
            'name' => 'end_time',
            'label' => '🕕 End Time',
            'type' => 'time',
            'attributes' => [
                'class' => 'form-control',
                'step' => '300', // 5-minute intervals
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        // Add description field for class details (if you have this column)
        CRUD::addField([
            'name' => 'description',
            'label' => '📝 Class Description (Optional)',
            'type' => 'textarea',
            'attributes' => [
                'placeholder' => 'Describe what will be covered in this class session...',
                'rows' => 3,
                'class' => 'form-control',
            ],
        ]);

        // Remove the invalid methods
        // CRUD::field('recurrence'); // Remove this if not needed
        // CRUD::field('tags'); // Remove this if not needed
        // $this->crud->setCreateContentClass('col-md-12'); // This might not be needed
        // $this->crud->setCreateContentStyle('...'); // Remove this - it doesn't exist
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
