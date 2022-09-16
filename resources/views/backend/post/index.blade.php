@extends('layouts.backend_app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Post</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Post Name</th>
                                <th>Post image</th>
                                <th>Category Name</th>
                                <th>User Name</th>

                                <th>Tag</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$post->post_tittle}}</td>
                                <td><img src="{{asset('uploads/post')}}/{{$post->post_image}}" alt="" style="width: 80px;height:80px;"></td>
                                <td>{{$post->CategoryPost->category_name}}</td>
                                <td>{{$post->UserPost->name}}</td>
                                <td>

                                    @foreach ( App\Models\Posttag::where('post_id', $post->id)->get() as $tags)
                                        <span class="badge badge-success">{{$tags->TagPosttag->tag_tittle}}</span>
                                    @endforeach

                                   </td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-sm btn-success mr-2">Edit</a>
                                    <a href="{{route('post.show',$post->id)}}" class="btn btn-sm btn-info mr-2">show</a>

                                    <form action="{{ route('post.destroy',$post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mr-2">Deleted</button>
                                    </form>
                                    </div>

                                    {{-- <a href="{{ route('category.destroy',$category->id)}}" class="btn btn-sm btn-success">delete</a> --}}

                                    {{-- <button value="{{ route('category.destroy',$category->id)}}" class="btn btn-sm btn-danger btn_delete">Deleted</button> --}}


                                </td>

                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                    {{$posts->onEachSide(5)->links() }}

                </div>
            </div>
        </div>
    </div>


</div>




@endsection

@section('footer')
<script>

</script>
@endsection
