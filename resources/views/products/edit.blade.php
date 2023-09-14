@extends('products.index')

@section('content')
    <div class="mt-5">
        <h2 class="text-center">
            EDIT PRODUCT
        </h2>
    </div>
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col-xs-12 col-md-12 col-sm-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name..." value="{{ $product->name }}">
                @error('name')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mb-3 col-xs-12 col-md-12 col-sm-12">
                <label for="detail" class="form-label">Detail</label>
                <textarea type="text" class="form-control" id="detail" name="detail" placeholder="detail..." style="height: 120px">{{ $product->detail }}</textarea>
                @error('detail')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mb-3 col-xs-12 col-md-12 col-sm-12">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image" placeholder="image...">
                <img src="/images/{{ $product->image }}" width="300px" />
                @error('image')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-xs-12 col-md-12 col-sm-12 text-center mt-5">
                <a href="{{ url('/products') }}" class="btn btn-secondary">Back</a>
                <button type="Submit" value="Submit" class="btn btn-primary">Edit product</button>
            </div>
        </div>
    </form>
@endsection
