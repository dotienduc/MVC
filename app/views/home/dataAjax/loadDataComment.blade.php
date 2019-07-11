@foreach($listComment as $comment)
<!-- Blog Comments -->
<div class="row blog-comments margin-bottom-30">
    <div class="col-sm-2">
        <img src="../../img/blog/a2.jpg" alt="">
    </div>
    <div class="col-sm-10">
        <div class="comment">
            <h5>
                {{ $comment->comment_sender_name }}
                <span>{{ $comment->date }} / <a href="#" class="reply" id="{{ $comment->id }}">Reply</a></span>
            </h5>
            <p>{{ $comment->comment }} </p>
        </div>
    </div>
</div>
@foreach($comments as $value)
@if($value->parent_commnet_id == $comment->id)
<!-- Blog Comments -->
<div class="row blog-comments blog-comments-reply margin-bottom-30">
    <div class="col-sm-2">
        <img src="../../img/blog/a1.jpg" alt="">
    </div>
    <div class="col-sm-10">
        <div class="comment">
            <h5>
                {{ $value->comment_sender_name }}
                <span>{{ $value->date }}</span>
            </h5>
            <p>{{ $value->comment }}</p>
        </div>
    </div>
</div>
@endif
<!-- End Blog Comments -->
@endforeach
<!-- End Blog Comments -->
@endforeach