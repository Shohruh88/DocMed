@extends('layouts.app', ['title' => 'Qidiruv'])

@section('content')
    <!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>blog</h3>
                    <p><a href="index.html">Home /</a> Qidiruv</p>
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
                    <div>
                        <form method="GET" action="{{route('search')}}">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input placeholder="Qidiruv..." value="{{ request()->get('key') }}" type="text" class="form-control" name="key" />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(!count($results))
                        <div class="alert alert-primary">
                            Sizning "{{ request()->get('key') }}" so'rovingiz bo'yicha hech nima topilmadi.
                        </div>
                    @endif
                    @foreach($results as $post)
                        @include('parts._news-item', ['post' => $post])
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