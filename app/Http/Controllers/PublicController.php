<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\DestinationDetail;
use App\Models\Product;
use App\Models\Menu;
use App\Models\System;
use App\Models\Tour;

class PublicController extends Controller
{
    public function index(){
        $data['destinations'] = Destination::all();
        $data['products'] = Product::all();
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        $data['tours'] = Tour::all();

        return view("pages/index")->with($data);
    }
    public function about(){
        $data['destinations'] = Destination::all();
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();


        return view("pages/about")->with($data);
    }
    public function destination(){
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        $destinations = Destination::paginate(1);
        return view("pages/destination", compact('destinations'))->with($data);
    }
    public function destinationDetail($id){
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        $data['destination'] = Destination::where('id_destination',$id)->first();
        return view("pages/destinationDetail")->with($data);
    }
    public function tour(){
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        return view("pages/tour")->with($data);
    }
    public function tourDetail($id){
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        $data['destination'] = Destination::where('id_destination',$id)->first();
        return view("pages/tourDetail")->with($data);
    }
}
