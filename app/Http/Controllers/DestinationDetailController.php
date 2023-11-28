<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DestinationDetail;


class DestinationDetailController extends Controller
{
    public function index(){
        $data['result'] = DestinationDetail::all();
        return view("admin/destinationDetail/index")->with($data);
    }
    public function store(Request $request){
        $input = $request->all();
        $id = DB::table('tb_destination')->orderBy('id_destination', 'desc')->first();
        if($id == null){
            $id = 1;
        }else{
            $id = $id->id_destination + 1;
        }
        if($request->hasFile('foto')){
            $filename = 'destination' . $id . "." . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $filename);
            $input['foto'] = $filename;
        }
        $status = DestinationDetail::create($input);

        if($status) return redirect('admin/destinationDetail')->with('success', 'Data destination '.$input['nama_destination'].' berhasil ditambahkan');
        else return redirect('admin/destinationDetail')->with('error', 'Data destination '.$input->nama_island.' gagal ditambahkan');
    }
    public function edit(Request $request){
        $input = $request->all();
        if($request->hasFile('foto')){
            $filename = 'DestinationDetail' . $input['id_destination_detail'] . "." . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $filename);
            $data['foto'] = $filename;
        }
        $data['id_destination']         = $input['id_destination'];
        $data['nama_destination']       = $input['nama_destination'];
        $data['header']                 = $input['header'];
        $data['content']                = $input['content'];

        $result= DestinationDetail::where('id_destination_detail', $input['id_destination_detail']);
        $status = $result->update($data);

        if($status) return redirect('admin/destinationDetail')->with('success', 'Data destination '.$input['nama_destination'].' berhasil diubah');
        else return redirect('admin/destinationDetail')->with('error', 'Data destination '.$input['nama_destination'].' gagal diubah');
    }
    public function destroy(Request $request, $id){
        $result = DestinationDetail::where('id_destination_detail', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/destinationDetail')->with('success', 'Data destination berhasil dihapus');
        else return redirect('admin/destinationDetail')->with('error', 'Data destination gagal dihapus');
    }
    public function detail($id){
        $data['result'] = DestinationDetail::where('id_destination_detail', $id)->first();
        return view("admin/destinationDetail/detail")->with($data);
    }
}
