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
                        <form action="{{ Route('fastfoodsubcategory.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="fastfood_id" value="{{ $id }}">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <label class="mt-2" for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                            <label class="mt-2" for="price">Prize</label>
                            <input type="text" name="price" class="form-control" value="{{ $data->price }}">
                            <label class="mt-2" for="description">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $data->description }}">
                            <label class="mt-2" for="image">Image</label>
                            <input type="file" name="image" class="form-control" value="{{ $data->image }}">
                            <button type="submit" class="btn btn-primary mt-2">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jscontent')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '.delete', function() {
        var row_id = $(this).attr('id');
        var table_row = $(this).closest('tr');
        var url = "{{ route('fastfoodsubcategory.delete', ':id') }}";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'GET',
                    url: url.replace(':id', row_id),
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: row_id,
                    },
                    success: function(data) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            table_row.remove();
                        });
                    }
                });
            }
        })
    });
</script>    
@endsection