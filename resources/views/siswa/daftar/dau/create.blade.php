@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Upload Struk Pembayaran Daftar Ulang </h6>
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
                <form method="post" action="{{ route('daftar-ulang.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                        <input type="text" name="user_id" class="form-control" id="user_id" aria-describedby="user_id" value="{{ Auth::user()->id }}" readonly>
                    <div class="form-group">
                        <label for="Nim">Nisn</label>
                        <br>
                        <input type="text" name="nisn" class="form-control" id="Nim" aria-describedby="Nim" value="{{ Auth::user()->nisn }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <br>
                        <input type="Nama" name="nama" class="form-control" id="Nama" aria-describedby="Nama" value="{{ Auth::user()->name }}" readonly >
                    </div>
                    <div class="form-group">
                        <label for="struk">Upload Struk Pembayaran</label>
                        <br>
                        <input type="file" name="struk" class="form-control" id="struk" aria-describedby="struk" >
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
</div>

</div>
@endsection