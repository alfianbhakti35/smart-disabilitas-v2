<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\User;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        return view('admin.matakuliah',[
            "title" => "Mata Kuliah",
            "matkul" => MataKuliah::all(),
            "user" => User::where('level',"Dosen")->get(),
            "prodi" => Prodi::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.e_matakuliah',[
            "title" => "Mata Kuliah",
            "matkul" => MataKuliah::where('id',$id)->first(),
            "user" => User::where('level',"Dosen")->get(),
            "prodi" => Prodi::all()
        ]);
    }
    
    public function create()
    {
       
    }

    
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'nama'  => 'required',
            'user_id' => 'required',
            'prodi_id' => 'required',
            'semester' => 'required'
        ]);
        
        MataKuliah::create($validatedDate);

        return redirect('/admin/matakuliah')->with('success','New matkul has been addedd!');
    }

    public function show($id){

    }

    public function update(Request $request,$id)
    {
        $validatedDate = $request->validate([
            'nama'  => 'required',
            'user_id' => 'required',
            'prodi_id' => 'required',
            'semester' => 'required'
        ]);

        MataKuliah::where('id', $id)->update($validatedDate);

        return redirect('/admin/matakuliah')->with('success','Matkul has been update!');
    }

    public function destroy($id)
    {   
        MataKuliah::destroy($id);

        return redirect('/admin/matakuliah')->with('success','Matkul has been delted!');
    }
}
