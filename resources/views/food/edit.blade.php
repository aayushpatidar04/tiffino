@extends('../index_main')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Food</h4>
                        <a href="{{ Route('food.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ Route('food.update') }}">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="form-group">
                                <label>Food Name</label>
                                <input type="text" value="{{ $data->name }}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Food Description</label>
                                <input type="text" value="{{ $data->description }}" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Food Price</label>
                                <input type="text" value="{{ $data->price }}" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Food Image:</label><br>
                                <small><strong>Current Image:</strong></small><br>
                                <img src="{{ URL::to('/') }}/images/food/{{ $data->image }}" height="100" /><br>
                                <small><strong>If you wish to change the image, please select a new image, otherwise leave empty.</strong></small>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection