<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private BlogRepositoryInterface $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->blogRepository->getDataTable();
        }
        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(BlogStoreRequest $request)
    {
        return $this->blogRepository->createBlog($request);
    }

    public function edit($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update($blogId, BlogUpdateRequest $request)
    {
        return $this->blogRepository->updateBlog($blogId, $request);
    }

    public function delete($imageId)
    {
        return $this->blogRepository->deleteBlog($imageId);
    }
}
