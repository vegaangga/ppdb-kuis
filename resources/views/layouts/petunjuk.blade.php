
@php
$a = Auth::user()->verif_daftar;
$b = Auth::user()->data_diri;
$c = Auth::user()->verif_dau;
@endphp
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-12">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Struk Pembayaran Anda</div>
                        @if ($a==true)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Terverifikasi</div>
                        @endif
                        @if ($a=='0')
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div>
                        @endif
                        @if ($a==null)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Upload Data</div>
                        @endif
                </div>
                        @if ($a==true)
                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300" style="color: #2fbd5b"></i></div>
                        @endif
                        @if ($a=='0')
                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                        @endif
                        @if ($a==null)
                        <div class="col-auto"><i class="fas fa-minus-circle fa-2x text-gray-300"></i></div>
                        @endif
                <div class="col-auto">
                    @if ($a==true)
                    <a href="{{route('biaya.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                        @if ($a=='0')
                        <a href="{{route('biaya.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                        @if ($a==null)
                        <a href="{{route('biaya.create')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-5">

                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Isi Data Pribadi
                    </div>
                    @if ($b==true)
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Terverifikasi</div>
                    @endif
                    @if ($b=='0')
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div>
                    @endif
                    @if ($b==null)
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Upload Data</div>
                    @endif
                </div>
                @if ($b==true)
                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300" style="color: #2fbd5b"></i></div>
                        @endif
                        @if ($b=='0')
                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                        @endif
                        @if ($b==null)
                        <div class="col-auto"><i class="fas fa-minus-circle fa-2x text-gray-300"></i></div>
                        @endif
                <div class="col-auto">
                    @if ($a==true)
                    <a href="{{route('formulir.create')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                        @if ($a=='0')
                        <a href="{{route('formulir.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                        @if ($a==null)
                        <a href="{{route('formulir.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                </div>
            </div>
            <div>
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-5">

                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Cetak Data
                    </div>
                    @if ($b==true)
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Download Data Anda</div>
                    @endif
                    @if ($b=='0')
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Belum Tersedia</div>
                    @endif
                    @if ($b==null)
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Belum Tersedia</div>
                    @endif
                </div>
                @if ($b==true)
                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300" style="color: #2fbd5b"></i></div>
                        @endif
                        @if ($b=='0')
                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                        @endif
                        @if ($b==null)
                        <div class="col-auto"><i class="fas fa-minus-circle fa-2x text-gray-300"></i></div>
                        @endif
                <div class="col-auto">
                    @if ($b==true)
                    <a href="{{url('pdf')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                        @if ($b=='0')
                        <a href="" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                        @if ($b==null)
                        <a href="" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-3">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Upload Daftar Ulang</div>
                        @if ($c==true)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Terverifikasi</div>
                        @endif
                        @if ($c=='0')
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div>
                        @endif
                        @if ($c==null)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Upload Data</div>
                        @endif
                </div>
                @if ($c==true)
                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300" style="color: #2fbd5b"></i></div>
                        @endif
                        @if ($c=='0')
                        <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                        @endif
                        @if ($c==null)
                        <div class="col-auto"><i class="fas fa-minus-circle fa-2x text-gray-300"></i></div>
                        @endif

                <div class="col-auto">
                    @if ($b==true)
                        <a href="{{route('daftar-ulang.create')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                        @if ($b=='0')
                        <a href="{{route('daftar-ulang.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                        @if ($b==null)
                        <a href="{{route('daftar-ulang.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
