@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Biaya Pendaftaran</h6>
            </div>
            <div style="margin-top:20px; margin-left:20px">
                <a href="{{ route('biaya.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff" style="width: 175px; background-color: #496edb; color:white;">
                <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                Tambah Data
                </a>
                <div class="btn-group dropdown">
                  <a href="#" type="button" class="btn btn-danger" data-toggle="dropdown"  data-color="#ffffff">
                      <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                      Download Data
                  </a>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{url('laporan/biaya/excel')}}">Excel</a>
                      <a class="dropdown-item" href="{{url('laporan/biaya/pdf')}}">PDF</a>
                  </div>
              </div>
            </div>
            <div class="card-body">
                {{-- <div class="search-icon-box card-box mb-30">
                    <input type="text" class="form-control" id="myInput" placeholder="Search" title="Type in a name"
                        style="background-color:rgb(250, 252, 252)">
                    <i class="search_icon dw dw-search"></i>
                </div> --}}
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Struk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $data->user->nisn}}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>
                                <a href="{{route('biaya.show', $data->user_id)}}">
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
                            <td>
                                @if ($data->status == 'belum')
                                <form action="{{ route('biaya.update', $data->user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-info btn-sm" onclick="return confirm('Anda yakin struk sudah benar?')">Verifikasi
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('biaya.destroy', $data->user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-info btn-sm" onclick="return confirm('Hapus Data?')">Hapus
                                    </button>
                                </form>
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

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


@endsection
