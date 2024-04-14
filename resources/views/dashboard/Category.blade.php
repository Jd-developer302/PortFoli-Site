@extends('layouts.master')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('delete-category.destroy') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category with its Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="category_delete_id" id="category_id">
                    <h5>Are you sure you want to delete this Category with all its Posts. ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal End -->

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-50 py-2">
                <div class="d-flex justify-content-between">
                    <div class="card-title mx-4 mb-5 mt-2">
                        <h3 class="text-dark text-uppercase fw-bold">Category</h3>
                    </div>
                    <div class="mx-4 mb-5 mt-1">
                        <a href="{{ route('add-Category.create') }}" class="btn btn-primary">+new</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card p-4">
            {{session('success')}}
        </div>
    </div>
</div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card p-4">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{asset('uploads/category/'.$item->image)}}" width="50px" height="50px"
                                    alt="Img">
                            </td>
                            <td>{{$item->status=='1' ? 'Hidden':'Shown'}}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('edit-category.edit', ['category_id' => $item->id]) }}"
                                        class="btn btn-primary"><i class='bx bx-edit-alt'></i>Edit</a>
                                    {{-- <a href="{{ route('delete-category.destroy', ['category_id' => $item->id]) }}"
                                        class="btn btn-danger"><i class='bx bx-trash-alt'></i>Delete</a> --}}
                                    <button type="button" class="btn btn-danger deleteCategoryBtn"
                                        value="{{$item->id}}">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // $('.deleteCategoryBtn').click(function (e) 
        $(document).on('click', '.deleteCategoryBtn', function(e){
            e.preventDefault();

            var category_id = $(this).val();
            $('#category_id').val(category_id);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endsection