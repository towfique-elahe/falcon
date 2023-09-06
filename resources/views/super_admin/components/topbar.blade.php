<section id="topbar">
    <div class="breadcrumb">
        <h1 class="page_title">@yield('pageTitle')</h1>
        <p class="msg">@yield('msg')</p>
    </div>

    @php
        $id = Auth::user()->id;
        $user = App\Models\User::find($id);
    @endphp

    <div class="user">
        <a href="javascript:void()">
            <img src="{{ !empty($user->image) ? url('upload/admin_images/' . $user->image) : url('assets/pictures/user.jpg') }}"
                alt="" class="user_image">
        </a>
    </div>
</section>
