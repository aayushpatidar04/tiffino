@extends('../index_main')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-flex">
                        <h4 class="card-title">Edit Fast Food Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('fastfood.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control mt-2" value="{{ $data->name }}">
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection