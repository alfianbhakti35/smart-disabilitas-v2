@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Materi</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Materi
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
                                    Materi
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Materi</p>
                            <form method="post" action="/admin/materi" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="matkul">Mata Kuliah</label>
                                            <select class="form-control @error('matkul_id') is-invalid @enderror" name="matkul_id" id="matkul_id" autofocus>
                                             <option value="">~ Pilih Mata Kuliah ~</option>
                                             @foreach ($matkul as $matkul)
                                                 @if (old('matkul_id') == $matkul->id)
                                                 <option value="{{ $matkul->id }}" selected>{{ $matkul->nama }}</option>
                                                 @else
                                                 <option value="{{ $matkul->id }}">{{ $matkul->nama }}</option>
                                                 @endif
                                             @endforeach
                                            </select>
                                            @error('matkul_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul Materi</label>
                                            <input type="text" name="judul_materi" id="judul_materi" placeholder="Judul Materi" class="form-control  @error('judul_materi') is-invalid @enderror" value="{{ old('judul_materi') }}">
                                            @error('judul_materi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                             @enderror
                                        </div>
                                         <div class="form-group">
                                             <label for="materi_tunanetra">Materi Tuna Netra</label>
                                             <input type="file" name="materi_tunanetra" id="materi_tunanetra" placeholder="Audio Materi" class="form-control @error('materi_tunanetra') is-invalid @enderror" value="{{ old('materi_tunanetra') }}">
                                             <p>*Materi Audio</p>
                                             @error('materi_tunanetra')
                                             <div class="invalid-feedback">
                                                 {{ $message }}
                                             </div>
                                         @enderror
                                         </div>
                                         <div class="form-group">
                                             <label for="materi_tunarungu">Materi Tuna Rungu</label>
                                             <input type="file" name="materi_tunarungu" id="materi_tunarungu" placeholder="Video Materi" class="form-control @error('materi_tunarungu') is-invalid @enderror" value="{{ old('materi_tunarungu') }}">
                                             <p>*Materi PDF</p>
                                             @error('materi_tunarungu')
                                             <div class="invalid-feedback">
                                                 {{ $message }}
                                             </div>
                                         @enderror
                                         </div>
                                         <div class="form-group">
                                             <label for="materi_slowlearning">Slow Learning</label>
                                             <input type="text" name="materi_slowlearning" id="materi_slowlearning" placeholder="Url Video" class="form-control  @error('materi_slowlearning') is-invalid @enderror" value="{{ old('materi_slowlearning') }}">
                                             @error('materi_slowlearning')
                                             <div class="invalid-feedback">
                                                 {{ $message }}
                                             </div>
                                              @enderror
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
                            <th style="width: 40%">Matakuliah</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Matakuliah</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)

                        <tr>
                            <td>{{ $d['nama'] }}</td>
                            @foreach ($matkul as $m)
                                @if ($m->id == $materi->matkul_id)
                                <td>{{ $m->nama }}</td>
                            @endif
                            @endforeach
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
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
