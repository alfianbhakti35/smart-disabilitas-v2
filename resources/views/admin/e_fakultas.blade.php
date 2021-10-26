@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Fakultas</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="/dosen/fakultas" class="btn btn-warning float-right"><i class="fas fa-angle-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="/admin/fakultas/{{ $fakultas->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                   <div class="form-group">
                       <label for="nama">nama fakultas</label>
                       <input type="text" name="nama" id="nama" placeholder="nama fakultas" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama', $fakultas->nama) }}">
                       @error('nama')
                       <div class="invalid-feedback">
                           {{ $message }}
                       </div>
                        @enderror
                   </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
