<div class="list-lesson-items">
    <div class="row h-100">
        @if (empty($course->check_joined_course) == true)
            <div class="col-md-12 d-flex align-items-center">
                <a href="" class="lesson-items-title">
                    {{ ($lessons->currentPage() - 1)*config('config.pagination') + $key + 1 }}. {{ $lesson->title }}
                </a>
            </div>
        @else
            @if ($lesson->progress == 0)
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('course.lessons.show', [$course->id, $lesson->id])}}" class="lesson-items-title">
                        {{ ($lessons->currentPage() - 1)*config('config.pagination') + $key + 1 }}. {{ $lesson->title }}
                    </a>
                </div>
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <a href="{{ route('course.lessons.show', [$course->id, $lesson->id])}}" class="learn-lesson-button">Learn</a>
                </div>
            @else
                <div class="col-md-10 d-flex align-items-center">
                    <a href="{{ route('course.lessons.show', [$course->id, $lesson->id])}}" class="lesson-items-title">
                        {{ ($lessons->currentPage() - 1)*config('config.pagination') + $key + 1 }}. {{ $lesson->title }}
                    </a>
                </div>
                <div class="progress progress-lesson col-md-2 p-0 mt-4">
                    <div id="progressBarDocument" class="progress-bar"
                    style="width: {{$lesson->progress . '%'}};" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$lesson->progress . '%'}}</div>
                </div>
            @endif           
        @endif        
    </div>
</div>
