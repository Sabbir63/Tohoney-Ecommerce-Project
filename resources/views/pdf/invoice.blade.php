
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style media="screen">
      .float_left{
        float : left;
      }
    </style>
  </head>
  <body>
   <div class="col-lg-12">
     <div class="container">
      <div class="card">
        <div class="card-header">
          <h3>Your Invoice</h3>
          <!-- <span class="float-right"> <strong>Status:</strong> Pending</span> -->
        </div>
        <div class="card-body">
          <div class="col-lg-12">
          <div class="row mb-4">
            <div class="col-sm-6">
              <div>
                <strong>Order Date : {{$data->created_at}}</strong>
                <strong>Name :{{$data->customer_name}}</strong>
              </div>
              <div>Address: {{$data->customer_address}}</div>
              <div>Email: {{$data->customer_email}}</div>
              <div>Phone: {{$data->customer_phone}}</div>
            </div>
          </div>
          </div>

          <div class="table-responsive-sm">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="center">Serial No</th>
                  <th>Order Id</th>
                  <th>Item Name</th>
                  <th class="right">Unit Cost</th>
                  <th class="center">Qty</th>
                  <th class="center">Discount</th>
                  <th class="right">Total</th>
                </tr>
              </thead>
              <tbody>
                @forelse($order_details as $order_detail)
                <tr>
                  <td class="center">{{$loop->index + 1}}</td>
                  <td class="left strong">{{$order_detail->order_id}}</td>
                  <td class="left">{{$order_detail->relationtoproduct->product_name}}</td>
                  <td class="right">${{$order_detail->relationtoorder->subtotal}}</td>
                  <td class="center">{{$order_detail->quantity}}</td>
                  <td class="center">{{$order_detail->relationtoorder->discount}}%</td>
                  <td class="right">${{$order_detail->relationtoorder->total}}</td>
                </tr>
                @empty
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5">

            </div>

            <div class="col-lg-4 col-sm-5 ml-auto">
              <table class="table table-clear">
                <tbody>
                  <tr>
                    <td class="left">
                      <strong>Subtotal</strong>
                      <td class="right">${{$data->subtotal}}</td>
                    </td>
                  </tr>
                  <tr>
                    <td class="left">
                      <strong>Discount ({{$data->discount}}%)</strong>
                      <td class="right">${{$data->total}}</td>
                    </td>
                  </tr>
                  <tr>
                    <td class="left">
                      <strong>Total</strong>
                    </td>
                    <td class="right">
                      <strong>${{$data->total}}</strong>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div>

        </div>
      </div>
    </div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
