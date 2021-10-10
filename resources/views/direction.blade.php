<div class="direction">
    <div class="container direction-txt">
        <span>
            <a href="{{ route('home') }}">Home</a>
            >
            <a href="{{ route('course') }}">All courses</a>
            >
            @if (isset($course->id))
                <a href="{{ route('course.show', $course->id) }}">{{ $course->title }}</a>
            @endif
            >
            @if (isset($lesson->id))
                <a href="{{ route('lesson.show', [$course->id, $lesson->id]) }}">{{ $lesson->title }}</a>
            @endif
        </span>
    </div>
</div>
