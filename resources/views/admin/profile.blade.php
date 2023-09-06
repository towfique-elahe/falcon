@extends('layouts.admin_panel')

@section('title', 'Admin Profile - FALCON')
@section('pageTitle', 'Admin Profile')
@section('msg')
    hey {{ Auth::user()->name }}! its your profile 🔥
@endsection

@section('main')
    <main id="profile">
        <div class="card personal_info">
            <div>
                <h3 class="heading">Personal Information</h3>
                <p>Update your photo and personal details here.</p>
            </div>
            <form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                </div>
                <div class="input">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" value="{{ Auth::user()->phone }}"
                        pattern="01+[0-9]{9}">
                </div>
                <div class="input">
                    <label for="">Image</label>
                    <div class="input_img" id="image">
                        <img src="{{ !empty($user->image) ? url('upload/admin_images/' . $user->image) : url('assets/pictures/user.jpg') }}"
                        alt="" class="user_image" id="showImage">
                        <label for="uploadImage" class="upload_img">Upload your image</label>
                        <input type="file" name="image" id="uploadImage" accept="image/*">
                    </div>
                </div>
                <hr>
                <div class="buttons">
                    <button class="button cancel" type="reset">Cancel</button>
                    <button class="button action" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
        <div class="card password_info">
            <div>
                <h3 class="heading">Change Password</h3>
                <p>Update your password here.</p>
            </div>

            {{-- password --}}


            <form action="{{route('update.password')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input">
                    <label for="old_password">Old Password</label>
                    <input type="text" name="oldpassword" id="oldpassword" placeholder="Put you old password"
                        pattern=".{8,}" required>
                </div>
                <div class="input">
                    <label for="new_password">New Password</label>
                    <input type="password" name="newpassword" id="newpassword" placeholder="Put your new password"
                        pattern=".{8,}" required>
                </div>
                <div class="input">
                    <label for="new_password">New Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Put your new password"
                        pattern=".{8,}" required>
                </div>
                <hr>
                <div class="buttons">
                    <button class="button action" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </main>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
