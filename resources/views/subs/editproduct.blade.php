@extends("../index_main")
@section('csscontent')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Product</h4>
                        <a href="{{ Route('subs.products',$product->subscription_sub_category_id) }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ Route('subproducts.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="subscription_category_id" value="{{ $product->subscription_category_id  }}">
                            <input type="hidden" name="subscription_sub_category_id" value="{{ $product->subscription_sub_category_id  }}">
                            <label for="name">Product Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                            <label for="price">Price:</label>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                            <label for="description">Description:</label>
                            <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                            <label for="image">Image:</label><br>
                            <label><small>Current Image:</small></label><br>
                            <img src="/images/products/{{ $product->image}}" width='100px' height='100px'><br>
                            <small><strong>If you want to change the photo, please select a new one, otherwise leave empty.</strong></small>
                            <input type="file" name="image" class="form-control">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection