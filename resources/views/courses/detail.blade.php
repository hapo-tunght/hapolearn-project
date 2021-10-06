@extends('layouts.app')
@section('content')
    @include('direction', [$courseId])
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
                        <ul class="tab-bar nav nav-pills d-flex align-items-center" id="pills-tab" role="tablist">
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link active d-flex align-items-center" id="pills-lessons-tab" data-toggle="pill" href="#pills-lessons" role="tab" aria-controls="pills-lessons" aria-selected="true">
                                    <p class="m-0">Lessons</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link text-center d-flex align-items-center" id="pills-teacher-tab" data-toggle="pill" href="#pills-teacher" role="tab" aria-controls="pills-teacher" aria-selected="false">
                                    <p class="m-0">Teachers</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link text-center d-flex align-items-center" id="pills-reviews-tab" data-toggle="pill" href="#pills-reviews" role="tab" aria-controls="pills-reviews" aria-selected="false">
                                    <p class="m-0">Reviews</p>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-lessons" role="tabpanel" aria-labelledby="pills-lessons-tab">
                                <div class="tab-content-lessons">
                                    <div class="form-search-lesson w-100 d-flex align-items-center">
                                        <div class="input-group col-md-6 d-flex">                                            
                                            <form action="{{route('lessons.search', [$courseId])}}" method="GET" class="d-flex">
                                                <div class="form-outline d-flex">
                                                    <input type="text" id="form-search" name="keyword" class="form-control form-control-search w-100" placeholder="Search..."/>
                                                    <i class="fas fa-search"></i>
                                                </div>
                                                <button type="submit" class="btn">Search</button>
                                            </form>          
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-center">
                                            @if (isset($haveNotJoinedCourse) && $haveNotJoinedCourse) 
                                                <form action="{{route('courses.join', [$courseId])}}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn join-this-course-button">Join this course</button>
                                                </form>
                                            @else
                                            <button type="" class="joined-course">Joined</button>                                                
                                            @endif
                                        </div>
                                    </div>
                                    <div class="show-list-lessons">
                                        @foreach ($lessons as $key => $lesson)
                                            @include('lessons.lesson', [$key, $lesson, $courseId])
                                        @endforeach
                                        <div class="pagination-custom container mt-3 pr-4 d-flex justify-content-end">
                                            {!! $lessons->appends($_GET)->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-teacher" role="tabpanel" aria-labelledby="pills-teacher-tab">
                                <div class="main-teacher">
                                    <div class="title">Main Teachers</div>
                                    <div class="list-teacher">
                                        @foreach ($teachers as $teacher)
                                            @include('users.teacher', $teacher)
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">...</div>
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
                                @foreach ($tags as $tag)
                                    <div class="ml-2">#</div>
                                    <a href="#" class="random-tag-name">{{ $tag->name }}</a>                                
                                @endforeach
                            </div>
                            <div class="data price d-flex align-items-center">
                                <i class="far fa-money-bill-alt"></i>
                                <div class="ml-2 subject">Price</div>
                                <div class="ml-2">:  free</div>
                            </div>
                            
                            @if (isset($haveNotJoinedCourse) && $haveNotJoinedCourse == false)
                                <div class="data leave-this-course d-flex justify-content-center align-items-center d-none">
                                    <form action="{{route('courses.leave', [$courseId])}}" method="GET">
                                        @csrf
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
                                    @foreach ($otherCourses as $key => $otherCourse)
                                        <div class="other-course-item d-flex align-items-center">
                                            <a href="{{route('courses.detail', ['courseId' => $otherCourse->id])}}">
                                                {{ $key + 1 }}. {{ $otherCourse->title }}
                                            </a>                                        
                                        </div>                 
                                    @endforeach                                    
                                </div>
                            </div>
                            <div class="other-course-footer d-flex justify-content-center align-items-center">
                                <a href="{{route('course')}}" class="btn view-all-ours-courses">
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
