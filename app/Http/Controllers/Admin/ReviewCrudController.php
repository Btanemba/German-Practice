<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Review;

class ReviewCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel(Review::class);
        CRUD::setRoute(config('backpack.base.route_prefix', 'admin') . '/review');
        CRUD::setEntityNameStrings('review', 'reviews');
    }

    public function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'first_name',
            'label' => 'First Name',
            'type' => 'text',
        ]);

        CRUD::addColumn([
            'name' => 'last_name',
            'label' => 'Last Name',
            'type' => 'text',
        ]);

        CRUD::addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);

        CRUD::addColumn([
            'name' => 'review_text',
            'label' => 'Review',
            'type' => 'text',
            'limit' => 100,
        ]);

        CRUD::addColumn([
            'name' => 'is_approved',
            'label' => 'Status',
            'type' => 'boolean',
            'closure' => function ($value, $row) {
                return $row->is_approved ? '<span class="badge bg-success">Approved</span>' : '<span class="badge bg-warning">Pending</span>';
            },
        ]);

        CRUD::addColumn([
            'name' => 'created_at',
            'label' => 'Submitted',
            'type' => 'datetime',
        ]);
    }

    public function setupUpdateOperation()
    {
        CRUD::setValidation([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'review_text' => 'required|string|min:10|max:1000',
            'is_approved' => 'required|boolean',
        ]);

        CRUD::addField([
            'name' => 'first_name',
            'label' => 'First Name',
            'type' => 'text',
            'disabled' => true,
        ]);

        CRUD::addField([
            'name' => 'last_name',
            'label' => 'Last Name',
            'type' => 'text',
            'disabled' => true,
        ]);

        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'disabled' => true,
        ]);

        CRUD::addField([
            'name' => 'review_text',
            'label' => 'Review',
            'type' => 'textarea',
            'disabled' => true,
        ]);

        CRUD::addField([
            'name' => 'is_approved',
            'label' => 'Approve',
            'type' => 'checkbox',
        ]);
    }

    public function toggleApprove($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = !$review->is_approved;
        $review->save();

        return redirect()->back()->with('success', 'Review status updated');
    }
}
