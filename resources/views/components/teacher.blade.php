<div class="main-teacher-item col-md-12 d">
    <div class="row">
        <div class="teacher-item-title d-flex align-items-center">
            <div class="teacher-avatar">
                <img src="{{$teacher->avatar}}" alt="teacher-avatar">
            </div>
            <div class="teacher-info d-flex flex-column">
                <div class="teacher-name">{{ $teacher->name}}</div>
                <div class="teacher-experience">Second Year Teacher</div>
                <div class="teacher-contact d-flex">
                    <a href="" class="social-network google"><i class="fab fa-google-plus-g"></i></a>
                    <a href="" class="social-network facebook ml-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="social-network slack ml-2"><i class="fab fa-slack"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="teacher-description">{{$teacher->about_me}}</div>
    </div>
</div>
