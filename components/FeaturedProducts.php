<?php namespace Depcore\MallFeaturedProducts\Components;

use Cms\Classes\ComponentBase;
use OFFLINE\Mall\Models\Category;
use \OFFLINE\Mall\Models\Product;
/**
 * FeaturedProducts Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class FeaturedProducts extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'FeaturedProducts Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onRun()
    {
        $this->page['featuredProducts'] = Product::where('is_featured', 1)->get();
        $this->page['categories'] = Category::all();
    }

    public function defineProperties()
    {
        return [];
    }
}
