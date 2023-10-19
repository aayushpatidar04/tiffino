@extends("../index_main")
@section('csscontent')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .card-header-flex {
            align-items: flex-start; 
        }
        .card-header-flex .end-items {
            align-self: flex-end !important;
        }
    </style>
@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-flex">
                        <h4 class="card-title">SubProducts List</h4>
                        {{-- <a href="{{ Route('subproducts.create',$id) }}" class="btn btn-primary end-items">Add Products</a> --}}
                        {{-- <a href="{{ Route('subs.categories',DB::table('subscription_sub_category')->where('id', $id)->value('subscription_category_id')) }}" class="btn btn-primary end-items">Back</a> --}}
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-responsive yajra_datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jscontent')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(function() {
        var full_url = document.URL;
        var url_array = full_url.split('/');
        var last_segment = url_array[url_array.length - 1];
        var ajaxurl = "{{ route('fastfood.subproducts', ':id') }}";
        ajaxurl = ajaxurl.replace(':id', last_segment);
        
        var table = $('.yajra_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: ajaxurl,
            columns: [
                {
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'fastfood_id',
                    name: 'fastfood_id',
                },
                {
                    data: 'description',
                    name: 'description',
                },
                {
                    data: 'price',
                    name: 'price',
                },
                {
                    data: 'image',
                    name: 'image',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '.delete', function() {
        var row_id = $(this).attr('id');
        var table_row = $(this).closest('tr');
        var url = "{{ route('subproducts.delete', ':id') }}";
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