<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlogAll()
    {
        try {
            $blogs = Blog::paginate(10);
            return makeJsonResponse('get all Blogs.', $blogs);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function getFeaturedBlog()
    {
        try {
            $blogFeatures = Blog::limit(3)->latest()->get();
            return makeJsonResponse('get all featured Blogs.', $blogFeatures);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function getBlogDetail($slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->first();
            return makeJsonResponse('get all details Blogs.', $blog);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }
}
