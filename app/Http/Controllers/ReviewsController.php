<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Http\Requests\StoreReviewsRequest;
use App\Http\Requests\UpdateReviewsRequest;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Reviews::all();
        return $reviews;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewsRequest $request)
    {
        $reviews = new Reviews;
        $reviews->user_id = $request->user_id;
        $reviews->review = $request->review;
       
        
        $reviews->save();

        return $reviews;
    }

    /**
     * Display the specified resource.
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewsRequest $request, Reviews $reviews)
    {
        $orderdetails = Orderdetails::find($request->id);
        $reviews->user_id = $request->user_id;
        $reviews->review = $request->review;
       
        
        $reviews->save();

        return $reviews;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reviews $reviews)
    {
        //
    }
}
