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
<div class="card">
    <div class="card-header">Helo Coustomer</div>
        <div class="card-body">
          <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Total Amount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if(!empty($oders))
      @forelse($oders as $oder)
      <tr>
        <td>{{$oder->customer_name}}</td>
        <td>{{$oder->customer_phone}}</td>
        <td>{{$oder->customer_email}}</td>
        <td>{{$oder->total}}</td>
        <td>
          <a href="{{url('download/pdf')}}/{{$oder->id}}">  <i class="fa fa-download mr-2"></i>Download</a>
        </td>
      </tr>
      @empty
      <tr>
        <th>Name</th>
      </tr>
      @endforelse
      @endif
    </tbody>
  </table>
        </div>
</div>
@endsection
