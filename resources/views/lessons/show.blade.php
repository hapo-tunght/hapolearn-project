@extends('layouts.app')
@section('content')
    @include('direction', [$course->id])
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
                        <ul class="tab-bar nav nav-pills d-flex align-items-center" id="pillsTab" role="tablist">
                            <li class="nav-item col-md-" role="presentation">
                                <a class="nav-link d-flex align-items-center" id="pillsLessonsTab" data-toggle="pill" href="#pillsDescriptions" role="tab" aria-controls="pills-lessons" aria-selected="true">
                                    <p class="m-0">Descriptions</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-3" role="presentation">
                                <a class="nav-link active text-center d-flex align-items-center" id="pillsDocumentsTab" data-toggle="pill" href="#pillsDocuments" role="tab" aria-controls="pills-documents" aria-selected="false">
                                    <p class="m-0">Documents</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-3" role="presentation">
                                <a class="nav-link text-center d-flex align-items-center" id="pillsTeacherTab" data-toggle="pill" href="#pillsTeacher" role="tab" aria-controls="pills-teacher" aria-selected="false">
                                    <p class="m-0">Teachers</p>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pillsTabContent">
                            <div class="tab-pane fade" id="pillsDescriptions" role="tabpanel" aria-labelledby="pills-lessons-tab">
                                <div class="tab-content-descriptions">
                                    <div class="description d-flex flex-column">
                                        <div class="description-title">Descriptions lesson</div>
                                        <div class="description-content">{{ $lesson->description }}</div>
                                    </div>
                                    <div class="requirements d-flex flex-column">
                                        <div class="description-title">Requirements</div>
                                        <div class="description-content">{{ $lesson->requirement }}</div>
                                    </div>
                                    <div class="lesson-tag d-flex">
                                        <div>Tag:</div>
                                        @foreach ($course->tags as $tag)
                                            <div class="ml-2">#</div>
                                            <a href="" class="tag">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pillsTeacher" role="tabpanel" aria-labelledby="pills-teacher-tab">
                                <div class="main-teacher">
                                    <div class="title">Main Teachers</div>
                                    <div class="list-teacher">
                                        @foreach ($course->teachers_of_course as $teacher)
                                            @include('users.teacher', $teacher)
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="pillsDocuments" role="tabpanel" aria-labelledby="pills-documents-tab">
                                <div class="documents">
                                    <div class="title d-flex align-items-center">
                                        <p class="m-0 col-md-6">Documents</p>
                                        <div class="col-md-2"></div>
                                        <div class="progress progress-document col-md-4 p-0 mt-3">
                                            <div id="progressBarDocument" class="progress-bar"
                                            style="width: {{$lesson->progress . '%'}};" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$lesson->progress . '%'}}</div>
                                        </div>
                                    </div>
                                    <div class="show-list-documents d-flex flex-column">
                                        @foreach ($lesson->documents as $document)
                                            <div class="show-document-item">
                                                <div class="row">
                                                    <div class="document-logo col-md-1 pr-0 d-flex justify-content-end">
                                                        <img src="{{ asset($document->logo_path) }}" alt="doc-logo">
                                                    </div>
                                                    <div class="document-type col-md-1 d-flex align-items-center">
                                                        <p class="m-0">{{ $document->type }}</p>
                                                    </div>
                                                    <div class="col-md-8 d-flex align-items-center">
                                                        <a class="document-name" href="{{ asset($document->file_path) }}" data-lesson-id="{{ $lesson->id }}" data-document-id="{{ $document->id }}" target="_blank">{{ $document->name }}</a>
                                                    </div>
                                                    <div class="preview col-md-2">
                                                        <a class="preview-button btn h-100" href="{{ asset($document->file_path) }}" data-lesson-id="{{ $lesson->id }}" data-document-id="{{ $document->id }}" target="_blank">Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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
                                <div class="ml-2">:  {{ $course->number_student }}</div>
                            </div>
                            <div class="data lessons-data d-flex align-items-center">
                                <i class="fas fa-file-code"></i>
                                <div class="ml-2 subject">Lessons</div>
                                <div class="ml-2">:  {{ $course->number_lesson }} lesson</div>
                            </div>
                            <div class="data times-data d-flex align-items-center">
                                <i class="far fa-clock"></i>
                                <div class="ml-2 subject">Times</div>
                                <div class="ml-2">:  {{ $course->total_time }} hours</div>
                            </div>
                            <div class="data tags-data d-flex align-items-center">
                                <i class="fas fa-tags"></i>
                                <div class="ml-2 subject">Tag</div>
                                <div class="ml-2">:</div>
                                @foreach ($course->tags as $tag)
                                    <div class="ml-2">#</div>
                                    <a href="#" class="random-tag-name">{{ $tag->name }}</a>                                
                                @endforeach
                            </div>
                            <div class="data price d-flex align-items-center">
                                <i class="far fa-money-bill-alt"></i>
                                <div class="ml-2 subject">Price</div>
                                <div class="ml-2">:  free</div>
                            </div>
                            
                            @if (empty($course->check_joined_course) == false)
                                <div class="data leave-this-course d-flex justify-content-center align-items-center d-none">
                                    <form action="{{route('courses.leave', [$course])}}" method="GET">
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
