<li class="qna-item">
    <div class="qna-item-group">
        <span class="lazada  lazada-icon qna-icon qna-icon-q">{{ substr($rating->user->name,0,1) }}</span>
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
        <div class="qna-content">{{ $rating->r_content}}</div>
        <div class="qna-meta"></div>
    </div>
</li>