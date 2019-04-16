
@extends('layouts.blog')



@section('title')


@endsection

@section('header')

    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Latest Blog Posts</h1>
            <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->




@endsection

@section('content')


    <!-- Main Content -->
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">

               @forelse($posts as $post)

                <div class="col-md-6">

                  <div class="card border hover-shadow-6 mb-6 d-block">
               
                    <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" 
                        src="{{'storage/'.$post->image}}" alt="Card image cap"></a>
                    <div class="p-6 text-center">
                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="">{{$post->category->name}}</a></p>
                      <h5 class="mb-0"><a class="text-dark" href="#">
                        {{$post->title}}</a></h5>
                    </div>

                  </div>
                </div>
           @empty
         <p class="text-center">
           No Reults Found <strong>{{request()->query('search')}}</strong>
         </p>
         @endforelse
              </div>


{{$posts->appends(['search'=>request()->query('search')])}}
            </div>



            <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">

                <h6 class="sidebar-title">Search</h6>

                <form class="input-group" action="" method="GET">
                  <input type="text" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
                  <div class="input-group-addon">
                     
                    <span class="input-group-text">
                      <button type="submit" class="input-group-text"><i class="ti-search"></i></span>
                    </button>
                  </div>
                  
                </form>

                <hr>

                <h6 class="sidebar-title">Categories</h6>

              
                <div class="row link-color-default fs-14 lh-24">
                
            @foreach($categories as $category)
                
                <div class="col-6">
                    <a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a>
                </div>
             
                 @endforeach
                </div>
            

                <hr>

                <h6 class="sidebar-title">Top posts</h6>
                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="/assets/img/thumb/4.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="/assets/img/thumb/3.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="/assets/img/thumb/5.jpg">
                  <p class="media-body small-2 lh-4 mb-0">New published books for product designers</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="/assets/img/thumb/2.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Top 5 brilliant content marketing strategies</p>
                </a>

                <hr>

                <h6 class="sidebar-title">Tags</h6>
                <div class="gap-multiline-items-1">

                    @foreach($tags as $tag)

                  <a class="badge badge-secondary" href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
                
             @endforeach

                </div>

                <hr>

            


              </div>
            </div>

          </div>
        </div>
      </div>
    </main>



@endsection


@section('footer')

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href=""><img src="/assets/img/logo-dark.png" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="">Elements</a>
              <a class="nav-link" href="">Blocks</a>
              <a class="nav-link" href="">About</a>
              <a class="nav-link" href="">Blog</a>
              <a class="nav-link" href="">Contact</a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


@endsection



