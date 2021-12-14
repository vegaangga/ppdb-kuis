@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
    <form method="post" action="{{ route('formulir.store') }}" id="myForm" enctype="multipart/form-data">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
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
                    <div class="form-group">
                        <label for="Nim">Nisn</label>
                        <br>
                        <input type="text" name="user_id" class="form-control" id="user_id" aria-describedby="user_id" value="{{ Auth::user()->id }}" readonly hidden>
                        <input type="text" name="nisn" class="form-control" id="Nim" aria-describedby="Nim" value="{{ Auth::user()->nisn }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <br>
                        <input type="Nama" name="nama" class="form-control" id="Nama" aria-describedby="Nama" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <br>
                        <select class="form-control" name="jk" required="">
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <br>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="No_Handphone">No Handphone</label>
                        <br>
                        <input type="no_telp" name="no_telp" class="form-control" id="no_telp" aria-describedby="no_telp" >
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Foto</label>
                        <br>
                        <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto" >
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <br>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" >
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tempat Lahir</label>
                        <br>
                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" >
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Alamat</label>
                        <br>
                        <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" >
                    </div>

            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
            </div>
            <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="Nim">Asal Sekolah</label>
                        <br>
                        <input type="text" name="asal_sekolah" class="form-control" id="Nim" aria-describedby="add_ijazah" >
                    </div>
                    <div class="form-group">
                        <label for="Nim">Upload Ijazah SMP</label>
                        <br>
                        <input type="file" name="add_ijazah" class="form-control" id="add_ijazah" aria-describedby="add_ijazah">
                    </div>

            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Orang Tua</h6>
            </div>
            <div class="card-body">

                    @csrf
                    <div class="form-group">
                        <label for="Nim">Status Ayah</label>
                        <br>
                        <select class="form-control" name="jk" required="">
                            <option value="H">Masih Hidup</option>
                            <option value="M">Sudah Meninggal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama Ayah</label>
                        <br>
                        <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" >
                    </div>
                    <div class="form-group">
                        <label for="Nama">NIK Ayah</label>
                        <br>
                        <input type="text" name="nik_ayah" class="form-control" id="nik_ayah" aria-describedby="nik_ayah" >
                    </div>
                    <div class="form-group">
                        <label for="Nama">Pekerjaan Ayah</label>
                        <br>
                        <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah" >
                    </div>
                    <div class="form-group">
                        <label for="Nama">Penghasilan Ayah</label>
                        <label for="Nama">(Per-bulan)</label>
                        <br>
                        <input type="text" name="gaji_ayah" class="form-control" id="gaji_ayah" aria-describedby="gaji_ayah" >
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="Nim">Status Ibu</label>
                        <br>
                        <select class="form-control" name="jk" required="">
                            <option value="H">Masih Hidup</option>
                            <option value="M">Sudah Meninggal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama Ibu</label>
                        <br>
                        <input type="text" name="nama_ibu" class="form-control" id="nama_ayah" aria-describedby="nama_ayah" >
                    </div>
                    <div class="form-group">
                        <label for="Nama">NIK Ibu</label>
                        <br>
                        <input type="text" name="nik_ibu" class="form-control" id="nik_ayah" aria-describedby="nik_ayah" >
                    </div>
                    <div class="form-group">
                        <label for="Nama">Pekerjaan Ibu</label>
                        <br>
                        <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah" >
                    </div>
                    <div class="form-group">
                        <label for="Nama">Penghasilan Ibu</label>
                        <label for="Nama">(Per-bulan)</label>
                        <br>
                        <input type="text" name="gaji_ibu" class="form-control" id="gaji_ayah" aria-describedby="gaji_ayah" >
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin Menyimpan data ini?')">Confirm</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection