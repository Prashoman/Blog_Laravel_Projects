@extends('layouts.backend_app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Tag</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>tag Name</th>
                                <th>tag Slug</th>

                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$tag->tag_tittle}}</td>
                                <td>{{$tag->tag_slug}}</td>

                                <td>
                                    <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-sm btn-success">Edit</a>

                                    {{-- <a href="{{route('tag.destroy', $tag->id)}}" class="btn btn-sm btn-danger">Deleted</a> --}}
                                    <button value="{{ route('tag.destroy', $tag->id)}}" class="btn btn-sm btn-danger tag_deleted">Deleted</button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
    </div>


</div>




@endsection

@section('footer')
<script>
    $(document).ready(function(){
        $('.tag_deleted').click(function(){
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
