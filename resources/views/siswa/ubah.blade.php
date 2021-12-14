@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir</h6>
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
                <form method="POST" action="{{ route('siswa.update', $siswa->nisn) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Nim">Nisn</label>
                        <br>
                        {{-- $anggota = Anggota::where('nis', $nis)->first();
                        @php $a = Auth::user()->nisn --}}
                        <input type="text" name="nisn" class="form-control" id="Nim" aria-describedby="Nim" value="{{ $siswa->nisn }}">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <br>
                        <input type="Nama" name="nama" class="form-control" id="Nama" aria-describedby="Nama" value="{{ $siswa->nama }}" >
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <br>
                        <input type="jenis_kelamin" name="jenis_kelamin" class="form-control" id="jenis_kelamin" aria-describedby="jenis_kelamin"  value="{{ $siswa->jenis_kelamin }}">
                    </div>
                    <div class="form-group">
                        <label for="No_Handphone">No Handphone</label>
                        <br>
                        <input type="No_Handphone" name="no_handphone" class="form-control" id="No_Handphone" aria-describedby="No_Handphone" value="{{ $siswa->no_handphone }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <br>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="{{ $siswa->email }}" >
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <br>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" value="{{ $siswa->tgl_lahir }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
</div>

</div>
@endsection