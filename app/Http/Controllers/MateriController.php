<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\MataKuliah;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.materi', [
            'title' => 'Materi',
            'data' => Materi::all(),
            'matkul' => MataKuliah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.materi.edit',[
            "title" => "Materi",
            "matkul" => MataKuliah::all(),
            "materi" => Materi::where('id',$id)->first()
        ]);
    }
    
    public function create()
    {
        return view('admin.materi.tambah',[
            "title" => "Materi",
            "matkul" => MataKuliah::all()
        ]);
    }

    
    public function store(Request $request)
    {
        
        $validatedDate = $request->validate([
            'matkul_id'  => 'required',
            'judul_materi' => 'required',
            'materi_tunanetra' => 'file|required',
            'materi_tunarungu' => 'file|required',
            'materi_slowlearning' => 'required'
        ]);
        
        if($request->file('materi_tunanetra') && $request->file('materi_tunarungu')){
            $validatedDate['materi_tunanetra'] = $request->file('materi_tunanetra')->store('/public/materi');
            $validatedDate['materi_tunarungu'] = $request->file('materi_tunarungu')->store('/public/materi');
        }else{
            echo "gagal";
        }

        Materi::create($validatedDate);

        return redirect('/admin/materi')->with('success','New materi has been addedd!');
    }

    public function show($id){

    }

    public function update(Request $request,$id)
    {
        $validatedDate = $request->validate([
            'matkul_id'  => 'required',
            'judul_materi' => 'required',
            'materi_slowlearning' => 'required'
        ]);
        
        if($request->file('materi_tunanetra') && $request->file('materi_tunarungu')){

            if($request->oldmateri_tunanetra && $request->oldmateri_tunarungu){
                Storage::delete($request->oldmateri_tunanetra);
                Storage::delete($request->oldmateri_tunarungu);
            }
            $validatedDate['materi_tunanetra'] = $request->file('materi_tunanetra')->store('/public/materi');
            $validatedDate['materi_tunarungu'] = $request->file('materi_tunarungu')->store('/public/materi');
        }
        else if($request->file('materi_tunanetra')){

            if($request->oldmateri_tunanetra){
                Storage::delete($request->oldmateri_tunanetra);
            }
            $validatedDate['materi_tunanetra'] = $request->file('materi_tunanetra')->store('/public/materi');
        }
        else if($request->file('materi_tunarungu')){
            
            if($request->oldmateri_tunarungu){
                Storage::delete($request->oldmateri_tunarungu);
            }
            $validatedDate['materi_tunarungu'] = $request->file('materi_tunarungu')->store('/public/materi');
        }

        Materi::where('id', $id)->update($validatedDate);

        return redirect('/admin/materi')->with('success','Materi has been update!');
    }

    public function destroy($id)
    {   
        $data = Materi::where('id',$id)->first()->materi_tunarungu;
        $data = Materi::where('id',$id)->first()->materi_tunanetra;
        if($data){
            Storage::delete($data);
        }

        Materi::destroy($id);

        return redirect('/admin/materi')->with('success','Materi has been delted!');
    }
}
