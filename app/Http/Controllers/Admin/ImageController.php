<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageStoreRequest;
use App\Http\Requests\ImageUpdateRequest;
use App\Interfaces\ImageRepositoryInterface;
use App\Models\Category;
use App\Models\Image;
use App\Models\ImageSize;

class ImageController extends Controller
{
    private ImageRepositoryInterface $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->imageRepository->getDataTable();
        }

        return view('admin.manage-images.index');
    }

    public function create()
    {
        $categories = Category::with(['getSubCategories'])->get();
        $imageSizes = ImageSize::all('id', 'size');
        return view('admin.manage-images.create', compact('categories', 'imageSizes'));
    }

    public function createData(ImageStoreRequest $request)
    {
        return $this->imageRepository->createImage($request);
    }

    public function show($id)
    {
        $image = Image::with(['getCategory', 'getSubCategory', 'imageSize', 'attributeImages'])->find($id);

        if (!$image) {
            return redirect()->back()->withErrors(['error' => 'Image not found.']);
        }

        return view('images.show', compact('image'));
    }

    public function update($imageId)
    {
        $categories = Category::with(['getSubCategories'])->get();
        $image = Image::findOrFail($imageId);
        $imageSizes = ImageSize::all('id', 'size');
        return view('admin.manage-images.update', compact('categories', 'image', 'imageSizes'));
    }

    public function updateData($imageId, ImageUpdateRequest $request)
    {
        return $this->imageRepository->updateImage($imageId, $request);
    }

    public function delete($imageId)
    {
        return $this->imageRepository->deleteImage($imageId);
    }
}
