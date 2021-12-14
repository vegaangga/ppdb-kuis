@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
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
                                         <br>3. Jika sudah, bukti pendaftaran akan ditampilkan dan dapat diunduh menjadi PDF
                                         <br>
                                         <br>*Note: Pihak sekolah baru akan menerima data Anda setelah Anda klik 'Confirm'


            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-4">
        <!-- Approach -->
         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">{{ __('You are logged in!') }}</h6>
             </div>
             <div class="card-body">

                 

             </div>
         </div>
     </div>

</div>
@endsection