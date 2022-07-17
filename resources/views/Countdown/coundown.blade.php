@extends('layouts.dashboard_sidebar')

@section('content')
@section('Countdown')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
  <span class="breadcrumb-item active">Countdown</span>
</nav>
@endsection
<div class="container">
  <div class="row">
    <div class="col-8">
      {{$countdown}}
      <div class="card text-white">
          <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Coundown Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse($countdown as $coupon)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$coupon->count_date}}</td>
                            <td>
                              <a href="" type="button" class="btn mr-2 btn-primary">Edit</a>
                                <form action="" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-danger text-center">
                            <td colspan="100"> Data Not Available</td>
                        </tr>
                  @endforelse
                </tbody>
                <button type="submit" class="btn btn-danger">Checked Delete</button>
              </table>
            </div>
          </div>
        </div>
    <div class="col-4">
      <div class="card text-white">
        <div class="card-header bg-success">Add Your Category</div>
          <div class="card-body">
            <form action="{{route('index.store')}}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-success">Expire Date</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Please Input Categories Name" name="count_date">
                  @error('categories_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('footer_script')
<script>
  $(document).ready(function(){
    $('#clickd').click(function(){
      Swal.fire({
            title: 'Are you sure?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
              window.location.href = 'categories/all/delete'
        }
      })
    })
  })
</script>
@endsection
