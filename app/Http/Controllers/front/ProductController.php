<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use App\Traits\ProductsTrait;

class ProductController extends BaseController
{
    use ProductsTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function index($category_id, Request $request)
    {
        $filters = array();
        $products = array();

        $sort = $request->has('sort') ? $request->query('sort') : "asc";
        $filter_cert = $request->has('filter_cert') ? $request->query('filter_cert') : "";
        $top_filter = $request->has('top_filter') ? $request->query('top_filter') : "";

        if (!!$top_filter) {
            $result = ProductAttribute::where('category_filter_id', $top_filter)
                ->select('product_id')
                ->get();

            $arr  = array();
            foreach ($result as $item) array_push($arr, $item->product_id);
            $filters[] = $arr;
            $products = (count($filters) > 1) ? call_user_func_array('array_intersect', $filters) : $filters[0];
        }

        $navs = Category::where('category_id', $category_id)
            ->select('level')
            ->first();

        if (!!$navs && $navs->parent_id != 0 && $navs->parent != '')
            $parent_nav = '<a href="' . url('/product/list/' . $navs->parent_id) . '">' . $navs->parent . '</a>';
        else
            $parent_nav = '';

        $leaf_nav = (!!$navs) ? $navs->title : "";
        $page_heading = (!!$navs) ? $navs->title : "";

        if (count($products) > 0)
            $products = $this->getProductsList($category_id, $sort, $filter_cert, $top_filter, $products);
        else {
            if (!!$top_filter)
                $products = array();
            else
                $products = $this->getProductsList($category_id, $sort, $filter_cert, $top_filter);
        }
        $filters = $this->getCategoryFilters($category_id);
        $top_filters = $this->getCategoryTopFilters($category_id);
        $header_image = (!!$navs) ? $navs->image : "";
        $left_filters = $filters;

        return view('front.products', compact('category_id', 'parent_nav', 'leaf_nav', 'page_heading', 'products', 'filters', 'top_filters', 'header_image', 'left_filters'));
    }

    public function search($category_id, Request $request)
    {
        $filters = array();
        $products = array();

        if (!!$request->input('filter')) {
            $arr  = array();
            foreach ($request->input('filter') as $val) {
                $result = ProductAttribute::where('category_filter_id', $val)
                    ->select('product_id')
                    ->get();

                foreach ($result as $item) array_push($arr, $item->product_id);
            }

            $products = $arr;

            $filters = $request->input('filter');

            $_SESSION['products'] = $products;
        } else {
            $products = array();
        }

        $sort = $request->has('sort') ? $request->query('sort') : "asc";
        $filter_cert = $request->has('filter_cert') ? $request->query('filter_cert') : "";
        $top_filter = $request->has('top_filter') ? $request->query('top_filter') : "";

        $navs = Category::where('category_id', $category_id)
            ->select('level')
            ->first();

        if (!!$navs && $navs->parent_id != 0 && $navs->parent != '')
            $parent_nav = '<a href="' . url('/product/list/' . $navs->parent_id) . '">' . $navs->parent . '</a>';
        else
            $parent_nav = '';

        $leaf_nav = (!!$navs) ? $navs->title : "";
        $page_heading = (!!$navs) ? $navs->title : "";

        if (count($products) > 0)
            $products = $this->getProductsList($category_id, $sort, $filter_cert, $top_filter, $products);
        else {
            $products = $this->getProductsList($category_id, $sort, $filter_cert, $top_filter);
        }
        $filters = $this->getCategoryFilters($category_id);
        $top_filters = $this->getCategoryTopFilters($category_id);
        $header_image = (!!$navs) ? $navs->image : "";
        $left_filters = $filters;

        return view('front.products', compact('category_id', 'parent_nav', 'leaf_nav', 'page_heading', 'products', 'filters', 'top_filters', 'header_image', 'left_filters'));
    }

    public function singleProduct($name, $product_id)
    {
        $product = $this->getProduct($product_id);

        $attributes = $this->getAttributes($product_id);

        $type1 = $this->getAttachment('type 1', $product_id);
        $type2 = $this->getAttachment('type 2', $product_id);
        $type3 = $this->getAttachment('type 3', $product_id);

        $navs = $this->getCategory($product->category_id);
        if (isset($navs->parent_id) && $navs->parent_id != 0 && $navs->parent != '')
            $parent_nav = '<a href="' . url('/product/list/' . $navs->parent_id) . '">' . $navs->parent . '</a>';
        else
            $parent_nav = '';
        $leaf_nav = '<a href="' . url('/product/list/' . $product->category_id) . '">' . $product->category . '</a>';
        $leaf = $product->title;
        $page_heading = $product->title;

        $product_images = $this->getSlideImages($product_id);

        return view('front.products_detail', compact('product', 'attributes', 'type3', 'type2', 'type1', 'navs', 'leaf_nav', 'parent_nav', 'leaf', 'page_heading', 'product_images'));
    }
}
