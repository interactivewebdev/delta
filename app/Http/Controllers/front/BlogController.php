<?php

namespace App\Http\Controllers\front;

use App\Traits\BlogTrait;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    use BlogTrait;

    public function __construct()
    {

    }

    public function index()
    {
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

    public function searchBlog(Request $request)
    {
        $blogs = $this->getAllBlogs($request->all());
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
