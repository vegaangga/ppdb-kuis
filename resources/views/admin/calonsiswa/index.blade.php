@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div style="margin-top:20px; margin-left:20px">
                <a href="{{ route('formulir.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff" style="width: 175px; background-color: #496edb; color:white;">
                <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                Tambah Data
                </a>
                <div class="btn-group dropdown">
                  <a href="#" type="button" class="btn btn-danger" data-toggle="dropdown"  data-color="#ffffff">
                      <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                      Download Data
                  </a>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{url('laporan/siswa/excel')}}">Excel</a>
                      <a class="dropdown-item" href="{{url('laporan/siswa/pdf')}}">PDF</a>
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
                            <th>Alamat</th>
                            <th>Asal Sekolah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $data->user->nisn}}</td>
                            <td><a href="{{route('formulir.show', $data->user_id)}}">
                                {{ $data->user->name }}
                            </a></td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->asal_sekolah }}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">

                                        <form action="{{ route('formulir.edit', $data->user_id) }}" method="get" enctype="multipart/form-data">
                                            <button class="dropdown-item">
                                                Edit
                                            </button>
                                        </form>

                                        <form action="{{ route('formulir.destroy', $data->user_id) }}" class="pull-left"  method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                            <button id="tombol" class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                                            </button>
                                        </form>
                                    </div>
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

<script>

</script>


@endsection
