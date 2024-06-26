<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    //index
    public function index()
    {
        //get data discount
        $discounts = \App\Models\Discount::all();

        return response()->json([
            'status' => 'success',
            'data' => $discounts
        ], 200);
    }

    //show
    public function show($id)
    {
    }

    //store
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'value' => 'required',

        ]);

        //create discount
        $discount = \App\Models\Discount::create($request->all());

        if ($discount) {
            return response()->json([
                'status' => 'success',
                'data' => $discount
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Discount not created'
            ], 404);
        }
    }

    //update
    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'value' => 'required',
        ]);

        //update discount
        $discount = \App\Models\Discount::find($id);
        $discount->update($request->all());

        if ($discount) {
            return response()->json([
                'status' => 'success',
                'data' => $discount
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Discount not found'
            ], 404);
        }
    }

    public function destroy($id)
    {
        //delete discount
        $discount = \App\Models\Discount::find($id);
        $discount->delete();

        return response()->json([
            'status' => 'success',
            'data' => $discount
        ], 200);
    }
}
