@extends('layouts/app',['title'=>"NEWS"])

@section('content')
<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>blog</h3>
                        <p><a href="index.html">Home /</a> blog</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($posts as $item)
                            @include('parts._news-item', ['post' => $item])
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $links }}                            
                        </nav>
                    </div>
                </div>
                @include('parts._sidebar')
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection