@extends('products.index')

@section('content')
    <div class="mt-5">
        <h2 class="text-center">
            DETAIL PRODUCT
        </h2>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="mb-3 col-xs-12 col-md-12 col-sm-12">
                <strong for="name" class="form-label">Name: </strong>
                {{ $product->name }}
            </div>
            <div class="mb-3 mb-3 col-xs-12 col-md-12 col-sm-12">
                <strong for="detail" class="form-label">Detail: </strong>
                {{ $product->detail }}
            </div>
            <div class="mb-3 mb-3 col-xs-12 col-md-12 col-sm-12">
                <strong for="image" class="form-label">Image: </strong>
               <img src="/images/{{ $product->image }}" width="300px" />
            </div>
            <div class="col-xs-12 col-md-12 col-sm-12 text-center mt-5">
                <a href="{{ url('/products') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
@endsection
