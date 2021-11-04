<div class="reviews-tab">
    <div class="total-reviews">{{ $course->reviews->count() }} Reviews</div>
    <div class="row preview-rating">
        <div class="col-4">
            <div class="rating-overview w-100 d-flex flex-column justify-content-center align-items-center">
                <div class="average-rating">{{ $course->percentage_rating }}</div>
                <div class="average-rating-star">
                    @if (is_float($course->percentage_rating))
                        @for ($i = 0; $i < (int) $course->percentage_rating; $i++)
                            <i class="fas fa-star"></i>
                        @endfor

                        <i class="fas fa-star-half-alt"></i>

                        @for ($i = 0; $i < 4 - (int) $course->percentage_rating; $i++)
                            <i class="far fa-star"></i>
                        @endfor
                    @else
                        @for ($i = 0; $i < $course->percentage_rating; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        @for ($i = 0; $i < 5 - $course->percentage_rating; $i++)
                            <i class="far fa-star"></i>
                        @endfor
                    @endif
                </div>
                <div class="total-rating">{{ $course->rating }} Ratings</div>
            </div>
        </div>
        <div class="col-8 pl-4">
            <div class="rating-specific d-flex flex-column">
                @foreach ($course->number_rating as $key => $numberRating)
                    <div class="number">
                        <div class="row">
                            <div class="col-2 d-flex">
                                <div class="number-star">{{ 5 - $key }}</div>
                                <i class="fas fa-star ml-2"></i>
                            </div>
                            <div class="progress col-9">
                                <div class="progress-bar" role="progressbar" style="width: {{ ($numberRating == 0) ? 0 : round($numberRating / $course->reviews->count() * 100)  . '%' }}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{ ($numberRating == 0) ? 0 : round($numberRating / $course->reviews->count() * 100) . '%' }}
                                </div>
                            </div>
                            <div class="number-of-five-star col-1 number-vote">{{ ($numberRating == 0) ? 0 : $numberRating }}</div>
                        </div>
                    </div>
                @endforeach                          
            </div>
        </div>
    </div>
    <div class="border-bot w-100"></div>
    <div class="show-all-review">
        <div class="all-review">All review</div>
        <div class="show-all-review">
            @foreach ($reviews as $review)
                @include('reviews.review')
            @endforeach
        </div>
    </div>
    <div class="pagination-custom container mt-5 pr-4 d-flex justify-content-end">
        {!! $reviews->appends($_GET)->fragment('pillsReviews')->onEachSide(1)->links() !!}
    </div>
    <div class="submit-review d-flex flex-column">
        <form action="{{route('reviews.store', ['course_id' => $course])}}" method="post">
            @csrf
            <div class="title">Submit review</div>
            <div class="form-group">
                <label for="inputReview">Message</label>
                <textarea name="review_content" id="inputReview" class="form-control"></textarea>
            </div>
            <div class="form-vote d-flex">
                <span class="vote-txt">Vote</span>
                <div class="pick-rate ml-3 mr-3">
                    <input type="radio" name="rate" id="fiveStars" class="star d-none" value="5" required>
                    <label for="fiveStars" data-star="5" class="star star-5 mr-1"></label>
                    <input type="radio" name="rate" id="fourStars" class="star d-none" value="4">
                    <label for="fourStars" data-star="4" class="star star-4 mr-1"></label>
                    <input type="radio" name="rate" id="threeStars" class="star d-none" value="3">
                    <label for="threeStars" data-star="3" class="star star-3 mr-1"></label>
                    <input type="radio" name="rate" id="twoStars" class="star d-none" value="2">
                    <label for="twoStars" data-star="2" class="star star-2 mr-1"></label>
                    <input type="radio" name="rate" id="oneStar" class="star d-none" value="1">
                    <label for="oneStar" data-star="1" class="star star-1 mr-1"></label>
                </div>
                <span class="stars-txt">(stars)</span>
            </div>

            <div class="w-100 float-right mb-3">
                <button type="submit" id="sendReview" class="btn btn-send float-right"><p class="m-0">Send</p></button>
            </div>
        </form>
    </div>
</div>
