@extends('layouts.app')

@section('content')
    <div class="all-course-page w-100 d-flex flex-column">
        <form action="{{ route('courses.index') }}" method="get">
            <div class="container d-flex">
                <div class="filter-form mt-5">
                    <a data-toggle="collapse" href="#filterCollapse" class="filter-button btn"><i class="fas fa-sliders-h"></i> Filter</a> 
                </div>

                <div class="search-form mt-5">
                    <div class="input-group d-flex">
                        <div class="form-outline d-flex">
                            <input type="text" id="formSearch" name="keyword" class="form-control form-control-search w-100" placeholder="Search..."/>
                            <i class="fas fa-search"></i>
                        </div>                   
                        <button type="submit" class="btn">Search</button>
                    </div>
                </div>
            </div>
            
            <div id="filterCollapse" class="filter-collapse panel-collapse collapse container mt-3">
                <div class="filter-collapse-body">
                    <div class="row container w-100 p-0 mx-auto font-weight-bold text-secondary">
                        <div class="col-lg-1 p-lg-0 filter-subtitle">Filter by</div>

                        <div class="col-lg-2 col-md-4 p-lg-0 newest-oldest-radio" id="newestOldestRadio">
                            <input type="radio" id="radioNewest" name="status"
                                value="{{ config('config.options.newest') }}"
                                {{ request('newest_oldest') == config('config.options.newest') ? 'checked' : '' }}>
                            <label for="radioNewest">Newest</label>

                            <input type="radio" id="radioOldest" name="status"
                                value="{{ config('config.options.oldest') }}"
                                {{ request('newest_oldest') == config('config.options.oldest') ? 'checked' : '' }}>
                            <label for="radioOldest" class="float-lg-right">Oldest</label>
                        </div>

                        <div class="col-lg-2 col-md-4 pr-lg-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-teacher  h-100 select-2" id="selectTeacher" name="teacher" style="width:100%">
                                <option value="">Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if ($teacher->id == request('teacher')) selected @endif>{{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-4 pr-lg-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-number-of-learner  select-2" id="selectNumberOfLearner"
                                name="number_of_learner" style="width:100%">
                                <option value="">Number of learners</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('number_of_learner') == config('config.options.asc')) selected @endif>Ascending</option>
                                <option value="{{ config('config.options.desc') }}" @if (request('number_of_learner') == config('config.options.desc')) selected @endif>Descending</option>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-6 pr-lg-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-number-of-lesson  select-2" id="selectNumberOfLesson"
                                name="number_of_lesson" style="width:100%">
                                <option value="">Number of lessons</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('number_of_lesson') == config('config.options.asc')) selected @endif>Ascending</option>
                                <option value="{{ config('config.options.desc') }}" @if (request('number_of_lesson') == config('config.options.desc')) selected @endif>Descending</option>
                            </select>
                        </div>                  
                    </div>

                    <div class="font-weight-bold container text-secondary row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2 col-md-6 pl-lg-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-learn-time  select-2 " id="selectLearnTime" name="total_time" style="width:100%">
                                <option value="">Total time</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('total_time') == config('config.options.asc')) selected @endif>Ascending</option>
                                <option value="{{ config('config.options.desc') }}" @if (request('total_time') == config('config.options.desc')) selected @endif>Descending</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 pl-lg-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-tag  select-2" id="selectTag" name="tag" style="width:100%">
                            <option value="">Tags</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" @if ($tag->id == request('tag')) selected @endif>{{ $tag->name }}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-6 pl-lg-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-review  select-2" id="selectReview" name="review" style="width:100%"
                            >
                                <option value="">Review</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('review') == config('config.options.asc')) selected @endif>Ascending</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('review') == config('config.options.desc')) selected @endif>Descending</option>
                            </select>
                        </div>

                        <div class="col-lg-2 pl-lg-0">
                            <div class="reset-filter" id="resetFilter">Reset</div>
                        </div>
                    </div>
                </div>
            </div>        

            <div class="container list-courses">
                <div class="row m-0">
                    @foreach ($courses as $course)
                        @include('courses.course', $course)
                    @endforeach
                </div>
            </div>

            <div class="pagination-custom container mt-5 pr-4 d-flex justify-content-end">
                {!! $courses->appends($_GET)->onEachSide(1)->links() !!}
            </div>
        </form>       
    </div>
@endsection
