<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fakultas',[
            "title" => "Fakultas",
            "fakultas" => Faculty::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.e_fakultas',[
            "title" => "Fakultas",
            "fakultas" => Faculty::where('id',$id)->first()
        ]);
    }
    
    public function create()
    {

    }

    
    public function store(Request $request)
    {
        
        $validatedDate = $request->validate([
            'nama'  => 'required',
        ]);
        
        Faculty::create($validatedDate);

        return redirect('/admin/fakultas')->with('success','New Fakultas has been addedd!');
    }

    public function show($id){

    }

    public function update(Request $request,$id)
    {
        $validatedDate = $request->validate([
            'nama'  => 'required',
        ]);

        Faculty::where('id', $id)->update($validatedDate);

        return redirect('/admin/fakultas')->with('success','Fakultas has been update!');
    }

    public function destroy($id)
    {   
        Faculty::destroy($id);

        return redirect('/admin/fakultas')->with('success','Fakultas has been delted!');
    }
}
