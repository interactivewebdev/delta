<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Traits\NavCategoryTrait;

class FrontMainLayourServiceProvider extends ServiceProvider
{
    public $MenuCategories;
    public $sliderInfo;
    public $aboutus;

    use NavCategoryTrait;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->MenuCategories = [];
        $this->sliderInfo = [];
        $this->aboutus = '';

        $this->MenuCategories = $this->getNavCategories();
		foreach($this->MenuCategories as $item) {
			$item->subcategories = $this->getNavCategories($item->category_id);
			foreach($item->subcategories as $sub) {
				$sub->subcategories = $this->getNavCategories($sub->category_id);
			}
		}

        $this->sliderInfo = $this->getTopSliders();

        $this->aboutus = $this->getAboutContent();

        view()->composer('layouts.front',  function($view){
            $view->with([
                'categories'=>$this->MenuCategories, 
                'sliderInfo'=>$this->sliderInfo, 
                'aboutus'=>$this->aboutus
            ]);
        });
    }
}
