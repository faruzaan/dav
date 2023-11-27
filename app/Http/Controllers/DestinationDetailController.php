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
    public function getDestination(Request $request)
    {
        $data = DestinationDetail::where('id_destination', $request->input('data'))->get();
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

        $result= DestinationDetail::where('id_destination', $input['id_destination']);
        $status = $result->update($data);

        if($status) return redirect('admin/destinationDetail')->with('success', 'Data destination '.$input['nama_destination'].' berhasil diubah');
        else return redirect('admin/destinationDetail')->with('error', 'Data destination '.$input['nama_destination'].' gagal diubah');
    }
    public function destroy(Request $request, $id){
        $result = DestinationDetail::where('id_destination', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/destinationDetail')->with('success', 'Data destination berhasil dihapus');
        else return redirect('admin/destinationDetail')->with('error', 'Data destination gagal dihapus');
    }
}
