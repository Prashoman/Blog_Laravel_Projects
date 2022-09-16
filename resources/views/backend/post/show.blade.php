@extends('layouts.backend_app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Show {{$post->post_tittle}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                        <tbody>
                            <tr>
                                <td style="width: 50px">

                                    Post_Tittle
                                </td>
                                <td>
                                    <p class="text-success">{{$post->post_tittle}}</p>

                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px">
                                    Post_Category
                                </td>
                                <td>
                                    <span class="badge badge-info">{{$post->CategoryPost->category_name}}</span>

                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px">
                                    Post_Image
                                </td>
                                <td>
                                    <img src="{{asset('uploads/post')}}/{{$post->post_image}}" alt="" style="width: 400px;height:150px;">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px">
                                    Post_Athur
                                </td>
                                <td>
                                    {{$post->UserPost->name}}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px">
                                    Post_Tag
                                </td>
                                <td>
                                    @foreach ( App\Models\Posttag::where('post_id', $post->id)->get() as $tags)
                                        <span class="badge badge-success">{{$tags->TagPosttag->tag_tittle}}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px">
                                    Post_Description
                                </td>
                                <td>
                                    {!! $post->post_description !!}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px">
                                    Post_time
                                </td>
                                <td>
                                    {{$post->post_time}}

                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px">
                                    Post_Date
                                </td>
                                <td>
                                    {{$post->created_at->format('M-d-Y')}}
                                </td>
                            </tr>






                        </tbody>
                    </table>
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
