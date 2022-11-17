<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Date: <span class="gray-color">{{ $sale->created_at->format('d-m-Y') }}</span></p>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <td>
                <div class="box-text">
                    <p>Customer Name: {{ $sale->name }}</p>
                    <p>Customer Phone: {{ $sale->phone }}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Product Name</th>
            <th class="w-50">Price</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Subtotal</th>
        </tr>
        <tr align="center">
            <td>{{ $sale->product->purchase->product }}</td>
            <td>Rs {{ $sale->product->price }}</td>
            <td>{{ $sale->quantity }}</td>
            <td>Rs {{ $sale->product->price * $sale->quantity }}</td>
        </tr>
        @if ($sale->product2)
            <tr align="center">
                <td>{{ $sale->product2->purchase->product }}</td>
                <td>Rs {{ $sale->product2->price }}</td>
                <td>{{ $sale->quantity_2 }}</td>
                <td>Rs {{ $sale->product2->price * $sale->quantity_2 }}</td>
            </tr>
        @endif
        @if ($sale->product3)
            <tr align="center">
                <td>{{ $sale->product3->purchase->product }}</td>
                <td>Rs {{ $sale->product3->price }}</td>
                <td>{{ $sale->quantity_3 }}</td>
                <td>Rs {{ $sale->product3->price * $sale->quantity_3 }}</td>
            </tr>
        @endif
        @if ($sale->product4)
            <tr align="center">
                <td>{{ $sale->product4->purchase->product }}</td>
                <td>Rs {{ $sale->product4->price }}</td>
                <td>{{ $sale->quantity_4 }}</td>
                <td>Rs {{ $sale->product4->price * $sale->quantity_4 }}</td>
            </tr>
        @endif
        @if ($sale->product5)
            <tr align="center">
                <td>{{ $sale->product5->purchase->product }}</td>
                <td>Rs {{ $sale->product5->price }}</td>
                <td>{{ $sale->quantity_5 }}</td>
                <td>Rs {{ $sale->product5->price * $sale->quantity_5 }}</td>
            </tr>
        @endif
        @if ($sale->product6)
            <tr align="center">
                <td>{{ $sale->product6->purchase->product }}</td>
                <td>Rs {{ $sale->product6->price }}</td>
                <td>{{ $sale->quantity_6 }}</td>
                <td>Rs {{ $sale->product6->price * $sale->quantity_6 }}</td>
            </tr>
        @endif
        @if ($sale->product7)
            <tr align="center">
                <td>{{ $sale->product7->purchase->product }}</td>
                <td>Rs {{ $sale->product7->price }}</td>
                <td>{{ $sale->quantity_7 }}</td>
                <td>Rs {{ $sale->product7->price * $sale->quantity_7 }}</td>
            </tr>
        @endif
        @if ($sale->product8)
            <tr align="center">
                <td>{{ $sale->product8->purchase->product }}</td>
                <td>Rs {{ $sale->product8->price }}</td>
                <td>{{ $sale->quantity_8 }}</td>
                <td>Rs {{ $sale->product8->price * $sale->quantity_8 }}</td>
            </tr>
        @endif
        @if ($sale->product9)
            <tr align="center">
                <td>{{ $sale->product9->purchase->product }}</td>
                <td>Rs {{ $sale->product9->price }}</td>
                <td>{{ $sale->quantity_9 }}</td>
                <td>Rs {{ $sale->product9->price * $sale->quantity_9 }}</td>
            </tr>
        @endif
        @if ($sale->product10)
            <tr align="center">
                <td>{{ $sale->product10->purchase->product }}</td>
                <td>Rs {{ $sale->product10->price }}</td>
                <td>{{ $sale->quantity_10 }}</td>
                <td>Rs {{ $sale->product10->price * $sale->quantity_10 }}</td>
            </tr>
        @endif
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Total</p>
                    </div>
                    <div style="margin-left: 10px" class="total-right w-15 float-left text-bold" align="right">
                        <p>Rs {{ $sale->total_price }}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</html>
