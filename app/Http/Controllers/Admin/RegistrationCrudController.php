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
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

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
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

     $this->crud->query->with(['hangout', 'classSchedule']);
    CRUD::column('last_name')->label('Last Name');
    CRUD::column('email')->label('Email');


    CRUD::column('type')->label('Type');

    // 🟢 Show class schedule details clearly
    CRUD::addColumn([
        'name' => 'class_schedule_id',
        'label' => 'Class Details',
        'type' => 'closure',
        'function' => function ($entry) {
            if ($entry->classSchedule) {
                return "{$entry->classSchedule->level} | {$entry->classSchedule->date} ({$entry->classSchedule->start_time}–{$entry->classSchedule->end_time})";
            }
            return '-';
        },
    ]);

CRUD::addColumn([
    'name' => 'hangout_id',
    'label' => 'Hangout Details',
    'type' => 'closure',
    'function' => function ($entry) {
        if ($entry->hangout) {
            $date = \Carbon\Carbon::parse($entry->hangout->date)->format('M d, Y');
            $time = \Carbon\Carbon::parse($entry->hangout->time)->format('H:i');
            return "{$date} ({$time})";
        }
        return '-';
    },
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
}
