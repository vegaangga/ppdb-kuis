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
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
              <p>{{ $message }}</p>
              </div>
              @endif
              <p>{{ $message }}</p>
                {{-- <table style="width:100%">
                    <tr>
                      <td rowspan="8" align="center" style="padding: right 0;">
                        <img src="{{asset('homepage/img/castle.jpg')}}" style="width: 200px;"></td>
                      <th>NISN</th>
                      <td>{{$siswa->nisn}}</td>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <td>{{$siswa->nama}}</td>
                    </tr>
                      <th>Tanggal Lahir</th>
                      <td>{{$siswa->tgl_lahir}}</td>
                    </tr>
                    <tr>
                      <th>Jenis Kelamin</th>
                      <td>{{$siswa->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                      <th>No Handphone</th>
                      <td>{{$siswa->no_handphone}}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{$siswa->email}}</td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <th>
                          <a class="btn btn-warning mt-3" href="{{ route('siswa.edit',$siswa->nisn) }}">Edit Profil</a>
                          <a class="btn btn-primary mt-3" href="{{ route('siswa.cetak',$siswa->nisn) }}">Cetak Formulir</a>
                        </th>

                    </tr>
                  </table>
            </div>
        </div>
</div> --}}

</div>
@endsection