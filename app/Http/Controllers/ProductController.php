<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Boat;

class ProductController extends Controller
{
    public function index(){
        $data['result'] = Boat::all();
        return view("admin/product/index")->with($data);
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

        $status = Boat::create($input);

        if($status) return redirect('admin/product')->with('success', 'Data product '.$input['nama_product'].' berhasil ditambahkan');
        else return redirect('admin/product')->with('error', 'Data product '.$input->nama_product.' gagal ditambahkan');
    }
    public function getProduct(Request $request)
    {
        $data = Boat::where('id_product', $request->input('data'))->get();
        return response()->json($data);
    }
    public function edit(Request $request){
        $input = $request->all();
        if($request->hasFile('foto')){
            $filename = $input['id_product'] . "." . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $filename);
            $data['foto'] = $filename;
        }
        $data['id_product']      = $input['id_product'];
        $data['nama_product']    = $input['nama_product'];

        $result= Boat::where('id_product', $input['id_product']);
        $status = $result->update($data);

        if($status) return redirect('admin/product')->with('success', 'Data product '.$input['nama_product'].' berhasil diubah');
        else return redirect('admin/product')->with('error', 'Data product '.$input['nama_product'].' gagal diubah');
    }
    public function destroy(Request $request, $id){
        $result = Boat::where('id_product', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/product')->with('success', 'Data product berhasil dihapus');
        else return redirect('admin/product')->with('error', 'Data product gagal dihapus');
    }
}
