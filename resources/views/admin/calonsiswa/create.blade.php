@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
    <form method="post" action="{{ route('formulir.store') }}" id="myForm" enctype="multipart/form-data">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Calon Siswa</h6>
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
                                <input type="text" name="nisn" class="form-control" id="user_nisn" aria-describedby="Nim" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('user_id') ? ' has-error' : '' }}">
                        <label for="user_id" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                            <input id="user_name" type="text" class="form-control" readonly="" required>
                            <input id="user_id" type="hidden" name="user_id" value="{{ old('user_id') }}" required readonly="">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari User</b> <span class="fa fa-search"></span></button>
                            </span>
                            </div>
                            @if ($errors->has('user_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select class="form-control" name="jk">
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="user_email" aria-describedby="email" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="no_telp" name="no_telp" class="form-control" id="no_telp" aria-describedby="no_telp" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" >
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
                                <input type="text" name="asal_sekolah" class="form-control" id="Nim" aria-describedby="add_ijazah" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Upload Ijazah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" name="add_ijazah" class="form-control" id="add_ijazah" aria-describedby="add_ijazah">
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
                                <select class="form-control" name="status_ayah" required="">
                                    <option value="Hidup">Masih Hidup</option>
                                    <option value="Meninggal">Sudah Meninggal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Nama Ayah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">NIK Ayah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="nik_ayah" class="form-control" id="nik_ayah" aria-describedby="nik_ayah" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class=" col-sm-2 col-form-label">Penghasilan Ayah</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="gaji_ayah" class="form-control" id="gaji_ayah" aria-describedby="gaji_ayah" placeholder="Perbulan">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Status Ibu</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select class="form-control" name="status_ibu" required="">
                                    <option value="Hidup">Masih Hidup</option>
                                    <option value="Meninggal">Sudah Meninggal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Nama Ibu</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="nama_ibu" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">NIK Ibu</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="nik_ibu" class="form-control" id="nik_ayah" aria-describedby="nik_ayah" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class=" col-sm-2 col-form-label">Penghasilan Ibu</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="gaji_ibu" class="form-control" id="gaji_ayah" aria-describedby="gaji_ayah" placeholder="Perbulan">
                            </div>
                        </div>
                    </div>
                    <a href="{{route('formulir.index')}}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-danger"onclick="return confirm('Simpan Data?')">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>

{{-- Modal --}}

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th> NISN </th>
                            <th> Nama </th>
                            <th> Email </th>
                            <th> Level </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr class="pilih" data-user_id="<?php echo $data->id; ?>" data-user_nisn="<?php echo $data->nisn; ?>" data-user_email="<?php echo $data->email; ?>" data-user_name="<?php echo $data->name; ?>" >
                            <td>{{$data->nisn}}</td>
                            <td>
                                {{$data->name}}
                            </td>
                            <td>{{$data->email}}</td>
                            <td>
                                @if ($data->level == '1')
                                <p>Siswa</p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Script --}}
<script type="text/javascript">
    $(document).on('click', '.pilih', function (e) {
                 document.getElementById("user_name").value = $(this).attr('data-user_name');
                 document.getElementById("user_id").value = $(this).attr('data-user_id');
                 document.getElementById("user_email").value = $(this).attr('data-user_email');
                 document.getElementById("user_nisn").value = $(this).attr('data-user_nisn');
                 $('#myModal').modal('hide');
             });


              $(function () {
                 $("#lookup").dataTable();
             });

         </script>
@endsection