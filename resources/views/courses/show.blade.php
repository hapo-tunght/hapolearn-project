@extends('layouts.app')
@section('content')
    @include('components.direction', [$course->id])
    <div class="detail-course container-fluid bg-light">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-8 p-0">
                    <img src="{{ $course->logo_path }}" alt="course-logo" class="course-logo">
                </div>
                <div class="col-md-4 pr-0">
                    <div class="descriptions-course">
                        <div class="title-of-descriptions-course">Descriptions course</div>
                        <div class="content-of-descriptions-course"><p>{{ $course->description }}</p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-0 mt-5">
            <div class="row">
                <div class="col-md-8 p-0">
                    <div class="course-detail-content">
                            <!-- Nav tabs -->
                        <ul class="tab-bar nav nav-pills d-flex align-items-center" id="pillsTabDetailCourse" role="tablist">
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link @if (!Session::has('post_review')) active @endif d-flex align-items-center" id="pillsLessonsTab" data-toggle="pill" href="#pillsLessons" role="tab" aria-controls="pills-lessons" aria-selected="true">
                                    <p class="m-0">Lessons</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link text-center d-flex align-items-center" id="pillsTeacherTab" data-toggle="pill" href="#pillsTeacher" role="tab" aria-controls="pillsTeacher" aria-selected="false">
                                    <p class="m-0">Teachers</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link @if (Session::has('post_review')) active @endif text-center d-flex align-items-center" id="pillsReviewsTab" data-toggle="pill" href="#pillsReviews" role="tab" aria-controls="pills-reviews" aria-selected="false">
                                    <p class="m-0">Reviews</p>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pillsTabContent">
                            <div class="tab-pane fade @if (!Session::has('post_review')) active show @endif" id="pillsLessons" role="tabpanel" aria-labelledby="pills-lessons-tab">
                                <div class="tab-content-lessons">
                                    <div class="form-search-lesson w-100 d-flex align-items-center">
                                        <div class="input-group col-md-6 d-flex">                                            
                                            <form action="{{route('courses.show', [$course->id])}}" method="GET" class="d-flex">
                                                <div class="form-outline d-flex">
                                                    <input type="text" id="formSearch" name="keyword_lesson" class="form-control form-control-search w-100" placeholder="Search..."/>
                                                    <i class="fas fa-search"></i>
                                                </div>
                                                <button type="submit" class="btn">Search</button>
                                            </form>          
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-center">
                                            @if (!empty($course->isJoined))
                                                <button type="" class="joined-course">Joined</button>  
                                            @else
                                                <form action="{{ route('course-users.store') }}" method="POST">
                                                    @csrf
                                                    <input class="d-none" type="text" name="course_id" value="{{ $course->id }}">
                                                    <button type="submit" class="btn join-this-course-button" id="joinThisCourseButton">Join this course</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="show-list-lessons">
                                        @foreach ($lessons as $key => $lesson)
                                            @include('lessons.lesson', [$key, $lesson])
                                        @endforeach
                                        <div class="pagination-custom container mt-3 pr-4 d-flex justify-content-end">
                                            {!! $lessons->appends($_GET)->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pillsTeacher" role="tabpanel" aria-labelledby="pills-teacher-tab">
                                <div class="main-teacher">
                                    <div class="title">Main Teachers</div>
                                    <div class="list-teacher">
                                        @foreach ($course->teachers as $teacher)
                                            @include('components.teacher', $teacher)
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade @if (Session::has('post_review')) active show @endif" id="pillsReviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                @include('reviews.index')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-0">
                    <div class="d-flex flex-column">
                        <div class="course-detail-parameters d-flex flex-column">
                            <div class="data learners-data d-flex align-items-center">
                                <i class="fas fa-users"></i>
                                <div class="ml-2 subject">Learners</div>
                                <div class="ml-2">:  {{$course->number_student}}</div>
                            </div>
                            <div class="data lessons-data d-flex align-items-center">
                                <i class="fas fa-file-code"></i>
                                <div class="ml-2 subject">Lessons</div>
                                <div class="ml-2">:  {{$course->number_lesson}} lesson</div>
                            </div>
                            <div class="data times-data d-flex align-items-center">
                                <i class="far fa-clock"></i>
                                <div class="ml-2 subject">Times</div>
                                <div class="ml-2">:  {{$course->total_time}} hours</div>
                            </div>
                            <div class="data tags-data d-flex align-items-center">
                                <i class="fas fa-tags"></i>
                                <div class="ml-2 subject">Tag</div>
                                <div class="ml-2">:</div>
                                @foreach ($course->tags as $tag)
                                    <form action="{{ route('courses.index') }}" method="GET">
                                        <input type="text" class="d-none" name="tag" value="{{ $tag->id }}">
                                        <button type="submit" class="random-tag-name p-0 mr-1">#{{ $tag->name }}</button>  
                                    </form>                                  
                                @endforeach
                            </div>
                            <div class="data price d-flex align-items-center">
                                <i class="far fa-money-bill-alt"></i>
                                <div class="ml-2 subject">Price</div>
                                <div class="ml-2">:  free</div>
                            </div>
                            
                            @if (empty($course->isJoined) == false)
                                <div class="data leave-this-course d-flex justify-content-center align-items-center d-none">
                                    <form action="{{route('course-users.destroy', [$course])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn leave-this-course-button">Leave this course</button>
                                    </form>
                                </div>                                    
                            @endif                                
                            </div>
                        
                        <div class="other-courses-in-detail">
                            <div class="other-courses-header d-flex justify-content-center align-items-center">
                                <div>Other Courses</div>
                            </div>
                            <div class="other-course-body">
                                <div class="other-course-list mt-2">
                                    @foreach ($course->other_courses as $key => $otherCourse)
                                        <div class="other-course-item d-flex align-items-center">
                                            <a href="{{route('courses.show', ['course' => $otherCourse->id])}}">
                                                {{ $key + 1 }}. {{ $otherCourse->title }}
                                            </a>                                        
                                        </div>                 
                                    @endforeach                                    
                                </div>
                            </div>
                            <div class="other-course-footer d-flex justify-content-center align-items-center">
                                <a href="{{route('courses.index')}}" class="btn view-all-ours-courses">
                                    View all ours courses
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
