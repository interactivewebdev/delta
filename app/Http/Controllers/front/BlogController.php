<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\BlogTrait;

class BlogController extends BaseController
{
    use BlogTrait;

    public function __construct()
    {
        
    }

    public function index(){
        $blogs = $this->getAllBlogs();
		$recentPosts = $this->getRecentPosts();

        return view('front.blog', compact('blogs', 'recentPosts'));
    }

    public function detail($id)
    {
        $blog = $this->getBlogDetail($id);
		$recentPosts = $this->getRecentPosts();

		return view('front.blog-detail', compact('blog', 'recentPosts'));
    }

    public function searchBlog()
	{		
		$blogs = $this->getAllBlogs();
		$recentPosts = $this->getRecentPosts();

		return view('front.blog', compact('blogs', 'recentPosts'));
	}

	public function news()
	{
		$news = $this->getAllNews();

		return view('front.news', compact('news'));
	}	

	public function newsDetail($id)
	{
		$blog = $this->getBlogDetail($id);

		return view('front.news-detail', compact('blog'));
	}
}
