<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactQueryController extends Controller
{
    public function submitContactQuery(Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'name'     => 'required|max:255',
                'phone'     => 'required|max:50',
                'email'     => 'required|max:255',
                'message'     => 'required|max:2800'
            ]);
            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }
            ContactQuery::create($request->all());
            return makeJsonResponse('Your contact query successfully submitted.');

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }
}
