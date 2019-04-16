@extends('layouts.blog')


@section('title')

{{$post->title}}

@endsection


@section('header')

<!-- Header -->
    <header class="header text-white h-fullscreen pb-80" style="background-image: url({{asset($post->image)}});" data-overlay="9">
      <div class="container text-center">

        <div class="row h-100">
          <div class="col-lg-8 mx-auto align-self-center">

            <p class="opacity-70 text-uppercase small ls-1">{{$post->category->name}}</p>
            <h1 class="display-4 mt-7 mb-8">
        {{$post->title}}
              </h1>
            <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#">{{$post->user->name}}</a></p>
            <p><img class="avatar avatar-sm" src="{{Gravatar::src(asset($post->image))}}" alt="..."></p>

          </div>

      </div>

  </div>
</header>



@endsection




@section('content')





    <!-- Main Content -->
    <main class="main-content">

      <div class="section" id="section-content">
        <div class="container">

       
  {!!$post->content!!}

          <div class="row">
            
            

              <div class="gap-xy-2 mt-6">
              	@foreach($post->tags as $tag)

                <a class="badge badge-pill badge-secondary" href="#">{{$tag->name}}</a>
              @endforeach
              </div>

            </div>
          </div>


        </div>
      </div>



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section bg-gray">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">

              <div class="media-list">

                <div id="disqus_thread"></div>
<script>


var disqus_config = function () {
this.page.url = "{{config('app.url')}}/blog/posts/{{$post->id}}";  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = {{$post->id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://saas-blog-6.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            


              </div>


              <hr>


              	

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

