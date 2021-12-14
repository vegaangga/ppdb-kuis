@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                {{ __('You are logged in!') }}
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
                <table class="table table-responsive">
                    <tr>
                        <th>Name</th>
                        <th>:</th>
                        <td>{{ $user -> name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <td>{{ $user -> email}}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <th>:</th>
                        <td>{{ $user -> created_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
</div>

</div>
@endsection