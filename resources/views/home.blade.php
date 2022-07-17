@extends('layouts.dashboard_sidebar')

@section('content')
@section('dashboard')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a>
  <a class="breadcrumb-item" href="index.html">Pages</a> -->
  <span class="breadcrumb-item active">Dashboard</span>
</nav>
@endsection
<h1>Role:{{Auth::User()->role}}</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if(Auth::User()->role == 1)
          <div class="card">
                <div class="card-header">Hello Admin</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert text-center alert-success">
                      Tottal Users: {{ $user->count() }}
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SR No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($user as $users)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->created_at->diffForHumans() }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{ $user->links() }}
                </div>

            </div>
          @else
              @include('customer.dashboard')
          @endif
        </div>
    </div>
</div>
@endsection
