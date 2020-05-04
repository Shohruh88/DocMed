<article class="blog_item">
    <div class="blog_item_img">
        <img class="card-img rounded-0" src="/storage/{{ $post->thumb }}" alt="">
        <a href="#" class="blog_item_date">
            <h3>{{$post->created_at->format('d')}}</h3>
            <p>{{$post->created_at->format('M')}}</p>
        </a>
    </div>

    <div class="blog_details">
        <a class="d-inline-block" href="{{route('news.more', $post->id)}}">
            <h2>{{$post->translate('title')}}</h2>
        </a>
        <p>{{$post->translate('short')}}</p>
        <ul class="blog-info-link">
            <li><a href="#"><i class="fa fa-eye"></i> {{$post->views}}</a></li>
        </ul>
    </div>
</article>