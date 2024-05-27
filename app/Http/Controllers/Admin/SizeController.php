<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\ImageSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Size;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = ImageSize::all();
        return view('admin.manage-sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.manage-sizes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ImageSize::create([
            'size' => $request->get('size')
        ]);

        return redirect('/manage-size')->with('success_msg', 'Size successfully created.');
    }

    public function edit($sizeId)
    {
        $size = ImageSize::findOrFail($sizeId);
        return view('admin.manage-sizes.edit', compact('size'));
    }

    public function update($sizeId, Request $request)
    {
        $size = ImageSize::findOrFail($sizeId);
        $size->update([
            'size' => $request->get('size')
        ]);
        return redirect('/manage-size')->with('success_msg', 'Size successfully Updated.');
    }

    public function delete($sizeId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $size = ImageSize::find($sizeId);

        if (!empty($size)) {

            $hasImage = Image::where('image_size_id', $sizeId)->first();
            if (!empty($hasImage)) {
                $msg = 'delete relational image first.';
            } else {
                $size->delete();
                $msg = "Size successfully deleted.";
                $code = 200;
            }
        }
        return response()->json(['msg' => $msg], $code);
    }
}
