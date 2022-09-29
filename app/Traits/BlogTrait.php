<?php

namespace App\Traits;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Support\Facades\DB;

trait BlogTrait
{

    public function getAllBlogs()
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as blog_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where([
                    'type' => 'blog',
                    'n.status' => 1
                ])
            ->orderBy('n.order_by', 'DESC')
            ->get();
    }    

    public function getRecentPosts()
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as blog_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where([
                    'type' => 'blog',
                    'n.status' => 1
                ])
            ->orderBy('n.id', 'DESC')
            ->take(2)
            ->get();
    }

    public function getBlog($blog = null)
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as blog_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where('n.id', $blog)
            ->where('type', 'blog')
            ->orderBy('n.order_by', 'DESC')
            ->first();
    }

    public function getBlogList()
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as blog_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where('type', 'blog')
            ->orderBy('n.order_by', 'DESC')
            ->get();
    }

    public function getBlogDetail($id)
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as blog_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where('n.id', $id)
            ->first();
    }

    public function getFilteredList($filter)
    {
        $list = DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->where('type', 'blog')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as blog_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified");

        if(isset($filter['filter_category']) && $filter['filter_category'] != '') {
            $list = $list->where('n.category_id', $filter['filter_category']);
        }

        if(isset($filter['filter_date']) && $filter['filter_date'] != '') {
            $list = $list->where("date_format(n.created_at, '%Y-%m-%d') = ", $filter['filter_date']);
        }

        if(isset($filter['filter_keyword']) && $filter['filter_keyword'] != '') {
            $list = $list->like('n.title', $filter['filter_keyword']);
        }

        return $list->orderBy('n.order_by', 'DESC')
                ->get();
    }

    public function getNews($news = null)
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as news_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where('n.id', $news)
            ->where('type', 'news')
            ->orderBy('n.order_by', 'DESC')
            ->first();
    }

    public function getNewsList()
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as news_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where('type', 'news')
            ->orderBy('n.order_by', 'DESC')
            ->get();
    }

    public function getFilteredNewsList($filter)
    {
        $list = DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->where('type', 'news')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as news_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified");

        if(isset($filter['filter_category']) && $filter['filter_category'] != '') {
            $list = $list->where('n.category_id', $filter['filter_category']);
        }

        if(isset($filter['filter_date']) && $filter['filter_date'] != '') {
            $list = $list->where("date_format(n.created_at, '%Y-%m-%d') = ", $filter['filter_date']);
        }

        if(isset($filter['filter_keyword']) && $filter['filter_keyword'] != '') {
            $list = $list->like('n.title', $filter['filter_keyword']);
        }

        return $list->orderBy('n.order_by', 'DESC')
                ->get();
    }

    function getRecentNews()
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as news_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where('type', 'news')
            ->orderBy('n.order_by', 'DESC')
            ->take(2)
            ->get();
    }    

    public function getAllNews()
    {
        return DB::table('news_blog as n')
            ->leftJoin('category as c', 'n.category_id','c.category_id')
            ->selectRaw("c.title as category, n.*, if(n.status=1,'Active','Deactive') as blog_status, date_format(n.created_at,'%b %d, %Y') as created, date_format(n.modified_at,'%b %d, %Y') as last_modified")
            ->where([
                    'type' => 'news',
                    'n.status' => 1
                ])
            ->orderBy('n.order_by', 'DESC')
            ->get();
    }

    public function getFaqCategories()
    {
        return FaqCategory::selectRaw("*, if(status = 1, 'Active', 'Deactive') as cat_status")
            ->orderBy('title', 'ASC')
            ->get();
    }

    function getFaqByCategory($cat_id)
    {
        return Faq::selectRaw('title, description')
            ->where('category_id', $cat_id)
            ->get();
    }
    
}
