<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    public function index(){
        $data['result'] = Tour::all();
        return view("admin/tour/index")->with($data);
    }
    public function create(){
        return view("admin/tour/form");
    }
    public function store(Request $request){
        $input = $request->all();
        $status = Tour::create($input);

        if($status) return redirect('admin/tour')->with('success', 'Data tour '.$input['nama_island'].' berhasil ditambahkan');
        else return redirect('admin/tour')->with('error', 'Data tour '.$input->nama_island.' gagal ditambahkan');
    }
    public function getIsland(Request $request)
    {
        $data = Tour::where('id_tour', $request->input('data'))->get();
        return response()->json($data);
    }
    public function edit(Request $request){
        $input = $request->all();

        $data['id_island']             = $input['id'];
        $data['nama_island']    = $input['nama_island'];

        $result= Tour::where('id_tour', $input['id']);
        $status = $result->update($data);

        if($status) return redirect('admin/tour')->with('success', 'Data tour '.$input['nama_island'].' berhasil diubah');
        else return redirect('admin/tour')->with('error', 'Data tour '.$input->nama_island.' gagal diubah');
    }
    public function destroy(Request $request, $id){
        $result = Tour::where('id_island', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/tour')->with('success', 'Data tour berhasil dihapus');
        else return redirect('admin/tour')->with('error', 'Data tour gagal dihapus');
    }
}
