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
                @for ($i = 0; $i < 5; $i++)
                    <div class="number">
                        <div class="row">
                            <div class="col-2 d-flex">
                                <div class="number-star">{{ 5 - $i }}</div>
                                <i class="fas fa-star ml-2"></i>
                            </div>
                            <div class="progress col-9">
                                <div class="progress-bar" role="progressbar" style="width: {{ ($course->number_rating[$i] == 0) ? 0 : round($course->number_rating[$i] / $course->reviews->count() * 100)  . '%' }}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{ ($course->number_rating[$i] == 0) ? 0 : round($course->number_rating[$i] / $course->reviews->count() * 100) . '%' }}
                                </div>
                            </div>
                            <div class="number-of-five-star col-1 number-vote">{{ ($course->number_rating[$i] == 0) ? 0 : $course->number_rating[$i] }}</div>
                        </div>
                    </div>
                @endfor                       
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
        {!! $reviews->appends($_GET)->fragment('pills-reviews')->onEachSide(1)->links() !!}
    </div>
    <div class="submit-review d-flex flex-column">
        <form action="{{route('courses.review', [$course->id])}}" method="post">
            @csrf
            <div class="title">Submit review</div>
            <div class="form-group">
                <label for="input-review">Message</label>
                <textarea name="review_content" id="input-review" class="form-control"></textarea>
            </div>
            <div class="form-vote d-flex">
                <span class="vote-txt">Vote</span>
                <div class="pick-rate ml-3 mr-3">
                    <input type="radio" name="rate" id="star-5" class="star d-none" value="5" required>
                    <label for="star-5" id="star-label-5" data-star="5" class="star star-5 mr-1"></label>
                    <input type="radio" name="rate" id="star-4" class="star d-none" value="4">
                    <label for="star-4" id="star-label-4" data-star="4" class="star star-4 mr-1"></label>
                    <input type="radio" name="rate" id="star-3" class="star d-none" value="3">
                    <label for="star-3" id="star-label-3" data-star="3" class="star star-3 mr-1"></label>
                    <input type="radio" name="rate" id="star-2" class="star d-none" value="2">
                    <label for="star-2" id="star-label-2" data-star="2" class="star star-2 mr-1"></label>
                    <input type="radio" name="rate" id="star-1" class="star d-none" value="1">
                    <label for="star-1" id="star-label-1" data-star="1" class="star star-1 mr-1"></label>
                </div>
                <span class="stars-txt">(stars)</span>
            </div>

            <div class="w-100 float-right mb-3">
                <button type="submit" id="send-review" class="btn btn-send float-right"><p class="m-0">Send</p></button>
            </div>
        </form>
    </div>
</div>
