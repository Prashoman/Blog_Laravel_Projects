@extends('layouts.backend_app')

@section('content')

<div class="row">
    <div class="col-2 ">

    </div>
    <div class="col-8 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
            </div>
            <div class="card-body">
               <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Post_tittle</label>
                    <input type="text" name="post_tittle" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="">Post_category</label>
                    <select name="post_category" id="" class="form-control">
                        <option value="" style="display: none;" selected>--Select Any--</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Post_tag</label>


                    @foreach ($tags as $tag )
                    <div class="form-check">
                        <input class="form-check-input" name="tag[]" type="checkbox" value="{{ $tag->id }}" id="{{ $tag->id }}">
                        <label class="form-check-label" for="{{ $tag->id }}">
                            {{ $tag->tag_tittle}}
                        </label>
                      </div>
                    @endforeach


                </div>
                <div class="form-group">
                    <label for="">Post_image</label>
                    <input type="file" name="post_image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Post_Description</label>
                    <textarea id="post_description" class="form-control" name="post_description"  rows="4" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-info">Submit</button>
                </div>

               </form>
            </div>
        </div>
    </div>
    <div class="col-2 ">

    </div>
</div>



@endsection

@section('footer')
<script>
    $(document).ready(function() {
  $('#post_description').summernote();
});
</script>
@endsection
