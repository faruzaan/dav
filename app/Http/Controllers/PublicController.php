<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Product;

class PublicController extends Controller
{
    public function index(){
        $data['destinations'] = Destination::all();
        $data['products'] = Product::all();
        return view("index")->with($data);
    }
}
