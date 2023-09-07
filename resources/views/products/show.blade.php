@extends('products.layout')
  <style>
    .col-left{
        flex-basis: 35%;
    }
    .col-right{
        flex-basis: 60%;
    }
    .row-left{
       margin-top: 35px;
    }
  </style>
@section('content')
<div class="container border m-4">
    <div class="row">
    <h2> Show Product</h2>
        <div class="col-left ">
            <div class="row-left">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $product->productName }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Details:</strong>
                        {{ $product->productDescription }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-right ">
            <div class="row-right">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <img src="{{ asset('images/'.$product->productImage) }}" style="height: 500px;width:500px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
