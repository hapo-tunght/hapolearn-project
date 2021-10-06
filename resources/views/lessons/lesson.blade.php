<div class="list-lesson-items">
    <div class="row h-100">
        @if (isset($haveNotJoinedCourse) && $haveNotJoinedCourse)
            <div class="col-md-12 d-flex align-items-center">
                <a href="" class="lesson-items-title">
                    {{ ($lessons->currentPage() - 1)*config('config.pagination') + $key + 1 }}. {{ $lesson->title }}
                </a>
            </div>
        @else
            <div class="col-md-9 d-flex align-items-center">
                <a href="" class="lesson-items-title">
                    {{ ($lessons->currentPage() - 1)*config('config.pagination') + $key + 1 }}. {{ $lesson->title }}
                </a>
            </div>
            <div class="col-md-3 d-flex justify-content-center align-items-center">
                <a class="learn-lesson-button">Learn</a>
            </div>
        @endif
        
    </div>
</div>