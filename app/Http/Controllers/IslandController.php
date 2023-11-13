<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Island;

class IslandController extends Controller
{
    public function index(){
        $data['result'] = Island::all();
        return view("admin/island/index")->with($data);
    }
    public function create(){
        return view("admin/island/form");
    }
    public function store(Request $request){
        $input = $request->all();
        $status = Island::create($input);

        if($status) return redirect('admin/island')->with('success', 'Data island '.$input['nama_island'].' berhasil ditambahkan');
        else return redirect('admin/island')->with('error', 'Data island '.$input->nama_island.' gagal ditambahkan');
    }
    public function getIsland(Request $request)
    {
        $data = Island::where('id_island', $request->input('data'))->get();
        return response()->json($data);
    }
    public function edit(Request $request){
        $input = $request->all();

        $data['id_island']             = $input['id'];
        $data['nama_island']    = $input['nama_island'];

        $result= Island::where('id_island', $input['id']);
        $status = $result->update($data);

        if($status) return redirect('admin/island')->with('success', 'Data island '.$input['nama_island'].' berhasil diubah');
        else return redirect('admin/island')->with('error', 'Data island '.$input->nama_island.' gagal diubah');
    }
    public function destroy(Request $request, $id){
        $result = Island::where('id_island', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/island')->with('success', 'Data island berhasil dihapus');
        else return redirect('admin/island')->with('error', 'Data island gagal dihapus');
    }
}
