@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Siswa</h6>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                    @csrf
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Nisn</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="nisn" class="form-control" id="user_nisn" aria-describedby="Nim" readonly value="{{ $data->user->nisn}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('user_id') ? ' has-error' : '' }}">
                        <label for="user_id" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="nama" class="form-control" id="user_nisn" aria-describedby="Nim" readonly value="{{ $data->user->name}}">
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="jk" class="form-control" id="user_nisn" aria-describedby="Nim" readonly value="{{ $data->jk}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="user_email" aria-describedby="email" readonly value="{{ $data->user->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="no_telp" name="no_telp" class="form-control" id="no_telp" aria-describedby="no_telp" value="{{ $data->no_telp}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <img height="250" width="250" @if($data->foto) src="{{ asset('images/foto_siswa/'.$data->foto) }}" @endif />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" value="{{ $data->tgl_lahir}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" value="{{ $data->tempat_lahir}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" value="{{ $data->alamat}}" readonly>
                            </div>
                        </div>
                    </div>

                </div>

        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
            </div>
            <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="asal_sekolah" class="form-control" id="Nim" aria-describedby="add_ijazah" value="{{ $data->asal_sekolah}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Upload Ijazah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <img height="250" width="250" @if($data->add_ijazah) src="{{ asset('images/ijazah_siswa/'.$data->add_ijazah) }}" @endif />
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Orang Tua</h6>
                </div>
                <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">Status Ayah</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="status_ayah" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" value="{{ $data->status_ayah}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">Nama Ayah</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" value="{{ $data->nama_ayah}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">NIK Ayah</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="nik_ayah" class="form-control" id="nik_ayah" aria-describedby="nik_ayah" value="{{ $data->nik_ayah}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah" value="{{ $data->pekerjaan_ayah}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class=" col-sm-2 col-form-label">Penghasilan Ayah</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="gaji_ayah" class="form-control" id="gaji_ayah" aria-describedby="gaji_ayah" placeholder="Perbulan" value="{{ $data->gaji_ayah}}" readonly>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">Status Ibu</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="status_ibu" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" value="{{ $data->status_ibu}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">Nama Ibu</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="nama_ibu" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" value="{{ $data->nama_ibu}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">NIK Ibu</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="nik_ibu" class="form-control" id="nik_ayah" aria-describedby="nik_ayah" value="{{ $data->nik_ibu}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah" value="{{ $data->pekerjaan_ibu}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class=" col-sm-2 col-form-label">Penghasilan Ibu</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="gaji_ibu" class="form-control" id="gaji_ayah" aria-describedby="gaji_ayah" placeholder="Perbulan" value="{{ $data->gaji_ibu}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for=""></label>
                            <a href="{{route('formulir.index')}}" class="btn btn-primary">Back</a>
                        </div>
                </div>
            </div>
</div>
</div>

@endsection