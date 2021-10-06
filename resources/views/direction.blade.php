<div class="direction">
    <div class="container direction-txt">
        <span>
            <a href="{{ route('home') }}">Home</a>
            >
            <a href="{{ route('course') }}">All courses</a>
            >
            @if (isset($courseId))
                <a href="{{ route('courses.detail', $courseId) }}">{{ $course->title }}</a>
            @endif
        </span>
    </div>
</div>
