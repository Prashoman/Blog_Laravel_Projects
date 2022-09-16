@extends('layouts.frontend_app')

@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
        <div class="col-md-4">

          @foreach ($postFirst as $post)
          <div class="mt-3">
            <a href="{{ route('blog.details',$post->post_slug)}}" class="h-entry v-height gradient" style="background-image: url('{{asset('uploads/post')}}/{{$post->post_image}}">

                <div class="text">
                  <h2>{{ $post->post_tittle }}</h2>
                  <span class="date">{{$post->created_at->format('M-d-Y')}}</span>
                </div>
              </a>
          </div>

          @endforeach

        </div>
        <div class="col-md-4">
            @foreach ($postsecond as $post)
                <a href="{{ route('blog.details',$post->post_slug)}}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{asset('uploads/post')}}/{{$post->post_image}}">

                    <div class="text">
                    <div class="post-categories mb-3">

                        <span class="post-category bg-primary">{{$post->CategoryPost->category_name}}</span>
                    </div>
                    <h2>{{ $post->post_tittle }}</h2>
                    <span class="date">{{$post->created_at->format('M-d-Y')}}</span>
                    </div>
                </a>

          @endforeach

        </div>
        <div class="col-md-4">
            @foreach ($postthird as $post)
            <div class="mt-3">
              <a href="{{ route('blog.details',$post->post_slug)}}" class="h-entry v-height gradient" style="background-image: url('{{asset('uploads/post')}}/{{$post->post_image}}">

                  <div class="text">
                    <h2>{{ $post->post_tittle }}</h2>
                    <span class="date">{{$post->created_at->format('M-d-Y')}}</span>
                  </div>
                </a>
            </div>

            @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2>Recent Posts</h2>
        </div>
      </div>
      <div class="row">
        @foreach ($posts as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                <a href="{{ route('blog.details',$post->post_slug)}}"><img src="{{asset('uploads/post')}}/{{$post->post_image}}" alt="Image" class="img-fluid rounded"></a>
                <div class="excerpt">
                <span class="post-category text-white bg-secondary mb-3">{{$post->CategoryPost->category_name}}</span>

                <h2><a href="{{ route('blog.details',$post->post_slug)}}">{{$post->post_tittle  }}</a></h2>
                <div class="post-meta align-items-center text-left clearfix">
                    <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('frontend')}}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                    <span class="d-inline-block mt-1">By <a href="{{ route('blog.details',$post->post_slug)}}">{{$post->UserPost->name}}</a></span>
                    <span>&nbsp;-&nbsp; {{$post->created_at->format('M-d-Y')}}</span>
                </div>

                    <p>{!! $post->post_description !!}</p>
                    <p><a href="">Read More</a></p>
                </div>
                </div>
            </div>
        @endforeach


      </div>
      <div class="row text-center pt-3 border-top">
        <div class="col-md-12">
            {{$posts->onEachSide(5)->links() }}
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row align-items-stretch retro-layout">

        <div class="col-md-5 order-md-2">
            @foreach ($footerFirst as $post)
            <a href="{{ route('blog.details',$post->post_slug)}}" class="hentry img-1 h-100 gradient" style="background-image: url('{{asset('uploads/post')}}/{{$post->post_image}}">
                <span class="post-category text-white bg-danger">{{$post->CategoryPost->category_name}}</span>
                <div class="text">
                  <h2>{{$post->post_tittle  }}</h2>
                  <span>{{$post->created_at->format('M-d-Y')}}</span>
                </div>
              </a>
            @endforeach

        </div>

        <div class="col-md-7">
            @foreach ($Foterpostsecond as $post )
            <a href="{{ route('blog.details',$post->post_slug)}}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{asset('uploads/post')}}/{{$post->post_image}}">
                <span class="post-category text-white bg-success">{{$post->CategoryPost->category_name}}</span>
                <div class="text text-sm">
                  <h2>{{$post->post_tittle  }}</h2>
                  <span>{{$post->created_at->format('M-d-Y')}}</span>
                </div>
              </a>
            @endforeach


          <div class="two-col d-block d-md-flex">
            @foreach ($Foterpostpostthird as $post)

                <a href="{{ route('blog.details',$post->post_slug)}}" class="hentry v-height img-2 gradient mr-2" style="background-image: url('{{asset('uploads/post')}}/{{$post->post_image}}">
                    <span class="post-category text-white bg-primary">{{$post->CategoryPost->category_name}}</span>
                    <div class="text text-sm">
                      <h2>{{$post->post_tittle  }}</h2>
                      <span>{{$post->created_at->format('M-d-Y')}}</span>
                    </div>
                  </a>


            @endforeach


          </div>

        </div>
      </div>

    </div>
  </div>


  <div class="site-section bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
            <form action="#" class="d-flex">
              <input type="text" class="form-control" placeholder="Enter your email address">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
