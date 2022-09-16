@extends('layouts.backend_app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Category</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Category Name</th>
                                <th>Category Siug</th>
                                <th>Category Description</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_slug}}</td>
                                <td>{{$category->category_description}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-success mr-3">Edit</a>

                                        <form action="{{ route('category.destroy',$category->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button value="{{ route('category.destroy',$category->id)}}" class="btn btn-sm btn-danger mr-3">Deleted</button>
                                        </form>
                                    </div>
                                    {{-- <a href="{{ route('category.destroy',$category->id)}}" class="btn btn-sm btn-success">delete</a> --}}

                                    {{-- <button value="{{ route('category.destroy',$category->id)}}" class="btn btn-sm btn-danger btn_delete">Deleted</button> --}}


                                </td>

                            </tr>
                            @endforeach



                        </tbody>
                    </table>

                        {{$categories->onEachSide(5)->links() }}

                        {{-- {{ $categories->links() }} --}}

                </div>
            </div>
        </div>
    </div>


</div>




@endsection

@section('footer')
<script>
    $(document).ready(function(){
        $('.btn_delete').click(function(){
            var link = $(this).val()

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
                    window.location.href = link
                }
            })
        })
    });
</script>
@endsection
