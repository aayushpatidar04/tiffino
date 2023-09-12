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
                        <h4 class="card-title">Add Product</h4>
                        <a href="{{ Route('subs.products',$subcategory_id) }}" class="btn btn-primary">Back</a>
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
                        <form method="POST" action="{{ Route('subproducts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="subscription_category_id" value="{{ $category_id }}">
                            <input type="hidden" name="subscription_sub_category_id" value="{{ $subcategory_id }}">
                            <label for="name">Product Name:</label>
                            <input type="text" name="name" class="form-control">
                            <label for="price">Price:</label>
                            <input type="text" name="price" class="form-control">
                            <label for="description">Description:</label>
                            <input type="text" name="description" class="form-control">
                            <label for="image">Image:</label>
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