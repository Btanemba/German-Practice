<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PracticeMaterialRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PracticeMaterialCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PracticeMaterialCrudController extends CrudController
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
        CRUD::setModel(\App\Models\PracticeMaterial::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/practice-material');
        CRUD::setEntityNameStrings('practice material', 'practice materials');

        // Modern page styling
        CRUD::setHeading('🎯 Practice Materials');
        CRUD::setSubheading('Manage learning resources and study materials');

        // Add modern page styles
        CRUD::addButtonFromView('top', 'modern_page_styles', 'practice_material_modern_styles', 'beginning');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // Modern card-style columns with better visual hierarchy
        CRUD::addColumn([
            'name' => 'image_url',
            'label' => 'Preview',
            'type' => 'image',
            'height' => '60px',
            'width' => '60px',
        ]);

        CRUD::addColumn([
            'name' => 'title',
            'label' => 'Material Title',
            'type' => 'text',
            'wrapper' => [
                'style' => 'font-weight: 600; color: #1f2937; font-size: 16px;'
            ]
        ]);

        CRUD::addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'text',
            'limit' => 60,
            'wrapper' => [
                'style' => 'color: #6b7280; font-size: 14px; line-height: 1.4;'
            ]
        ]);

        CRUD::addColumn([
            'name' => 'cost',
            'label' => 'Price',
            'type' => 'closure',
            'function' => function($entry) {
                $cost = $entry->formatted_cost;
                $color = $entry->cost == 0 ? '#10b981' : '#3b82f6';
                $bg = $entry->cost == 0 ? '#ecfdf5' : '#eff6ff';
                return "<span style='background: {$bg}; color: {$color}; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 12px;'>{$cost}</span>";
            }
        ]);

        CRUD::addColumn([
            'name' => 'link',
            'label' => 'Link Status',
            'type' => 'closure',
            'function' => function($entry) {
                if ($entry->link) {
                    return "<span style='background: #dbeafe; color: #1d4ed8; padding: 4px 8px; border-radius: 6px; font-size: 11px; font-weight: 500;'>✓ Has Link</span>";
                }
                return "<span style='background: #f3f4f6; color: #6b7280; padding: 4px 8px; border-radius: 6px; font-size: 11px;'>No Link</span>";
            }
        ]);


        // Add modern styling to the list view
        CRUD::addButtonFromView('top', 'modern_create', 'practice_material_modern_create', 'beginning');

        // Add mobile responsive styling
        CRUD::addButtonFromView('top', 'mobile_responsive_styles', 'practice_material_mobile_simple', 'beginning');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PracticeMaterialRequest::class);

        // Basic Information Section
        CRUD::addField([
            'name' => 'basic_info_section',
            'type' => 'custom_html',
            'value' => '<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 12px; margin-bottom: 25px;">
                            <h3 style="margin: 0; font-size: 20px; font-weight: 600;">📚 Basic Information</h3>
                            <p style="margin: 8px 0 0 0; opacity: 0.9; font-size: 14px;">Enter the essential details for your practice material</p>
                        </div>'
        ]);

        CRUD::addField([
            'name' => 'title',
            'type' => 'text',
            'label' => '📝 Material Title',
            'attributes' => [
                'required' => true,
                'class' => 'form-control modern-input',
                'placeholder' => 'e.g., German Verbs Practice'
            ],
            'wrapper' => [
                'style' => 'margin-bottom: 20px;'
            ]
        ]);

        CRUD::addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => '📄 Description',
            'attributes' => [
                'rows' => 4,
                'class' => 'form-control modern-input',
                'placeholder' => 'Describe what students will learn from this material...'
            ],
            'hint' => 'Optional: Provide a detailed description to help students understand the content',
            'wrapper' => [
                'style' => 'margin-bottom: 30px;'
            ]
        ]);

        // Visual & Media Section
        CRUD::addField([
            'name' => 'media_section',
            'type' => 'custom_html',
            'value' => '<div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 20px; border-radius: 12px; margin-bottom: 25px;">
                            <h3 style="margin: 0; font-size: 20px; font-weight: 600;">🖼️ Visual Content</h3>
                            <p style="margin: 8px 0 0 0; opacity: 0.9; font-size: 14px;">Upload an engaging image to represent your material</p>
                        </div>'
        ]);

        CRUD::field('image')
            ->type('upload')
            ->label('📷 Practice Material Image')
            ->upload(true)
            ->disk('public')
            ->hint('Recommended: High-quality image (JPG, PNG) - max 2MB')
            ->wrapper(['style' => 'margin-bottom: 30px;']);

        // Pricing & Access Section
        CRUD::addField([
            'name' => 'pricing_section',
            'type' => 'custom_html',
            'value' => '<div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 20px; border-radius: 12px; margin-bottom: 25px;">
                            <h3 style="margin: 0; font-size: 20px; font-weight: 600;">💰 Pricing & Access</h3>
                            <p style="margin: 8px 0 0 0; opacity: 0.9; font-size: 14px;">Set the price and provide access link for your material</p>
                        </div>'
        ]);

        CRUD::addField([
            'name' => 'cost',
            'type' => 'number',
            'label' => '💶 Price (in Euros)',
            'attributes' => [
                'step' => '0.01',
                'min' => '0',
                'class' => 'form-control modern-input',
                'placeholder' => '0.00'
            ],
            'default' => 0,
            'hint' => 'Set to 0.00 for free materials',
            'prefix' => '€',
            'wrapper' => [
                'style' => 'margin-bottom: 20px;'
            ]
        ]);

        CRUD::addField([
            'name' => 'link',
            'type' => 'url',
            'label' => '🔗 Access Link',
            'attributes' => [
                'class' => 'form-control modern-input',
                'placeholder' => 'https://example.com/your-material'
            ],
            'hint' => 'Optional: Direct link where students can access this material',
            'wrapper' => [
                'style' => 'margin-bottom: 20px;'
            ]
        ]);

        // Add custom CSS for modern styling
        CRUD::addField([
            'name' => 'modern_styles',
            'type' => 'custom_html',
            'value' => '<style>
                .modern-input {
                    border: 2px solid #e5e7eb !important;
                    border-radius: 8px !important;
                    padding: 12px 16px !important;
                    font-size: 14px !important;
                    transition: all 0.3s ease !important;
                }
                .modern-input:focus {
                    border-color: #3b82f6 !important;
                    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
                    outline: none !important;
                }
                .form-group label {
                    font-weight: 600 !important;
                    color: #374151 !important;
                    margin-bottom: 8px !important;
                    font-size: 14px !important;
                }
                .form-group .text-muted {
                    font-size: 12px !important;
                    color: #6b7280 !important;
                    margin-top: 4px !important;
                }
            </style>'
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
