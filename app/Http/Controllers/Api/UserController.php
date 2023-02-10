<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use App\Models\Restaurant;
use App\Models\Tipology;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'status'=>'success',
         
            'data'=>Restaurant::with(['tipologies','dishes'])->orderByDesc('id')->paginate(5)
        ]);
    }


    public function tipologies()
    {
        return response()->json([
            'status'=>'success',
         
            'data'=>Tipology::all()
        ]);
    }
}