<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EventCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EventCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

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
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    // protected function setupListOperation()
    // {
    //     CRUD::setFromDb(); // set columns from db columns.

    //     /**
    //      * Columns can be defined using the fluent syntax:
    //      * - CRUD::column('price')->type('number');
    //      */
    // }

    protected function setupListOperation()
    {
          $this->crud->removeButton('show');
        // Event Image
        CRUD::addColumn([
            'name'  => 'image',
            'label' => 'Image',
            'type'  => 'image',
            'prefix' => 'storage/',
            'height' => '60px',
            'width'  => '80px',
        ]);

        // Event Title
        CRUD::addColumn([
            'name'  => 'title',
            'label' => 'Title',
            'type'  => 'text',
            'limit' => 50,
        ]);

        // Event Date (formatted + badge)
        CRUD::addColumn([
            'name'  => 'event_date',
            'label' => 'Event Date',
            'type'  => 'date',
            'format' => 'MMMM DD, YYYY',
        ]);

        // Tag (colored badge)
        CRUD::addColumn([
            'name'  => 'tag',
            'label' => 'Tag',
            'type'  => 'text',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry) {
                    if (strtolower($entry->tag) == 'free') return 'badge bg-success';
                    if (strtolower($entry->tag) == 'paid') return 'badge bg-danger';
                    return 'badge bg-info';
                },
            ],
        ]);


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

        CRUD::addField([
            'name'  => 'title',
            'label' => 'Event Title',
            'type'  => 'text',
        ]);

        CRUD::addField([
            'name'  => 'event_date',
            'label' => 'Event Date',
            'type'  => 'date',
        ]);

        CRUD::addField([
            'name'  => 'tag',
            'label' => 'Tag',
            'type'  => 'text',
        ]);

        CRUD::addField([
            'name'   => 'image',
            'label'  => 'Event Image',
            'type'   => 'upload',
            'upload' => true,
            'disk'   => 'public',
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
}
