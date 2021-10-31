<div class="review-item w-100">
    <div class="review-item-top d-flex align-items-center w-100">
        <div class="user-avatar">
            <img src="{{ asset($review->user->avatar) }}" alt="avatar">
        </div>
        <div class="user-name">{{ $review->user->name }}</div>
        <div class="rate">
            @for ($i = 0; $i < $review->rate; $i++)
                    <i class="fas fa-star"></i>
            @endfor
            @for ($i = 0; $i < 5 - $review->rate; $i++)
                <i class="far fa-star"></i>
            @endfor
        </div>
        <div class="review-time">{{ $review->created_at->toFormattedDateString() }} at {{ $review->created_at->toTimeString() }}</div>
    </div>
    <div class="review-item-bottom">
        <div class="content">{{ $review->content }}</div>
    </div>
</div>