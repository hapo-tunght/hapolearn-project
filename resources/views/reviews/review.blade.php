<div class="review-item w-100">
    <div class="review-item-top d-flex align-items-center w-100">
        <div class="user-avatar">
            <img src="{{ asset($review->avatar) }}" alt="avatar">
        </div>
        <div class="user-name">{{ $review->name }}</div>
        <div class="rate">
            @for ($i = 0; $i < $review->rate; $i++)
                    <i class="fas fa-star"></i>
            @endfor
            @for ($i = 0; $i < 5 - $review->rate; $i++)
                <i class="far fa-star"></i>
            @endfor
        </div>
        <div class="review-time">{{ $review->date }} at {{ $review->time }}</div>
    </div>
    <div class="review-item-bottom">
        <div class="content">{{ $review->content }}</div>
    </div>
</div>