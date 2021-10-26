@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Program Studi</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Prodi
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                Tambah</span>
                                <span class="fw-light">
                                    Prodi
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Nama Prodi</p>
                            <form action="/admin/prodi" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="fakultas">Fakultas</label>
                                            <select class="form-control @error('fakultas_id') is-invalid @enderror" name="fakultas_id" id="fakultas_id" autofocus>
                                                <option value="">~ Pilih Fakultas ~</option>
                                            @foreach ($fakultas as $f)
                                                 @if (old('fakultas_id') == $f->id)
                                                 <option value="{{ $f->id }}" selected>{{ $f->nama }}</option>
                                                 @else
                                                 <option value="{{ $f->id }}">{{ $f->nama }}</option>
                                                 @endif
                                             @endforeach
                                            </select>
                                            @error('fakultas_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                       <div class="form-group">
                                           <label for="nama">Nama</label>
                                           <input type="text" name="nama" id="nama" placeholder="nama program studi" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                           @error('nama')
                                           <div class="invalid-feedback">
                                               {{ $message }}
                                           </div>
                                            @enderror
                                       </div>
                                    </div>

                                </div>

                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th style="width: 40%">Fakultas</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Fakultas</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($prodi as $prodi)

                        <tr>
                            <td>{{ $prodi['nama'] }}</td>
                            @foreach ($fakultas as $f)
                                @if ($f->id == $prodi->fakultas_id)
                                <td>{{ $f->nama }}</td>
                                @endif
                            @endforeach
                            <td><a href="/admin/prodi/{{ $prodi->id }}/edit"><i class="fas fa-edit"></i></a> | 
                                <form action="/admin/prodi/{{ $prodi->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="text-danger bg-transparent border-0" onclick="return confirm('Yakin ingin mengahpus?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
