<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourDetail;
use App\Models\Itenary;
use App\Models\ItenaryDetail;

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
    public function editDetail(Request $request){
        $input = $request->all();
        $result = TourDetail::where('id_detail_tour', $input['id_detail_tour'])->first();
        $data['id_detail_tour'] = $result['id_detail_tour'];
        $data['id_tour']        = $result['id_tour'];
        $data['id_destination'] = $input['id_destination'];

        $status = $result->update($data);

        if($status) return redirect('admin/tour/'.$data['id_tour'])->with('success', 'Data tour  berhasil diubah');
        else return redirect('admin/tour/'.$data['id_tour'])->with('error', 'Data tour  gagal diubah');
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
    public function addItenary(Request $request)
    {
        $input = $request->all();
        $status = Itenary::create($input);

        if($status) return redirect('admin/tour/'.$input['id_tour']);
        else return redirect('admin/tour');
    }
    public function editItenary(Request $request){
        $input = $request->all();
        $result = Itenary::where('id_itenary', $input['id_itenary'])->first();
        $data['id_itenary'] = $result['id_itenary'];
        $data['desc'] = $input['desc'];

        $status = $result->update($data);

        if($status) return redirect('admin/tour/'.$result['id_tour'])->with('success', 'Data tour  berhasil diubah');
        else return redirect('admin/tour/'.$result['id_tour'])->with('error', 'Data tour  gagal diubah');
    }
    public function deleteItenary(Request $request, $id){
        $result = Itenary::where('id_itenary', $id)->first();
        $idItenary = $result->id_tour;
        $status = $result->delete();

        if($status) return redirect('admin/tour/'.$idItenary)->with('success', 'Data tour berhasil dihapus');
        else return redirect('admin/tour/'.$idItenary)->with('error', 'Data tour gagal dihapus');
    }
    public function addDetailItenary(Request $request)
    {
        $input = $request->all();

        $id = (ItenaryDetail::orderBy('id_itenary_detail', 'desc')->first()['id_itenary_detail'])+1;
        if($request->hasFile('foto')){
            $filename = 'DetailItenary' . $id . "." . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $filename);
            $input['foto'] = $filename;
        }
        $status = ItenaryDetail::create($input);

        if($status) return redirect('admin/tour/'.$input['id_tour']);
        else return redirect('admin/tour');
    }
    public function editDetailItenary(Request $request){
        $input = $request->all();
        $result = ItenaryDetail::where('id_itenary_detail', $input['id_itenary_detail'])->first();

        $data['id_itenary_detail'] = $input['id_itenary_detail'];
        $data['desc'] = $input['desc'];
        if($request->hasFile('foto')){
            $filename = 'DetailItenary' . $data['id_itenary_detail'] . "." . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $filename);
            $data['foto'] = $filename;
        }

        $status = $result->update($data);

        if($status) return redirect('admin/tour/'.$input['id_tour'])->with('success', 'Data tour  berhasil diubah');
        else return redirect('admin/tour/'.$input['id_tour'])->with('error', 'Data tour  gagal diubah');
    }
    public function deleteDetailItenary(Request $request, $id){
        $result = ItenaryDetail::where('id_itenary_detail', $id)->first();
        $result = Itenary::where('id_itenary', $result->id_itenary)->first();
        $idTour = $result->id_tour;

        $result = ItenaryDetail::where('id_itenary_detail', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/tour/'.$idTour)->with('success', 'Data tour berhasil dihapus');
        else return redirect('admin/tour/'.$idTour)->with('error', 'Data tour gagal dihapus');
    }
}
