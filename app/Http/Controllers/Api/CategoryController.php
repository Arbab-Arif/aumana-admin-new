<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactUsUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategory()
    {
        try {
            $categories = Category::where('is_featured', 1)->get();
            return makeJsonResponse('get all category Us.', $categories);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }
}
