<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
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
/*
        // Validate the data
        $data = $request->validated();
        // Check if the request has a cover_image field
        if ($request->hasFile('cover_image')) {
            $cover_image = Storage::put('uploads', $data['cover_image']);
            $data['cover_image'] = $cover_image;
        }
*/
        $data = $request->all();

        $validator = Validator::make($data, [
            "name" => "required|unique:dishes,name|min:5|max:50",
            "slug" => "nullable",
            "description" => "nullable|max:10000",
            "price" => "required",
            "visible" => "boolean",
            "cover_image" => "nullable|image|max:300",
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        $newDish = new Dish();
        $newDish->fill($data);
        //$newDish->cover_image = Storage::disk('public')->put('dishes_img', $request->cover_image);
        $newDish->slug = Str::slug($request["name"]);
        $newDish->save();

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

        // check if the request has a cover_image field
        if ($request->hasFile('cover_image')) {

            // check if the current post has an image, if yes, delete it.
            if ($dish->cover_image) {
                Storage::delete($dish->cover_image);
            }

            $cover_image = Storage::put('uploads', $data['cover_image']);
            $data['cover_image'] = $cover_image;
        }
        
        $data = [
            'name' => $request['name'],
            "slug" => Str::slug($request["name"]),
            'description' => $request["description"],
            //'cover_image' => Storage::disk('public')->put('dishes_img', $request->cover),
            'price' => $request['price'],
            'visible' => $request['visible'],
        ];
        
        $dish->update($data);

        return to_route('admin.dishes.index');
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
