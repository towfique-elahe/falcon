@extends('layouts.user_panel')

@section('title', 'Profile - FALCON')
@section('pageTitle', 'profile')
@section('msg')
    hey {{ Auth::user()->name }}! here is all about you 😊
@endsection

@section('main')
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <main id="profile">
        <div class="card personal_info">
            <div>
                <h3 class="heading">Personal Information</h3>
                <p>Update your photo and personal details here.</p>
            </div>

            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- @method('patch') --}}

                {{-- name --}}
                <div class="input">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                {{-- email --}}
                <div class="input">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required
                        autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                {{-- phone --}}
                <div class="input">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" name="phone" type="tel" :value="old('phone', $user->phone)" autocomplete="phone"
                        pattern="01+[0-9]{9}" />
                </div>
                {{-- asset('assets/pictures/user.jpg') --}}
                {{-- image --}}
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
            <form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                {{-- current password --}}
                <div class="input">
                    <x-input-label for="current_password" :value="__('Current Password')" />
                    <x-text-input id="current_password" name="current_password" type="password"
                        autocomplete="current-password" placeholder="Put you current password" pattern=".{8,}" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" />
                </div>

                {{-- new password --}}
                <div class="input">
                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" name="password" type="password" autocomplete="new-password"
                        placeholder="8 character new password" pattern=".{8,}" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" />
                </div>

                {{-- confrim password --}}
                <div class="input">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                        autocomplete="new-password" placeholder="Confirm password" pattern=".{8,}" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
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
