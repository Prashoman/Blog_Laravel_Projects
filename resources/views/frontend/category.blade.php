@extends('layouts.frontend_app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <span>Category</span>

                <h3>{{$single_post->CategoryPost->category_name}}</h3>
                @if ($single_post->CategoryPost->category_description)
                    <p>{!! $single_post->CategoryPost->category_description !!}</p>
                @endif


        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-white">
    <div class="container">
      <div class="row">

        @foreach ($categoryposts as $categorypost)
        <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="{{ route('blog.details',$categorypost->post_slug)}}"><img src="{{asset('uploads/post')}}/{{$categorypost->post_image}}" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">{{$categorypost->CategoryPost->category_name}}</span>

              <h2><a href="{{ route('blog.details',$categorypost->post_slug)}}">{{ $categorypost->post_tittle }}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('frontend')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">{{$categorypost->UserPost->name}}</a></span>
                <span>&nbsp;-&nbsp; {{$categorypost->created_at->format('M-d-Y')}}</span>
              </div>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
        @endforeach


      </div>
      <div class="row text-center pt-5 border-top">
        <div class="col-md-12">
          <div class="custom-pagination">
            <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">15</a>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
