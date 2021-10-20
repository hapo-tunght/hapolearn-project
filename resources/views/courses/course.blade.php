<div class="col-sm-6 mt-5">
    <div class="card customize-list-courses-card">
        <div class="card-body">
            <div class="course-card-top">
                <img src="{{ $course->logo_path }}" alt="course img" class="course-card-top-img">
                <div class="course-card-top-content">
                    <a href="{{ route('course.show', [$course->id]) }}" class="course-card-top-content-title">{{ $course->title }}</a>
                    <div class="course-card-top-content-description">{{ $course->description }}</div>
                    <div>
                        <a href="{{ route('course.show', [$course->id]) }}" class="button-more">More</a>
                    </div>
                </div>
            </div>
            <div class="course-card-bottom">
                <div class="row w-100 m-0 mt-2">
                    <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                        <span class="course-card-bottom-subtitle">Learners</span>
                        <span class="course-card-bottom-number">{{$course->number_student}}</span>
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                        <span class="course-card-bottom-subtitle">Lessons</span>
                        <span class="course-card-bottom-number">{{$course->number_lesson}}</span>
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                        <span class="course-card-bottom-subtitle">Times</span>
                        <span class="course-card-bottom-number">{{ $course->total_time}}(h)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
