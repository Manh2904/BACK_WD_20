@if(isset($article))
    <style>a:hover {
            color: inherit
        }</style>
    <div class="item">

        <div class="wImage">
            <a href="{{ route('get.blog.detail',$article->a_slug.'-'.$article->id ) }}" title="" class="image cover">
                <img data-src="{{ pare_url_file($article->a_avatar) }}" style="object-fit: contain;"
                     alt="{{ $article->a_name}}" class="lazy" src="/view/lazy.jpg"/>

        </div>
        <div class="info">
            <a href="{{ route('get.blog.detail',$article->a_slug.'-'.$article->id ) }}" title="" class="name">
                <h3>{{ $article->a_name}}</h3></a>
            <a href="{{ route('get.blog.detail',$article->a_slug.'-'.$article->id ) }}"><h3 class="cont dotdotdot">
                    {{ $article->a_description}}
                </h3>
            </a>
        </div>
    </div>
@endif