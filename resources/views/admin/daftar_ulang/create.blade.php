@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah data daftar-ulang</h6>
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
                <form method="post" action="{{ route('daftar-ulang.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf

                    {{-- <div class="form-group">
                        <label for="struk">Pilih User</label>
                        <br>

                            <select class="form-control" name="user_id" required="">
                                <option value="">(Cari User)</option>
                                @foreach($datas as $user)

                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                    </div> --}}
                    <div class="form-group row{{ $errors->has('user_id') ? ' has-error' : '' }}">
                        <label for="user_id" class="col-sm-2 col-form-label">User</label>
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

                    <div class="form-group">
                        <label for="struk">Upload Struk Foto</label>
                        <br>
                        <input type="file" name="struk" class="form-control" id="Nim" aria-describedby="Nim" value="{{ Auth::user()->nisn }}" >
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?')">Submit</button>

                    {{-- <button type="button" class="btn btn-danger" onclick="history.back();">Back</button> --}}
                </form>
            </div>
        </div>
</div>

</div>
<!-- Modal -->
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
                        <tr class="pilih" data-user_id="<?php echo $data->id; ?>" data-user_name="<?php echo $data->name; ?>" >
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
                 $('#myModal').modal('hide');
             });

             $(document).on('click', '.pilih_anggota', function (e) {
                 document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
                 document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
                 $('#myModal2').modal('hide');
             });

              $(function () {
                 $("#lookup, #lookup2").dataTable();
             });

         </script>


@endsection