use Barryvdh\DomPDF\PDF;
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eShop Pvt Ltd</title>
    <style>
        body{
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
            font-size: 12px
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #818bf1;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .allfont{
            font-size: 12px;

        }
        .heading{
            font-size: 15px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="">
                <div class="">
                    <h4 class="text-white">Ecommerce-Shop Pvt Ltd</h4>
                </div>

            </div>
        </div>

        <div class="body-section">
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->first_name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->email}}</td>
                    </tr>

                </tbody>
            </table>

            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Tracking No</th>
                        <th>Address 1</th>
                        <th>Address 2</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td> </td>
                        <td>{{$order->address}}</td>
                        <td> </td>
                    </tr>

                </tbody>
            </table>

        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (auth()->user()->carts as $cart )

                    <tr>
                    <td>{{$cart->product->name}}</td>
                    <td>{{$cart->price}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->quantity * $cart->price}}</td>
                    </tr>

                    @endforeach

                    <tr>
                        <td colspan="3" class="text-right">Sub Total</td>
                        <td>{{auth()->user()->carts->sum('grand_total')}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Tax Total %10</td>
                        <td> @php
                            $tax = auth()->user()->carts->sum('grand_total') * 13/100
                            @endphp
                            {{$tax}}

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td>{{auth()->user()->carts->sum('grand_total') + $tax}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: </h3>
            <h3 class="heading">Payment Mode:
                {{--  @if ($order->payment_status==0)
                <span class="badge btn-warning text-light">Pending</span>
                @elseif($order->payment_status==1)
                <span class="badge btn-success text-light">Paid</span>
                @elseif($order->payment_status==2)
                <span class="badge btn-success text-light">e-Sewa Successful</span>
                @elseif($order->payment_status==3)
                <span class="badge btn-danger text-light">e-Sewa Failed</span>
                @endif  --}}
            </h3>
        </div>

        <div class="body-section d-flex justify-content-between">
            <p>&copy; Copyright 2021 - e-Shop Pvt Ltd. Lazimpath, Kathmandu All rights reserved.
                <a href="#" class="">www.nirdoshshrestha.com</a><br/> Phone no: 9801014247
            </p>
        </div>
    </div>

</body>
</html>
