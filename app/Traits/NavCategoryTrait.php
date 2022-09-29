<?php 

namespace App\Traits;

use App\Models\Category;
use App\Models\Content;
use App\Models\SiteImage;
use App\Models\Slider;

trait NavCategoryTrait {

    public function getNavCategories($parent = 0)
    {
        return Category::select("category_id", "title")
            ->where([
                'status' => 1,
                'parent_id' => $parent
            ])
            ->get();
    }

    public function getTopSliders()
    {
        $item = Slider::where('position', 'top')->first();
        return SiteImage::select('title', 'image', 'link')
                    ->where([
                        'type' => 'slider',
                        'type_id' => $item->slider_id
                    ])->get();
    }

    public function getAboutContent()
    {
        return Content::select('id', 'short_desc')
            ->where('id', 1)
            ->first();
    }

}
