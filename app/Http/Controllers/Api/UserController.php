<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use App\Models\Restaurant;
use App\Models\Tipology;
use App\Models\Category;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',

            'data' => Restaurant::with(['tipologies', 'dishes'])->orderByDesc('id')->paginate(6)
        ]);
    }


    public function tipologies()
    {
        return response()->json([
            'status' => 'success',

            'data' => Tipology::all()
        ]);
    }

    public function categories()
    {
        return response()->json([
            'status' => 'success',

            'data' => Category::all()
        ]);
    }
}
