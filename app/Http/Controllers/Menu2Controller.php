<?php

namespace App\Http\Controllers;

use App\Models\Menu2;
use App\Http\Requests\StoreMenu2Request;
use App\Http\Requests\UpdateMenu2Request;

class Menu2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu2::all();
        return $menu;
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
    public function store(StoreMenu2Request $request)
    {
        $menu = new Menu2;
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->category_id= $request->category_id;
        $menu->offers = $request->offers;
        $menu->allergens = $request->allergens;

        $menu->save();

        return $menu;
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu2 $menu2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu2 $menu2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenu2Request $request, Menu2 $menu2)
    {
        $menu = Menu2::find($request->id);
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->category_id= $request->category_id;
        $menu->offers = $request->offers;
        $menu->allergens = $request->allergens;

        $menu->save();

        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu2 $menu2)
    {
        //
    }
}
