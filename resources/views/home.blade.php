@extends('layouts.app')

@section('content')
    <div id="body" class="body container-fluid position-relative p-0 w-100">
        <!-- HapoLearn banner -->
        <div class="hapo-learn-banner container-fluid d-flex align-items-center">         
            <div class="hapo-learn-banner-content container d-flex flex-column">
                <span class="hapo-learn-banner-content-title d-block">
                    Learn Anytime, Anywhere
                </span>
                <span class="hapo-learn-banner-content-bold d-block">
                    at HapoLearn <img src="{{ asset('img/hapo_logo.png') }}" alt="hapo-logo"> !
                </span>
                <span class=" hapo-learn-banner-content-quote d-block">
                    Interactive lessons, "on-the-go" <br> practice, peer support.
                </span>
                <a href="#" class="btn d-flex justify-content-center align-items-center" type="button">
                    Start Learning Now! 
                </a>
            </div>           
        </div>
        <div class="linear-gradient">
            <div class="transition-block"></div>
        </div>

        <!-- Main courses -->
        <div class="main-courses container-fluid p-0 d-flex justify-content-center ">
            <div class="row col-lg-10 col-sm-12 mb-0">
                <div class="main-courses-item col-sm-4 p-sm-0 d-flex justify-content-center">
                    <div class="main-courses-item-card card h-100 ">
                        <div class="front-end-image card-header d-flex align-items-center justify-content-center">
                            <img class="custom-image" src="{{ asset('img/rectangle_7.png') }}" alt="HTML/CSS/js">                          
                        </div>
                        <div class="main-courses-item-card-content card-body d-flex flex-column align-items-center">
                            <p class="card-content-title card-title">HTML/CSS/js Tutorial</p>
                            <p class="card-content-body card-text">I knew hardly anything about HTML, JS, and CSS before entering New
                            Media. I had coded quite a bit, but never touched
                            anything in regards to web development.</p>
                            <a href="#" class="btn courses-button d-flex justify-content-center align-items-center">Take This Course</a>
                        </div>
                    </div>
                </div>
                <div class="main-courses-item col-sm-4 p-sm-0 d-flex justify-content-center">
                    <div class="main-courses-item-card card h-100">
                        <div class="laravel-image card-header d-flex align-items-center justify-content-center">
                            <img class="custom-image" src="{{ asset('img/laravel_1_logo_black_and_white_1.png') }}" alt="laravel">                         
                        </div>
                        <div class="main-courses-item-card-content card-body d-flex flex-column align-items-center">
                            <p class="card-content-title card-title">LARAVEL Tutorial</p>
                            <p class="card-content-body card-text">I knew hardly anything about HTML, JS, and CSS before entering New
                            Media. I had coded quite a bit, but never touched
                            anything in regards to web development.</p>
                            <a href="#" class="btn courses-button d-flex justify-content-center align-items-center">Take This Course</a>
                        </div>
                    </div>
                </div>
                <div class="main-courses-item col-sm-4 p-sm-0 d-flex justify-content-center">
                    <div class="main-courses-item-card card h-100">
                        <div class="php-image card-header d-flex align-items-center justify-content-center">
                            <img class="custom-image" src="{{ asset('img/rectangle_15.png') }}" alt="php">                          
                        </div>
                        <div class="main-courses-item-card-content card-body d-flex flex-column align-items-center">
                            <p class="card-content-title card-title">PHP Tutorial</p>
                            <p class="card-content-body card-text">I knew hardly anything about HTML, JS, and CSS before entering New
                            Media. I had coded quite a bit, but never touched
                            anything in regards to web development.</p>
                            <a href="#" class="btn courses-button d-flex justify-content-center align-items-center">Take This Course</a>
                        </div>
                    </div>
                </div>
            </div>           
        </div>

        <!-- Other Courses -->
        <div class="other-courses container-fluid p-0">
            <div class="other-courses-title d-flex justify-content-center">Other courses</div>
            <div class="other-courses-title-underline mx-auto"></div>
            <div class="row-cover h-100 d-flex justify-content-center">
                <div class="row mb-0 col-lg-10 col-sm-12">
                    <div class="other-courses-item col-sm-4 p-sm-0 d-flex justify-content-center">
                        <div class="other-courses-item-card card h-100 ">
                            <div class="css-image cover-image d-flex align-items-center justify-content-center">
                                <img class="custom-image" src="{{ asset('img/css_course.png') }}" alt="css">
                            </div>
                            <div class="other-courses-item-card-content card-body d-flex flex-column align-items-center">
                                <p class="card-content-title card-title">CSS Tutorial</p>
                                <p class="card-content-body card-text">I knew hardly anything about HTML, JS, and CSS before entering
                                    New Media. <br> I had coded quite a bit, but never touched
                                    anything in regards to web development.</p>
                                <a href="#" class="btn courses-button d-flex justify-content-center align-items-center">Take This
                                    Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="other-courses-item col-sm-4 p-sm-0 d-flex justify-content-center">
                        <div class="other-courses-item-card card h-100">
                            <div class="rails-image cover-image d-flex align-items-center justify-content-center">
                                <img class="custom-image" src="{{ asset('img/rails_course.png') }}" alt="rails">
                            </div>
                            <div class="other-courses-item-card-content card-body d-flex flex-column align-items-center">
                                <p class="card-content-title card-title">Ruby on rails Tutorial</p>
                                <p class="card-content-body card-text">I knew hardly anything about HTML, JS, and CSS before entering
                                    New Media. <br> I had coded quite a bit, but never touched
                                    anything in regards to web development.</p>
                                <a href="#" class="btn courses-button d-flex justify-content-center align-items-center">Take This
                                    Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="other-courses-item col-sm-4 p-sm-0 d-flex justify-content-center">
                        <div class="other-courses-item-card card h-100">
                            <div class="java-image cover-image d-flex align-items-center justify-content-center">
                                <img class="custom-image" src="{{ asset('img/java_1.png') }}" alt="java">
                            </div>
                            <div class="other-courses-item-card-content card-body d-flex flex-column align-items-center">
                                <p class="card-content-title card-title">Java Tutorial</p>
                                <p class="card-content-body card-text">I knew hardly anything about HTML, JS, and CSS before entering
                                    New Media. <br> I had coded quite a bit, but never touched
                                    anything in regards to web development.</p>
                                <a href="#" class="btn courses-button d-flex justify-content-center align-items-center">Take This
                                    Course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="view-all-our-courses container d-flex justify-content-center" href="{{ route('courses.index') }}">
                View All Our Courses 
                <span>
                    <img src="{{ asset('img/right_arrow.png') }}" alt="arrow">
                </span>
            </a>
        </div>

        <!-- Why-hapolearn-banner -->
        <div class="why-hpl-banner container-fluid p-0">
            <div class="row w-100 h-100 align-items-center m-0">
                <div class="why-hpl-text col-sm-6 d-flex flex-column align-items-center pr-0">
                    <div class="why-hpl-text-title">
                        <p>Why HapoLearn?</p>
                    </div>
                    <div class="text-content">
                        <i class="fas fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer support.
                    </div>
                    <div class="text-content">
                        <i class="fas fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer support.
                    </div>
                    <div class="text-content">
                        <i class="fas fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer support.
                    </div>
                    <div class="text-content">
                        <i class="fas fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer support.
                    </div>
                    <div class="text-content">
                        <i class="fas fa-check-circle"></i>Interactive lessons, "on-the-go" practice, peer support.
                    </div>
                </div>
                <div class="multi-device-image col-sm-6 d-flex align-items-center"></div>
            </div>           
            <div class="single-device-image"></div>

        </div>
        <div class="feedback-slider container">
            <div class="feedback-slider-title d-flex justify-content-center">Feedback</div>
            <div class="feedback-slider-underline mx-auto"></div>
            <div class="feedback-slider-content d-flex justify-content-center">
                <p>What other students turned professionals have to say about us after learning with us and reaching their goals</p>
            </div>
            <div class="feedback-slider-comment d-flex">
                @foreach ($reviews as $review)
                    <div class="slide-feedback">
                        <div class="slide-feedback-comment">
                            <div class="comment-text">
                                <p>“{{ $review->content }}”</p>
                            </div>
                        </div>
                        <div class="slide-feedback-user d-flex">
                            <div class="user-avatar d-flex align-items-center">
                                <img src="{{ asset($review->user->avatar) }}" alt="avatar">
                            </div>  
                            <div class="user-info d-flex flex-column">
                                <div class="user-info-name">{{ $review->user->name }}</div>
                                <div class="user-info-lang">{{ $review->course->title }}</div>
                                <div class="user-info-vote">
                                    @for ($i = 0; $i < $review->rate; $i++)
                                            <i class="fas fa-star"></i>
                                    @endfor
                                    @for ($i = 0; $i < 5 - $review->rate; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </div>   
                            </div>                     
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="become-a-member container-fluid d-flex justify-content-center align-items-center ">
            <div class="become-a-member-content col-md-6 d-flex flex-column align-items-center">
                <p>Become a member of our growing community!</p>
                <a class="btn d-flex justify-content-center align-items-center" href="#">Start Learning Now!</a>
            </div>
        </div>
        <div class="statistic container-fluid p-0 d-flex flex-column">
            <div class="statistic-title d-flex flex-column mx-auto">
                <p>Statistic</p>
                <div class="statistic-title-underline"></div>
            </div>
            <div class="specific-statistic container-fluid p-0">
                <div class="row w-100 h-100 m-0">
                    <div class="specific-statistic-courses col-sm-4 d-flex justify-content-center">
                        <div class="item-name">
                            Courses
                            <div class="item-number">{{ $courses }}</div>
                        </div>                        
                    </div>
                    <div class="specific-statistic-lessons col-sm-4 d-flex justify-content-center">
                        <div class="item-name">
                            Lessons
                            <div class="item-number"> {{ $lessons }}</div>
                        </div>                       
                    </div>
                    <div class="specific-statistic-learners col-sm-4 d-flex justify-content-center">
                        <div class="item-name">
                            Learners
                            <div class="item-number">{{ $learners }}</div>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>

        <div class="chat-box">
            <div id="fb-root"></div>
            <div id="fb-customer-chat" class="fb-customerchat"></div>
        </div>
    </div>
@endsection
