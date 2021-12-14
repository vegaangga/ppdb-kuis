@extends('layouts.main')
@section('menu_home', 'active')
@section('content')

@php $a = Auth::user()->level ; @endphp
@if($a == 0)
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-5">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Pendaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user_aktif->count()}}</div>
                    </div>
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                    <div class="col-auto">
                        <a href="{{route('user.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-5">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Validasi Biaya Daftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$biaya->count()}}</div>
                    </div>
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                    <div class="col-auto">
                        <a href="{{route('biaya.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-5">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Validasi Data Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$siswa->count()}}</div>
                    </div>
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                    <div class="col-auto">
                        <a href="{{route('formulir.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-5">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Validasi Daftar Ulang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dau->count()}}</div>
                    </div>
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                    <div class="col-auto">
                        <a href="{{route('daftar-ulang.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Approach -->
         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Data User Terdaftar</h6>
             </div>
             <div style="margin-top:20px; margin-left:20px">
              <a href="{{ route('user.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff" style="width: 175px; background-color: #496edb; color:white;">
              <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
              Tambah Data
              </a>
              <div class="btn-group dropdown">
                <a href="#" type="button" class="btn btn-danger" data-toggle="dropdown"  data-color="#ffffff">
                    <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                    Download Data
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('laporan/user/excel')}}">Excel</a>
                    <a class="dropdown-item" href="{{url('laporan/user/pdf')}}">PDF</a>
                </div>
            </div>
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
                 <table class="table table-bordered" id="dataTable">
                  <thead>
                      <tr>
                          <th> Nisn </th>
                          <th> Nama </th>
                          <th> Email </th>
                          <th> Level </th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach($user_aktif as $data)
                      <tr>
                        <td>{{$data->nisn}}</td>
                        <td>
                          <a href="{{route('user.show', $data->id)}}">
                          {{$data->name}}
                          </a>
                        </td>
                        <td>{{$data->email}}</td>
                        <td>
                          @if ($data->level == '1')
                          <p>Siswa</p>
                          @endif
                        </td>
                        <td>
                          <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                              <a href="{{ route('user.show', $data->id) }}" class="btn" style="background-color: cyan">
                                  <i class="icon-copy fa fa-info-circle" aria-hidden="true"></i>
                              </a>
                              <a href="{{route('user.edit', $data->id)}}" class="btn" data-bgcolor="#ffc107" data-color="#ffffff">
                                  <i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i>
                              </a>
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Anda yakin ingin meghapus data ini ?')" class="btn btn-danger" >
                              <i class="icon-copy fa fa-trash" aria-hidden="true"></i>
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

{{-- <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endif
<!-- Siswa Content -->

    @if($a == 1)
    <div class="row">
        @include('layouts.petunjuk')
        {{-- -- --}}
        <div class="col-lg-12 mb-4">
            <!-- Approach -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">{{ __('You are logged in!') }}</h6>
                 </div>
                 <div class="card-body">
                     @if (session('status'))
                     <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                     </div>
                     @endif
                     Selamat datang di sistem informasi Penerimaan Peserta Didik Baru (PPDB) Online
                                              <br>SMA NEGERI 1 PURI
                                              <br><br>
                                              Panduan Pendaftaran:
                                              <br>1. Isi seluruh formulir yang ditampilkan kemudian periksa kembali, pastikan tidak ada data yang salah.
                                              <br>2. Klik submit, kemudian klik Confirm. Setelah di-confirm, data tidak dapat diubah kembali.
                                              <br>3. Jika anda sudah menyelesaikan seluruh step, bukti dokumen akan ditampilkan dan dapat diunduh menjadi PDF
                                              <br>
                                              <br>*Note: Pihak sekolah baru akan menerima data Anda setelah Anda klik 'Confirm'


                 </div>
             </div>
        </div>
     </div>


    @endif
    {{-- <script src="{{asset('template\js\jquery-steps\jquery.steps.js')}}"></script>
    <script src="{{asset('template\vendor\steps-setting.js')}}"></script> --}}

@endsection

