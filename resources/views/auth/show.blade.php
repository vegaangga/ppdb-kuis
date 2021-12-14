@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data-User</h6>
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <tr>
                        <th>NISN</th>
                        <th>:</th>
                        <td>{{ $data ->nisn}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <td>{{ $data ->name}}</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <th>:</th>
                        <td>{{ $data ->email}}</td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <th>:</th>
                        <td>{{ $data ->level}}</td>
                    </tr>
                    <tr>
                        <th>
                            <button type="button" class="btn btn-danger" onclick="history.back();">Back</button>
                        </th>
                        <th>
                            {{-- <form action="{{ route('admin.edit', $data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success">Edit</button>
                            </form> --}}
                        </th>

                    </tr>
                </table>
            </div>
        </div>
</div>

</div>
@endsection