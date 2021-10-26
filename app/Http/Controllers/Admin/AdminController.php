<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\Faculty;
use App\Models\MataKuliah;
use App\Models\Materi;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', ['title' => 'Dashboard']);
    }

    // Fitur Mahasiswa
    public function mahasiswa()
    {
        return view('admin.mahasiswa', [
            'title' => 'Mahasiswa',
            'data' => User::all()
        ]);
    }

    public function importMahasiswa(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('import', $nameFile);

        Excel::import(new UsersImport, public_path('/import/' . $nameFile));
        return redirect('/admin/mahasiswa');
    }

    public function downloadMhs()
    {
        return response()->download(public_path('/files/format/Format Import Mahasiswa.xlsx'));
    }
    
    // View Fitur Dosen
    public function dosen()
    {

        return view('admin.dosen', [
            'title' => 'Dosen',
            'data' => User::all(),
            'prodi' => Prodi::all()
        ]);
    }

    // Create Dosen
    public function storeDosen(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
        ]);

        $data['level'] = 'dosen';
        $data['password'] = Hash::make($data['username']);

        User::create($data);
        return redirect('/admin/dosen')->with('success', 'Prodi Berhasil di Tambah');
    }
}
