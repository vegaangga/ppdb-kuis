@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
    @php
    $a = Auth::user()->verif_daftar;
    $b = Auth::user()->data_diri;
    $c = Auth::user()->verif_dau;
@endphp
    @include('layouts.petunjuk')
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Struk Daftar Ulang</h6>
            </div>
            <div class="card-body">
                @if($a == null)
                <p>
                    Biaya Pendaftaran Untuk PPDB SMAN 1 Puri adalah 150.000
                </p>
                <a href="{{ route('biaya.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                    <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                    Upload Struk Pembayaran
                </a>
                @endif

                @if ($a==false)
                <p>Tunggu Admin Mengkonfirmasi Struk Anda </p>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc">User ID</th>
                                <th>Nama</th>
                                <th>Struk</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">

                            @foreach($datas as $data)
                            <tr>
                                <td>{{ $data->user_id}}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>
                                    <a href="{{route('daftar-ulang.show', $data->user_id)}}">
                                        Lihat Struk
                                    </a>
                                </td>
                                <td>
                                    @if ($data->status == 'belum')
                                        <label class="badge badge-warning">Belum Terverifikasi</label>
                                    @else
                                        <label class="badge badge-success">Sudah Terverifikasi</label>
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
</div>
@endsection