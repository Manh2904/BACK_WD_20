<div class="mod-reviews">
    <div class="item">
        <div class="top">
            <div class="container-star starCtn left" style="width: 83.125px; height: 16.625px;">
                @for($i =1;$i<=$rating->r_number;$i++ )
                    <img class="star" src="//laz-img-cdn.alicdn.com/tfs/TB19ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png">
                @endfor
                @for($j=5;$j>$rating->r_number;$j--)
                    <img class="star" src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png">
                @endfor
            </div>
            <span class="title right">{{ $rating->created_at->diffForHumans() }}</span>
        </div>
        <div class="middle"><span>bởi {{ $rating->user->name}}</span></div>
        <div class="item-content">
            <div class="content">{{ $rating->r_content}}</div>
        </div>
    </div>