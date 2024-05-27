<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;

class BlogRepository implements BlogRepositoryInterface
{
    public function getDataTable()
    {
        $query = Blog::query()
            ->select(
                'id',
                'title',
                'author_name',
                'short_description',
                'image',
                'featured_img',
            );

        return Datatables::of($query)
            ->filter(function ($instance) {
                $search = request('search')['value'];
                $instance->where(function ($w) use ($search) {
                    $w->orWhere('blogs.title', 'LIKE', "%$search%")
                        ->orWhere('blogs.author_name', 'LIKE', "%$search%")
                        ->orWhere('blogs.description', 'LIKE', "%$search%");
                });
            })
            ->editColumn('image', function ($obj) {
                return '<img src="' . $obj->imageLink . '" height="50px" width="50px">';
            })
            ->editColumn('featured_img', function ($obj) {
                return '<img src="' . $obj->featuredImgLink . '" height="50px" width="50px">';
            })
            ->addColumn('action', function ($obj) {
                $btn = '<a href="/edit-blog/' . $obj->id . '" class="btn btn-primary mr-2">Update</a>';
                $btn .= '<a href="javascript:void(0);" class="btn btn-danger" onclick="deleteDataSet(`' . $obj->id . '`)">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action', 'image', 'featured_img'])
            ->make(true);
    }

    public function getBlogAllData()
    {
        return Blog::get();
    }

    public function getBlogById($blogId)
    {
        return Blog::findOrFail($blogId);
    }

    public function createBlog($req)
    {
        $pathImage = public_path() . '/blogs/images/';
        $pathFeaturedImage = public_path() . '/blogs/featured_image/';
        $featuredImage = $actualImage = '';
        if (!File::isDirectory($pathImage)) {
            File::makeDirectory($pathImage, 0777, true, true);
        }

        if (!File::isDirectory($pathFeaturedImage)) {
            File::makeDirectory($pathFeaturedImage, 0777, true, true);
        }

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $actualImage = Str::random(10) . now()->format('YmdHis') . Str::random(10) . '.' . $image->getclientoriginalextension();
            $img = Image::make($image->getRealPath())->resize(500, 250);
            $img->save($pathImage . $actualImage, 100,);

        }

        if ($req->hasFile('featured_img')) {
            $featuredImg = $req->file('featured_img');
            $featuredImage = Str::random(10) . now()->format('YmdHis') . Str::random(10) . '.' . $featuredImg->getclientoriginalextension();
            $featImage = Image::make($featuredImg->getRealPath())->resize(500, 250);
            $featImage->save($pathFeaturedImage . $featuredImage, 100);


        }
        Blog::create([
            'title'             => $req->title,
            'slug'              => Str::slug($req->title),
            'author_name'       => $req->author_name,
            'short_description' => $req->short_description,
            'description'       => $req->description,
            'featured_img'      => $featuredImage,
            'image'             => $actualImage,
        ]);

        return redirect('/manage-blog')->with('success_msg', 'Blog successfully created.');
    }

    public function updateBlog($blogId, $req)
    {
        $blogData = $this->getBlogById($blogId);
        $oldImage = public_path() . '/blogs/images/' . $blogData->image;
        $oldFeaturedImg = public_path() . '/blogs/featured_image/' . $blogData->featured_img;
        $pathImage = public_path() . '/blogs/images/';
        $pathFeaturedImage = public_path() . '/blogs/featured_image/';
        $actualImage = '';
        $featuredImage = '';
        if (!File::isDirectory($pathImage)) {
            File::makeDirectory($pathImage, 0777, true, true);
        }

        if (!File::isDirectory($pathFeaturedImage)) {
            File::makeDirectory($pathFeaturedImage, 0777, true, true);
        }

        if ($req->hasFile('image')) {
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $image = $req->file('image');
            $actualImage = Str::random(10) . now()->format('YmdHis') . Str::random(10) . '.' . $image->getclientoriginalextension();
            $img = Image::make($image->getRealPath())->resize(500, 250);
            $img->save($pathImage . $actualImage, 100,);

        }

        if ($req->hasFile('featured_img')) {
            if (File::exists($oldFeaturedImg)) {
                File::delete($oldFeaturedImg);
            }
            $featuredImg = $req->file('featured_img');
            $featuredImage = Str::random(10) . now()->format('YmdHis') . Str::random(10) . '.' . $featuredImg->getclientoriginalextension();
            $featImage = Image::make($featuredImg->getRealPath())->resize(500, 250);
            $featImage->save($pathFeaturedImage . $featuredImage, 100);
        }

        $blogData->update([
            'title'             => $req->title,
            'slug'              => Str::slug($req->title),
            'author_name'       => $req->author_name,
            'short_description' => $req->short_description,
            'description'       => $req->description,
            'featured_img'      => ($featuredImage) ? $featuredImage : $blogData->featured_img,
            'image'             => ($actualImage) ? $actualImage : $blogData->image,
        ]);

        return redirect('/manage-blog')->with('success_msg', 'Blog successfully updated.');
    }

    public function deleteBlog($blogId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $blog = $this->getBlogById($blogId);;
        $oldImage = public_path() . '/blogs/images/' . $blog->image;
        $oldFeaturedImg = public_path() . '/blogs/featured_image/' . $blog->featured_img;
        if (!empty($blog)) {
            if (!empty($hasImage)) {
                $msg = 'delete relational image first.';
            } else {
                if (File::exists($oldImage)) {
                    File::delete($oldImage);
                }
                if (File::exists($oldFeaturedImg)) {
                    File::delete($oldFeaturedImg);
                }
                $blog->delete();
                $msg = "Blog successfully deleted.";
                $code = 200;
            }
        }

        return response()->json(['msg' => $msg], $code);
    }
}
