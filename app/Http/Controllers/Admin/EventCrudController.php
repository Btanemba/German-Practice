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
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/event');
        CRUD::setEntityNameStrings('event', 'events');
    }

    protected function setupListOperation()
    {

        CRUD::set('list.defaultPageLength', 10);

        CRUD::addColumn([
            'name' => 'event_card',
            'label' => 'Event Details',
            'type' => 'custom_html',
            'value' => function($entry) {
                $date = Carbon::parse($entry->event_date);
                $time = $entry->event_time ? Carbon::parse($entry->event_time)->format('H:i') : 'TBA';
                $registrationCount = $entry->getRegistrationCount();
                $remainingSpots = $entry->getRemainingSpots();
                $isFull = $entry->isFull();
                $capacityPercent = $entry->getCapacityPercentage();

                // Map URL (opens Google Maps in a new tab)
                $mapQuery = urlencode($entry->location ?? '');
                $mapUrl = $mapQuery ? "https://www.google.com/maps/search/?api=1&query={$mapQuery}" : null;

                // Status badge colors
                $statusBadge = $isFull ?
                    '<span class="badge badge-danger">🚫 FULL</span>' :
                    '<span class="badge badge-success">✅ AVAILABLE</span>';

                $tagColor = match($entry->tag) {
                    'free' => 'success',
                    'paid' => 'warning',
                    'premium' => 'info',
                    default => 'secondary'
                };

                return "
                <div class='event-card-modern' style='
                    background: linear-gradient(135deg, #fff 0%, #f8fafc 100%);
                    border-radius: 16px;
                    padding: 20px;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
                    border: 1px solid #e2e8f0;
                    transition: all 0.3s ease;
                    margin: 10px 0;
                '>
                    <div class='d-flex align-items-start justify-content-between'>
                        <!-- Event Image & Info -->
                        <div class='d-flex align-items-start'>
                            <div class='event-image-container me-3' style='position: relative;'>
                                " . ($entry->image ?
                                    "<img src='" . asset('storage/' . $entry->image) . "'
                                         style='width: 80px; height: 80px; object-fit: cover; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);'>" :
                                    "<div style='width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                               border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;'>🎯</div>"
                                ) . "
                                <div class='event-date-overlay' style='
                                    position: absolute;
                                    bottom: -8px;
                                    right: -8px;
                                    background: #3b82f6;
                                    color: white;
                                    border-radius: 8px;
                                    padding: 4px 8px;
                                    font-size: 10px;
                                    font-weight: 600;
                                    box-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
                                '>{$date->format('M d')}</div>
                            </div>

                            <!-- Event Details -->
                            <div class='event-info'>
                                <h5 class='mb-1' style='color: #1e293b; font-weight: 600; font-size: 1.1rem;'>
                                    {$entry->title}
                                </h5>
                                <div class='event-meta mb-2'>
                                    <small class='text-muted d-block'>
                                        <i class='la la-calendar me-1'></i>
                                        <span style='color: #374151; font-weight: 500; font-size: 14px;'>
                                            {$date->format('M d, Y')} " . ($entry->event_time ? 'at ' . $time : '') . "
                                        </span>
                                    </small>
                                    <small class='text-muted d-block'>
                                        <i class='la la-users me-1'></i>
                                        <span style='color: #6b7280;'>
                                            {$registrationCount}/{$entry->capacity} registered
                                        </span>
                                    </small>
                                </div>

                                <!-- Tags & Status -->
                                <div class='event-badges'>
                                    <span class='badge badge-{$tagColor} me-1' style='font-size: 11px;'>
                                        " . ucfirst($entry->tag ?? 'Event') . "
                                    </span>
                                    {$statusBadge}
                                    <span class='badge badge-light ms-1' style='font-size: 11px; color: #6b7280;'>
                                        {$remainingSpots} spots left
                                    </span>
                                    " . ($mapUrl ? "<a href='{$mapUrl}' target='_blank' class='ms-2 text-decoration-none' style='font-size:12px; color:#3b82f6;'><i class='la la-map-marker'></i> " . e($entry->location) . "</a>" : "") . "
                                </div>
                            </div>
                        </div>

                        <!-- Capacity Progress & Actions -->
                        <div class='event-actions text-end' style='min-width: 120px;'>
                            <!-- Capacity Progress -->
                            <div class='capacity-progress mb-2'>
                                <div class='progress' style='height: 6px; border-radius: 3px; background: #f1f5f9;'>
                                    <div class='progress-bar' style='
                                        width: {$capacityPercent}%;
                                        background: " . ($isFull ? '#ef4444' : ($capacityPercent > 75 ? '#f59e0b' : '#10b981')) . ";
                                        border-radius: 3px;
                                        transition: width 0.3s ease;
                                    '></div>
                                </div>
                                <small class='text-muted' style='font-size: 10px;'>{$capacityPercent}% full</small>
                            </div>

                            <!-- Action Buttons -->
                            <div class='btn-group-sm'>
                                <a href='" . url(config('backpack.base.route_prefix', 'admin') . '/event/' . $entry->id . '/show') . "'
                                   class='btn btn-sm btn-outline-primary me-1'
                                   style='border-radius: 8px; font-size: 11px; padding: 4px 8px;'>
                                    <i class='la la-eye'></i> View
                                </a>
                                <a href='" . url(config('backpack.base.route_prefix', 'admin') . '/event/' . $entry->id . '/edit') . "'
                                   class='btn btn-sm btn-outline-info'
                                   style='border-radius: 8px; font-size: 11px; padding: 4px 8px;'>
                                    <i class='la la-edit'></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Event Description Preview -->
                    " . ($entry->description ?
                        "<div class='event-description mt-3 pt-3' style='border-top: 1px solid #f1f5f9;'>
                            <p class='mb-0 text-muted' style='font-size: 13px; line-height: 1.4;'>
                                " . \Str::limit($entry->description, 120) . "
                            </p>
                        </div>" : ""
                    ) . "
                </div>";
            },
            'escaped' => false,
        ]);

        CRUD::orderBy('event_date', 'ASC');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(EventRequest::class);

        CRUD::addField([
            'name' => 'title',
            'label' => '📝 Event Title',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Enter a compelling event title...',
                'class' => 'form-control form-control-lg'
            ],
            'wrapper' => [
                'class' => 'form-group col-md-8'
            ],
        ]);

        CRUD::addField([
            'name' => 'capacity',
            'label' => '👥 Max Attendees',
            'type' => 'number',
            'attributes' => [
                'min' => 1,
                'max' => 1000,
                'step' => 1,
                'placeholder' => '50',
                'class' => 'form-control form-control-lg'
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
                'min' => date('Y-m-d'),
                'class' => 'form-control form-control-lg'
            ],
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
        ]);

        CRUD::addField([
            'name' => 'event_time',
            'label' => '🕐 Start Time',
            'type' => 'time',
            'attributes' => [
                'placeholder' => '14:00',
                'class' => 'form-control form-control-lg'
            ],
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
        ]);

        CRUD::addField([
            'name' => 'tag',
            'label' => '🏷️ Event Type',
            'type' => 'select_from_array',
            'options' => [
                'free' => '🆓 Free Event',
                'paid' => '💰 Paid Event',
                'premium' => '⭐ Premium Event',
            ],
            'attributes' => [
                'class' => 'form-control form-control-lg'
            ],
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
        ]);

        CRUD::addField([
            'name' => 'image',
            'label' => '🖼️ Event Cover Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ],
            'hint' => 'Recommended size: 1200x600px. Max size: 2MB. Formats: JPG, PNG, GIF'
        ]);
        
         // Location field (Google Maps link opens from list/show)
        CRUD::addField([
            'name' => 'location',
            'label' => '📍 Location (address or place)',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'e.g. 1600 Amphitheatre Pkwy, Mountain View, CA',
                'class' => 'form-control form-control-lg'
            ],
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ],
            'hint' => 'Enter an address or place. Click the location in the list or show view to open Google Maps.'
        ]);

        CRUD::addField([
            'name' => 'description',
            'label' => '📄 Event Description',
            'type' => 'textarea',
            'attributes' => [
                'placeholder' => 'Describe what attendees can expect from this event...',
                'rows' => 6,
                'class' => 'form-control'
            ],
        ]);

       
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        CRUD::addColumn([
            'name' => 'title',
            'label' => 'Event Title',
            'type' => 'text'
        ]);

        CRUD::addColumn([
            'name' => 'event_details',
            'label' => 'Event Details',
            'type' => 'custom_html',
            'value' => function($entry) {
                $date = Carbon::parse($entry->event_date);
                $time = $entry->event_time ? Carbon::parse($entry->event_time)->format('H:i') : 'TBA';
                $registrationCount = $entry->getRegistrationCount();
                $remainingSpots = $entry->getRemainingSpots();

                $mapQuery = urlencode($entry->location ?? '');
                $mapUrl = $mapQuery ? "https://www.google.com/maps/search/?api=1&query={$mapQuery}" : null;

                return "
                <div class='row'>
                    <div class='col-md-6'>
                        <strong>📅 Date:</strong> {$date->format('l, F j, Y')}<br>
                        <strong>🕐 Time:</strong> {$time}<br>
                        <strong>🏷️ Type:</strong> " . ucfirst($entry->tag ?? 'Event') . "
                        " . ($mapUrl ? "<div class='mt-2'><strong>📍 Location:</strong> <a href='{$mapUrl}' target='_blank'>" . e($entry->location) . "</a></div>" : "") . "
                    </div>
                    <div class='col-md-6'>
                        <strong>👥 Capacity:</strong> {$entry->capacity} people<br>
                        <strong>✅ Registered:</strong> {$registrationCount}<br>
                        <strong>🎯 Available:</strong> {$remainingSpots} spots
                    </div>
                </div>";
            },
            'escaped' => false
        ]);

        CRUD::addColumn([
            'name' => 'image',
            'label' => 'Event Image',
            'type' => 'image',
            'disk' => 'public'
        ]);

        CRUD::addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea'
        ]);
    }
}
