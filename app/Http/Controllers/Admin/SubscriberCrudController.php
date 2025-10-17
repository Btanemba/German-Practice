<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubscriberRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SubscriberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SubscriberCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Subscriber::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/subscriber');
        CRUD::setEntityNameStrings('subscriber', 'subscribers');

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
          $this->crud->removeButton('show');
        $this->crud->removeButton('update');
        // Add a nice "Send Newsletter" button at the top
        $this->crud->addButtonFromView('top', 'send_newsletter', 'send_newsletter', 'beginning');

        // Email Column
        CRUD::column('email')
            ->label('Email Address')
            ->type('email')
            ->limit(40)
            ->suffix('<i class="la la-envelope text-primary ml-2"></i>')
            ->escaped(false);

        // Subscribed Status with Badge
        CRUD::addColumn([
            'name'  => 'subscribed',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [0 => 'Unsubscribed', 1 => 'Active'],
            'wrapper' => [
                'element' => 'span',
                'class' => fn ($crud, $column, $entry, $related_key) =>
                    $entry->subscribed ? 'badge bg-success' : 'badge bg-danger',
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
        CRUD::setValidation(SubscriberRequest::class);
        CRUD::setFromDb();


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
