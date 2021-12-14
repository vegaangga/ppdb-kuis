@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <tr>
                        <th>Name</th>
                        <th>:</th>
                        <td>{{ $data -> user_id}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <td>{{ $data -> user-> name}}</td>
                    </tr>
                    <tr>
                        <th>Struk</th>
                        <th>:</th>
                        <td><img height="350" width="350" @if($data->struk) src="{{ asset('images/bd/'.$data->struk) }}" @endif /></td>
                    </tr>
                    <tr>
                        <th>
                            <a href="{{route('biaya.index')}}" type="button" class="btn btn-info" >
                                Kembali
                            </a>
                        </th>
                        

                    </tr>
                </table>
            </div>
        </div>
</div>

</div>
@endsection