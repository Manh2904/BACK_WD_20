@foreach($rating as $list)
    <li class="qna-item">
        <div class="qna-item-group">
            <span class="lazada  lazada-icon qna-icon qna-icon-q">{{ substr($list->user->name,0,1) }}</span>
            <div class="top">
                <div class="container-star starCtn left" style="width: 83.125px; height: 16.625px;">
                    @for($i =1;$i<=$list->r_number;$i++ )
                        <img class="star" src="//laz-img-cdn.alicdn.com/tfs/TB19ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png">
                    @endfor
                    @for($j=5;$j>$list->r_number;$j--)
                        <img class="star" src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png">
                    @endfor
                </div>
                <span class="title right">{{ $list->created_at->diffForHumans($now) }} </span>
            </div>
            <div class="qna-content">{{ $list->r_content}}</div>
        </div>
    </li>
@endforeach