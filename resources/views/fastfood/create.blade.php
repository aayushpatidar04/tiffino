@extends('../index_main')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-flex">
                        <h4 class="card-title">Add Fast Food SubCategory</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('fastfoodsubcategory.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="fastfood_id" value="{{ $id }}">
                            <label class="mt-2" for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                            <label class="mt-2" for="price">Prize</label>
                            <input type="text" name="price" class="form-control" required>
                            <label class="mt-2" for="description">Description</label>
                            <input type="text" name="description" class="form-control" required>
                            <label class="mt-2" for="image">Image</label>
                            <input type="file" name="image" class="form-control" required>
                            <button type="submit" class="btn btn-primary mt-2">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection