<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $data['result'] = Category::all();
        return view("admin/category/index")->with($data);
    }
    public function store(Request $request){
        $input = $request->all();
        $status = Category::create($input);

        if($status) return redirect('admin/category')->with('success', 'Data category '.$input['nama_category'].' berhasil ditambahkan');
        else return redirect('admin/category')->with('error', 'Data category '.$input->nama_category.' gagal ditambahkan');
    }
    public function getCategory(Request $request)
    {
        $data = Category::where('id_category', $request->input('data'))->get();
        return response()->json($data);
    }
    public function edit(Request $request){
        $input = $request->all();

        $data['id_category']             = $input['id_category'];
        $data['nama_category']    = $input['nama_category'];

        $result= Category::where('id_category', $input['id_category']);
        $status = $result->update($data);

        if($status) return redirect('admin/category')->with('success', 'Data category '.$input['nama_category'].' berhasil diubah');
        else return redirect('admin/category')->with('error', 'Data category '.$input->nama_category.' gagal diubah');
    }
    public function destroy(Request $request, $id){
        $result = Category::where('id_category', $id)->first();
        $status = $result->delete();

        if($status) return redirect('admin/category')->with('success', 'Data category berhasil dihapus');
        else return redirect('admin/category')->with('error', 'Data category gagal dihapus');
    }
}
