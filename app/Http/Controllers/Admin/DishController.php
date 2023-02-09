<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Auth;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dishes = Dish::all();
        $dishes = Auth::user()->restaurants->dishes;
        $dishes = collect($dishes)->sortBy('name');
        return view("admin.dishes.index", compact("dishes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.dishes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $restaurant = Auth::user()->restaurants;
        // dd($request->all());

        $data = $request->validated();


        if ($request->hasFile('cover_image')) {
            $cover_image = Storage::put('uploads', $data['cover_image']);
            $data['cover_image'] = $cover_image;
        }

        $newDish = new Dish();
        $newDish->fill($data);

        $newDish->slug = Str::slug($request["name"]);

        $newDish = $restaurant->dishes()->save($newDish);


        return to_route("admin.dishes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view("admin.dishes.show", compact("dish"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {

        return view("admin.dishes.edit", compact("dish"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {

        // validate the data
        $data = $request->validated();


        $data['slug'] = Str::slug($request->name);


        // check if the request has a cover_image field
        if ($request->hasFile('cover_image')) {

            // check if the current post has an image, if yes, delete it.
            if ($dish->cover_image) {
                Storage::delete($dish->cover_image);
            }

            $cover_image = Storage::put('uploads', $data['cover_image']);
            $data['cover_image'] = $cover_image;
        }



        // $data = [
        //     'name' => $request['name'],
        //     "slug" => Str::slug($request["name"]),
        //     'description' => $request["description"],
        //     'cover_image' => Storage::disk('public')->put('dishes_img', $request->cover),
        //     'price' => $request['price'],
        //     'visible' => $request['visible'],
        // ];

        $dish->update($data);

        return to_route('admin.dishes.index')->with('message', "Dish '$dish->name' updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return to_route('dishes.index');
    }
}
