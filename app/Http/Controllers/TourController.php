<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourDetail;
use App\Models\Program;
use App\Models\ProgramDetail;

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

        if($status) return redirect('admin/tour')->with('success', 'Data tour '.$input['nama_tour'].' berhasil ditambahkan');
        else return redirect('admin/tour')->with('error', 'Data tour '.$input['nama_tour'].' gagal ditambahkan');
    }
    public function addDetail(Request $request){
        $input = $request->all();
        $status = TourDetail::create($input);

        if($status) return redirect('admin/tour/'.$input['id_tour'])->with('success', 'Data tour  berhasil ditambahkan');
        else return redirect('admin/tour/'.$input['id_tour'])->with('error', 'Data tour gagal ditambahkan');
    }

    public function edit(Request $request){
        $input = $request->all();

        $data['id_tour']      = $input['id_tour'];
        $data['nama_tour']    = $input['nama_tour'];
        $data['duration']    = $input['duration'];
        $data['desc']    = $input['desc'];
        $data['desc_header']    = $input['desc_header'];
        $data['tour_detail']    = $input['tour_detail'];
        $data['header1']    = $input['header1'];
        $data['header2']    = $input['header2'];
        $data['price_usd']    = $input['price_usd'];
        $data['price_idr']    = $input['price_idr'];
        $data['content2']    = $input['content2'];
        if($request->hasFile('foto')){
            $filename = 'tour' . $data['id_tour'] . "." . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $filename);
            $data['foto'] = $filename;
        }

        $result= Tour::where('id_tour', $input['id_tour']);
        $status = $result->update($data);

        if($status) return redirect('admin/tour/'.$data['id_tour'])->with('success', 'Data tour '.$input['nama_tour'].' berhasil diubah');
        else return redirect('admin/tour/'.$data['id_tour'])->with('error', 'Data tour '.$input['nama_tour'].' gagal diubah');
    }
    public function destroy(Request $request, $id){
        $result = Tour::where('id_island', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/tour')->with('success', 'Data tour berhasil dihapus');
        else return redirect('admin/tour')->with('error', 'Data tour gagal dihapus');
    }

    public function detail($id){
        $data['result'] = Tour::where('id_tour', $id)->first();
        $data['tourDetails'] = TourDetail::where('id_tour', $id)->get();
        $data['itenaries'] = Itenary::where('id_tour', $id)->get();
        return view("admin/tour/detail")->with($data);
    }
    public function destroyDetail(Request $request, $id){
        $result = TourDetail::where('id_detail_tour', $id)->first();
        $idTour = $result->id_tour;
        $status = $result->delete();

        if($status) return redirect('admin/tour/'.$idTour)->with('success', 'Data tour berhasil dihapus');
        else return redirect('admin/tour/'.$idTour)->with('error', 'Data tour gagal dihapus');
    }
    public function addProgram(Request $request)
    {
        $input = $request->all();
        $status = Program::create($input);

        if($status) return redirect('admin/tour/'.$input['id_tour']);
        else return redirect('admin/tour');
    }
    public function destroyProgram(Request $request, $id){
        $result = Program::where('id_program', $id)->first();
        $idProgram = $result->id_tour;
        $status = $result->delete();

        if($status) return redirect('admin/tour/'.$idProgram)->with('success', 'Data tour berhasil dihapus');
        else return redirect('admin/tour/'.$idProgram)->with('error', 'Data tour gagal dihapus');
    }
    public function getProgram(Request $request)
    {
        $data = Program::where('id_tour', $request->input('data'))->get();
        return response()->json($data);
    }
}
