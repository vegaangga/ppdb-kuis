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
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Asal Sekolah</th>
                            <th>No Handphone</th>
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
                            <td>{{ $data->no_telp }}</td>

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
