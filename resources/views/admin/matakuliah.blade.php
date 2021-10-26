@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Matakuliah</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Matakuliah
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
                                    Matakuliah
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Matakuliah</p>
                            <form action="/admin/matakuliah" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" placeholder="Nama mata kuliah" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama') }}" autofocus>
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                             @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user">Dosen</label>
                                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                                <option value="">~ Pilih dosen ~</option>
                                            @foreach ($user as $u)
                                                @if ($u->level == 'dosen')
                                                    @if (old('user_id') == $u->id)
                                                    <option value="{{ $u->id }}" selected>{{ $u->nama }}</option>
                                                    @else
                                                    <option value="{{ $u->id }}">{{ $u->nama }}</option>
                                                    @endif    
                                                @endif
                                            @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="prodi">Program studi</label>
                                            <select class="form-control @error('prodi_id') is-invalid @enderror" name="prodi_id" id="prodi_id">
                                                <option value="">~ Pilih program studi ~</option>
                                            @foreach ($prodi as $p)
                                                @if (old('prodi_id') == $p->id)
                                                <option value="{{ $p->id }}" selected>{{ $p->nama }}</option>
                                                @else
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                                @endif    
                                            @endforeach
                                            </select>
                                            @error('prodi_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <input type="number" name="semester" id="semester" placeholder="semester" min="1" max="8" class="form-control  @error('semester') is-invalid @enderror" value="{{ old('semester') }}" autofocus>
                                            @error('semester')
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
                            <th>#</th>
                            <th>Nama</th>
                            <th>Dosen</th>
                            <th>Program Studi</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Dosen</th>
                            <th>Program Studi</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($matkul as $matkul)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $matkul->nama }}</td>
                            @foreach ($user as $u)
                                @if ($u->id == $matkul->user_id)
                                <td>{{ $u->nama }}</td>
                                @endif
                            @endforeach
                            @foreach ($prodi as $p)
                                @if ($p->id == $matkul->prodi_id)
                                <td>{{ $p->nama }}</td>
                                @endif
                            @endforeach
                            <td>{{ $matkul->semester }}</td>
                            <td><a href="/admin/matakuliah/{{ $matkul->id }}/edit"><i class="fas fa-edit"></i></a> | 
                                <form action="/admin/matakuliah/{{ $matkul->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="text-danger bg-transparent border-0" onclick="return confirm('Yakin ingin mengahpus?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
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
