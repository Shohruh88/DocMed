@extends('layouts/app', ['title'=>'Batafsil'])

@section('content')

  <!-- bradcam_area_start  -->
  <div class="bradcam_area breadcam_bg bradcam_overlay">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text">
                      <h3>Blog detials</h3>
                      <p><a href="index.html">Home /</a> Blog detials</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- bradcam_area_end  -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="/storage/{{ $post->img }}" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>
                        {{$post->title}}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-eye"></i> {{$post->views}}</a></li>
                        <li><a href="#"><i class="fa fa-user"></i> Adminstrator</a></li>
                     </ul>
                     <p>
                        {{$post->content}}
                     </p>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                        people like this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                              <div class="input-group-append">
                                 <button class="btn" type="button"><i class="ti-search"></i></button>
                              </div>
                           </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Search</button>
                     </form>
                  </aside>
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Category</h4>
                     <ul class="list cat-list">
                        <li>
                           <a href="#" class="d-flex">
                              <p>Resaurant food</p>
                              <p>(37)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Travel news</p>
                              <p>(10)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Modern technology</p>
                              <p>(03)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Product</p>
                              <p>(11)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Inspiration</p>
                              <p>(21)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Health Care</p>
                              <p>(21)</p>
                           </a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Recent Post</h3>
                     @foreach($most_posts as $most)
                     <div class="media post_item">
                        <img width="80px" src="/storage/{{$most->thumb}}" alt="post">
                        <div class="media-body">
                           <a href="{{ route('news.more', $most->id) }}">
                              <h3>{{ $most->title }}</h3>
                           </a>
                           <p>
                              <i class="fa fa-eye"></i> {{$most->views}}
                              |
                              <i class="fa fa-calendar"></i> {{ $most->created_at->format('H:i d/m/Y') }}
                           </p>
                        </div>
                     </div>
                     @endforeach
                  </aside>
                  <aside class="single_sidebar_widget tag_cloud_widget">
                     <h4 class="widget_title">Tag Clouds</h4>
                     <ul class="list">
                        <li>
                           <a href="#">project</a>
                        </li>
                        <li>
                           <a href="#">love</a>
                        </li>
                        <li>
                           <a href="#">technology</a>
                        </li>
                        <li>
                           <a href="#">travel</a>
                        </li>
                        <li>
                           <a href="#">restaurant</a>
                        </li>
                        <li>
                           <a href="#">life style</a>
                        </li>
                        <li>
                           <a href="#">design</a>
                        </li>
                        <li>
                           <a href="#">illustration</a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget instagram_feeds">
                     <h4 class="widget_title">Instagram Feeds</h4>
                     <ul class="instagram_row flex-wrap">
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="/img/post/post_5.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="/img/post/post_6.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="/img/post/post_7.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="/img/post/post_8.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="/img/post/post_9.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="/img/post/post_10.png" alt="">
                           </a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget newsletter_widget">
                     <h4 class="widget_title">Newsletter</h4>
                     <form action="#">
                        <div class="form-group">
                           <input type="email" class="form-control" onfocus="this.placeholder = ''"
                              onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Subscribe</button>
                     </form>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

@endsection