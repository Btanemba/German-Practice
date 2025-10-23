<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HangoutRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Carbon\Carbon;

class HangoutCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Hangout::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/hangout');
        CRUD::setEntityNameStrings('hangout', 'hangouts');

        // Remove show/preview button
        $this->crud->removeButton('show');
    }

    protected function setupListOperation()
    {
        // Order by date (upcoming first, then past) - SQLite compatible
        $today = Carbon::today()->format('Y-m-d');
        $this->crud->addClause('orderByRaw', "CASE WHEN date >= '{$today}' THEN 0 ELSE 1 END, date ASC");

        // Mobile-First Hangout Card Layout
        CRUD::addColumn([
            'name' => 'mobile_hangout_card',
            'label' => 'Coffee & Chat Details',
            'type' => 'closure',
            'function' => function ($entry) {
                $date = Carbon::parse($entry->date);
                $time = Carbon::parse($entry->time);
                $isUpcoming = $date->isFuture() || $date->isToday();
                $daysUntil = $isUpcoming ? $date->diffInDays(Carbon::now()) : null;

                // Get registration count
                $registrationCount = \App\Models\Registration::where('hangout_id', $entry->id)->count();

                // Status badge
                $statusBadge = $isUpcoming
                    ? "<span class='badge badge-success' style='font-size: 10px; padding: 4px 8px;'>✅ UPCOMING</span>"
                    : "<span class='badge badge-secondary' style='font-size: 10px; padding: 4px 8px;'>📅 PAST</span>";

                // Popularity indicator
                $popularityIcon = '';
                if ($registrationCount >= 10) {
                    $popularityIcon = "<span style='color: #dc2626; font-size: 12px;'>🔥</span>";
                } elseif ($registrationCount >= 5) {
                    $popularityIcon = "<span style='color: #f59e0b; font-size: 12px;'>👥</span>";
                }

                return "
                <div class='mobile-hangout-card' style='
                    width: 100%;
                    background: white;
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 16px;
                    margin-bottom: 12px;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                    transition: all 0.2s ease;
                '>
                    <!-- Header Row -->
                    <div style='display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;'>
                        <div style='display: flex; align-items: center; gap: 12px;'>
                            <!-- Coffee Icon -->
                            <div style='
                                width: 45px;
                                height: 45px;
                                background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
                                color: white;
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 20px;
                                flex-shrink: 0;
                                box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
                            '>
                                ☕
                            </div>

                            <!-- Title -->
                            <div>
                                <h6 style='margin: 0; font-weight: 600; color: #111827; font-size: 16px;'>
                                    Coffee & Chat
                                </h6>
                                <div style='font-size: 12px; color: #6b7280; margin-top: 2px;'>
                                    {$registrationCount} joined {$popularityIcon}
                                </div>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        {$statusBadge}
                    </div>

                    <!-- Date & Time Row -->
                    <div style='
                        background: #f0f9ff;
                        border-radius: 8px;
                        padding: 12px;
                        margin-bottom: 12px;
                        border-left: 4px solid #8b5cf6;
                    '>
                        <div style='display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;'>
                            <div style='display: flex; align-items: center; gap: 6px;'>
                                <span style='color: #374151; font-size: 14px;'>📅</span>
                                <span style='color: #374151; font-weight: 500; font-size: 14px;'>
                                    {$date->format('M d, Y')}
                                </span>
                            </div>

                            <div style='display: flex; align-items: center; gap: 6px;'>
                                <span style='color: #374151; font-size: 14px;'>⏰</span>
                                <span style='color: #374151; font-weight: 500; font-size: 14px;'>
                                    {$time->format('H:i')}
                                </span>
                            </div>

                            <div style='display: flex; align-items: center; gap: 6px;'>
                                <span style='color: #374151; font-size: 14px;'>🎪</span>
                                <span style='color: #374151; font-weight: 500; font-size: 14px;'>
                                    Casual
                                </span>
                            </div>
                        </div>

                        " . ($daysUntil !== null && $daysUntil <= 7 ? "
                        <div style='margin-top: 8px; text-align: center;'>
                            <span style='
                                background: #fef3c7;
                                color: #92400e;
                                padding: 4px 12px;
                                border-radius: 20px;
                                font-size: 11px;
                                font-weight: 600;
                            '>
                                🎯 {$daysUntil} days to go
                            </span>
                        </div>
                        " : "") . "
                    </div>

                    <!-- Attendance Info -->
                    <div style='margin-bottom: 8px;'>
                        <div style='display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;'>
                            <span style='font-size: 12px; color: #6b7280; font-weight: 500;'>Expected Attendance</span>
                            <span style='font-size: 12px; color: #6b7280; font-weight: 600;'>{$registrationCount}/20</span>
                        </div>
                        <div style='background: #f3f4f6; height: 6px; border-radius: 3px; overflow: hidden;'>
                            <div style='
                                background: " . ($registrationCount >= 15 ? '#dc2626' : ($registrationCount >= 10 ? '#f59e0b' : '#059669')) . ";
                                height: 100%;
                                width: " . (min(($registrationCount / 20) * 100, 100)) . "%;
                                transition: all 0.3s ease;
                                border-radius: 3px;
                            '></div>
                        </div>
                    </div>

                    <!-- Footer Info -->
                    <div style='display: flex; justify-content: space-between; align-items: center;'>
                        <div style='display: flex; align-items: center; gap: 8px;'>
                            <span style='
                                background: #f0f9ff;
                                color: #7c3aed;
                                padding: 4px 8px;
                                border-radius: 6px;
                                font-size: 11px;
                                font-weight: 600;
                            '>
                                ☕ Hangout
                            </span>
                            <span style='
                                background: #ecfdf5;
                                color: #059669;
                                padding: 4px 8px;
                                border-radius: 6px;
                                font-size: 11px;
                                font-weight: 600;
                            '>
                                👥 {$registrationCount} people
                            </span>
                        </div>
                        <span style='font-size: 11px; color: #9ca3af;'>{$date->diffForHumans()}</span>
                    </div>
                </div>

                <style>
                @media (max-width: 768px) {
                    .mobile-hangout-card:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                    }

                    /* Make sure cards take full width on mobile */
                    .table-responsive {
                        overflow-x: visible !important;
                    }

                    /* Hide table headers on mobile since we're using cards */
                    .table thead {
                        display: none;
                    }

                    .table td {
                        border: none !important;
                        padding: 0 !important;
                    }
                }

                @media (max-width: 576px) {
                    .mobile-hangout-card {
                        margin-left: -15px;
                        margin-right: -15px;
                        border-radius: 0 !important;
                        border-left: none !important;
                        border-right: none !important;
                    }
                }
                </style>
                ";
            },
            'escaped' => false,
        ]);

        // Enable bulk actions
        $this->crud->enableBulkActions();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(HangoutRequest::class);

        // Modern form styling
        CRUD::addField([
            'name' => 'date',
            'label' => '📅 Hangout Date',
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
            'name' => 'time',
            'label' => '⏰ Start Time',
            'type' => 'time',
            'attributes' => [
                'class' => 'form-control',
                'step' => '300', // 5-minute intervals
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    // Add method to get hangout statistics
    public function getHangoutStats()
    {
        $totalHangouts = \App\Models\Hangout::count();
        $upcomingHangouts = \App\Models\Hangout::whereDate('date', '>=', Carbon::today())->count();
        $totalParticipants = \App\Models\Registration::whereNotNull('hangout_id')->count();
        $avgParticipants = $totalHangouts > 0 ? round($totalParticipants / $totalHangouts, 1) : 0;

        return [
            'total' => $totalHangouts,
            'upcoming' => $upcomingHangouts,
            'participants' => $totalParticipants,
            'average' => $avgParticipants,
        ];
    }
}
