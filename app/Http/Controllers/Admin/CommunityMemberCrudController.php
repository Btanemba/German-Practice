<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommunityMemberRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommunityMemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommunityMemberCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CommunityMember::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/community-member');
        CRUD::setEntityNameStrings('community member', 'community members');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
                          
    {
        CRUD::setValidation(CommunityMemberRequest::class);

        CRUD::addField([
            'name' => 'first_name',
            'label' => 'First name',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        CRUD::addField([
            'name' => 'last_name',
            'label' => 'Last name',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

       
        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        CRUD::addField([
            'name' => 'phone_number',
            'label' => 'Phone number',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

       
        CRUD::addField([
            'name' => 'postal_code',
            'label' => 'Postal code',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
        ]);
        CRUD::addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
        ]);
        CRUD::addField([
            'name' => 'house_number',
            'label' => 'House number',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
        ]);
        CRUD::addField([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
        ]);
        CRUD::addField([
            'name' => 'country',
            'label' => 'Country',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
        ]);
          CRUD::addField([
                'name' => 'gender',
                'label' => 'Gender',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ]);
            CRUD::addField([
                'name' => 'date_of_birth',
                'label' => 'Date of birth',
                'type' => 'date',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
            ]);
            CRUD::addField([
                    'name' => 'subscription_model',
                    'label' => 'Subscription model',
                    'type' => 'select_from_array',
                    'options' => [
                        '1_month' => 'Monthly',
                        '3_month' => '3 Months',
                        '6_month' => '6 Months',
                        '1_year' => 'Yearly',
                    ],
                    'allows_null' => true,
                    'default' => '1_month',
                    'wrapper' => [
                        'class' => 'form-group col-md-12'
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
}
