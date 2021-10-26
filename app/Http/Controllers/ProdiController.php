<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProdiController extends Controller
{
    public function index()
    {
        return view('admin.prodi',[
            "title" => "prodi",
            "fakultas" => Faculty::all(),
            "prodi" => Prodi::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.e_prodi',[
            "title" => "prodi",
            "fakultas" => Faculty::all(),
            "prodi" => Prodi::where('id',$id)->first()
        ]);
    }
    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
        $validatedDate = $request->validate([
            'nama'  => 'required',
            'fakultas_id' => 'required'
        ]);
        
        Prodi::create($validatedDate);

        return redirect('/admin/prodi')->with('success','New prodi has been addedd!');
    }

    public function show($id){

    }

    public function update(Request $request,$id)
    {
        $validatedDate = $request->validate([
            'nama'  => 'required',
            'fakultas_id' => 'required'
        ]);

        Prodi::where('id', $id)->update($validatedDate);

        return redirect('/admin/prodi')->with('success','Prodi has been update!');
    }

    public function destroy($id)
    {   
        Prodi::destroy($id);

        return redirect('/admin/prodi')->with('success','prodi has been delted!');
    }
}
