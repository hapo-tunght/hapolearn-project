@extends('layouts.app')
@section('content')
    <div class="profile-page container-fluid">
        <div class="profile-page container p-0">
            <div class="row m-0 p-0">
                <div class="left-column col-md-3 pl-0 d-flex flex-column">
                    <div class="name-and-avatar">
                        <div class="avatar d-flex flex-column justify-content-center">
                            <div class="d-flex flex-column align-items-center">
                                <img src="{{ asset($user->avatar) }}"  alt="avatar">
                                <i class="fas fa-camera" data-toggle="modal" data-target="#upload-avatar-modal"></i>
                            </div>
                            <div class="name">{{ $user->name }}</div>
                            <div class="email">{{ $user->email }}</div>
                        </div>
                    </div>
                    <div class="personal-infor d-flex flex-column">
                        <div class="birthday d-flex align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-birthday-cake mr-3 pt-1" style="color: #F26525;"></i>
                                <div>{{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                        <div class="phone-number d-flex align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-phone mr-3 pt-1" style="color: #B2D235;"></i>
                                <div>{{ $user->phone_number }}</div>
                            </div>
                        </div>
                        <div class="address d-flex align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-home mr-3 pt-1"></i>
                                <div>{{ $user->address }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="description">{{ $user->about_me }}</div>
                </div>
                <div class="right-column col-md-9 pr-0 pl-5">
                    <div class="my-courses">
                        <div class="title">My courses</div>
                        <div class="underline"></div>
                        <div class="show-my-list-courses d-flex justify-content-center">
                            <div class="row">
                                @foreach ($user->my_courses as $course)
                                    <a href="{{route('course.show', [$course->id])}}" class="my-course-item d-flex flex-column" target="_blank">
                                        <div class="course-logo">
                                            <img src="{{ $course->logo_path }}" alt="my-course-logo">
                                        </div>
                                        <div class="course-name text-center">{{ $course->title }}</div>
                                    </a>
                                @endforeach
                                <a href="{{ route('course') }}" class="add-course d-flex flex-column">
                                    <div class="add-course-top d-flex justify-content-center align-items-center">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="add-course-bottom text-center">Add course</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="edit-profile">
                        <div class="title">Edit profile</div>
                        <div class="underline"></div>
                        <div class="form-edit-profile mb-4">
                            <form action="{{ route('user.update') }}" method="post">
                                @csrf
                                <div class="row m-0 p-0">
                                    <div class="col-md-6 mt-3 pl-0">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="profile_name" class="form-control" id="name" value="{{ $user->name }}">
                                            @error('profile_name')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="profile_email" class="form-control" id="email" value="{{ $user->email }}">
                                            @error('profile_email')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3 pl-0">
                                        <div class="form-group">
                                            <label for="birthday">Date of birth:</label>
                                            <input type="date" name="profile_birthday" class="form-control" id="birthday" value="{{ $user->birthday }}">
                                            @error('profile_birthday')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="phone">Phone:</label>
                                            <input type="tel" name="profile_phone" class="form-control" id="phone" value="{{ $user->phone_number }}">
                                            @error('profile_phone')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3 pl-0">
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input type="text" name="profile_address" class="form-control" id="address" value="{{ $user->address }}">
                                            @error('profile_address')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="desc">About me:</label>
                                            <textarea type="text" name="profile_desc" class="form-control" id="desc"></textarea>
                                            @error('profile_desc')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-update">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="upload-avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="exampleModalLabel">Upload Avatar</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('user.avatar') }}" method="post" id="upload-avatar-form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group input-image-avatar">
                                <label>Import your image file</label>
                                <input type="file" class="form-control-file border" id="file-image-input" name="profile_avatar" required>
                                @error('profile_avatar')
                                    <span class="invalid-feedback d-block" role="alert" id="image-input-error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-close-modal-avatar" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-update-avatar">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
