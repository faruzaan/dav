<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Destination;


class DestinationController extends Controller
{
    public function index(){
        $data['result'] = Destination::all();
        return view("admin/destination/index")->with($data);
    }
    public function store(Request $request){
        $input = $request->all();
        $id = DB::table('tb_product')->orderBy('id_product', 'desc')->first();
        if($id == null){
            $id = 1;
        }else{
            $id = $id->id_product + 1;
        }
        if($request->hasFile('foto')){
            $filename = $id . "." . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $filename);
            $input['foto'] = $filename;
        }
        $status = Destination::create($input);

        if($status) return redirect('admin/destination')->with('success', 'Data destination '.$input['nama_destination'].' berhasil ditambahkan');
        else return redirect('admin/destination')->with('error', 'Data destination '.$input->nama_island.' gagal ditambahkan');
    }
    public function getDestination(Request $request)
    {
        $data = Destination::where('id_destination', $request->input('data'))->get();
        return response()->json($data);
    }
    public function edit(Request $request){
        $input = $request->all();
        if($request->hasFile('foto')){
            $filename = $input['id_destination'] . "." . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $filename);
            $data['foto'] = $filename;
        }
        $data['id_destination']      = $input['id_destination'];
        $data['nama_destination']    = $input['nama_destination'];

        $result= Destination::where('id_destination', $input['id_destination']);
        $status = $result->update($data);

        if($status) return redirect('admin/destination')->with('success', 'Data destination '.$input['nama_destination'].' berhasil diubah');
        else return redirect('admin/destination')->with('error', 'Data destination '.$input['nama_destination'].' gagal diubah');
    }
    public function destroy(Request $request, $id){
        $result = Destination::where('id_destination', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/destination')->with('success', 'Data destination berhasil dihapus');
        else return redirect('admin/destination')->with('error', 'Data destination gagal dihapus');
    }
}
