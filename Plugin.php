<?php namespace Depcore\MallFeaturedProducts;

use Backend;
use System\Classes\PluginBase;
use Event;
/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'MallFeaturedProducts',
            'description' => 'No description provided yet...',
            'author' => 'Depcore',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        Event::listen('backend.form.extendFields', function($widget) {
            if (!$widget->getController() instanceof \OFFLINE\Mall\Controllers\Products) {
                return;
            }
        
            // Only apply this listener when the User model is being modified
            if (!$widget->model instanceof \OFFLINE\Mall\Models\Product) {
                return;
            }
        
            // Only apply this listener when the Form widget in question is a root-level
            // Form widget (not a repeater, nestedform, etc)
            // if ($widget->isNested) {
            //     return;
            // }
        
            // Add an extra birthday field
            $widget->addFields([
                'is_featured' => [
                    'label'   => 'featured',
                    'comment' => 'Check if you want this product to appear in featured section',
                    'type'    => 'switch',
                    'tab' => 'General'
                ]
            ]);
        
            // Remove a Surname field
            // $widget->removeField('surname');
        });
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {

        return [
            'Depcore\MallFeaturedProducts\Components\FeaturedProducts' => 'featuredProducts',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'depcore.mallfeaturedproducts.some_permission' => [
                'tab' => 'MallFeaturedProducts',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'mallfeaturedproducts' => [
                'label' => 'MallFeaturedProducts',
                'url' => Backend::url('depcore/mallfeaturedproducts/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['depcore.mallfeaturedproducts.*'],
                'order' => 500,
            ],
        ];
    }
}
