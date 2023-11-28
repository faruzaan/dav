<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\DestinationDetail;
use App\Models\Boat;
use App\Models\Menu;
use App\Models\System;
use App\Models\Tour;
use App\Models\TourDetail;

class PublicController extends Controller
{
    public function index(){
        $data['destinations'] = Destination::all();
        $data['products'] = Boat::all();
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
    public function contact(){
        // $data['destinations'] = Destination::all();
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        return view("pages/contact")->with($data);
    }
    public function destination(){
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        $destinations = Destination::paginate(6);
        return view("pages/destination", compact('destinations'))->with($data);
    }
    public function destinationDetail($id){
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        $data['destination'] = Destination::where('id_destination',$id)->first();
        $data['details'] = destinationDetail::where('id_destination',$id)->get();
        if($data['destination']->nama_destination == 'Labuan Bajo'){
            $data['tours'] = Tour::whereIn('id_tour', [1, 2, 3])->get();
        }elseif ($data['destination']->nama_destination == 'Flores') {
            $data['tours'] = Tour::whereIn('id_tour', [4, 5])->get();
        }else {
            $data['tours'] = Tour::whereIn('id_tour', [99,90])->get();
        }

        return view("pages/destinationDetail")->with($data);
    }
    public function tour(){
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        $data['tours'] = Tour::paginate(6);
        $data['latest_tours'] = Tour::orderBy('created_at', 'desc')->limit(4)->get();
        $data['destinations'] = Destination::limit(10)->offset(3)->get();
        return view("pages/tour")->with($data);
    }
    public function tourDetail($id){
        $data['menus'] = Menu::where('parent_id', null)->get();
        $data['footer_menus'] = Menu::all();
        $data['system'] = System::all();
        $data['tour'] = Tour::where('id_tour',$id)->first();
        $data['tourDetails'] = TourDetail::where('id_tour',$id)->get();
        return view("pages/tourDetail")->with($data);
    }
}
