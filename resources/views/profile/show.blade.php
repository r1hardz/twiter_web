@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-background">
        <div class="profile-header">Profile</div>

        <div class="profile-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="profile-form-group">
                    <label for="name" class="profile-form-label">Name</label>
                    <input type="text" class="profile-form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="profile-form-group mt-3">
                    <label for="nickname" class="profile-form-label">Nickname</label>
                    <input type="text" class="profile-form-control" id="nickname" name="nickname" value="{{ $user->nickname }}">
                </div>

                <div class="profile-form-group mt-3">
                    <label for="profile_picture" class="profile-form-label">Profile Picture</label>
                    <input type="file" class="profile-form-control-file" id="profile_picture" name="profile_picture" accept="image/*">
                    @if($user->profile_picture)
                        <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture" class="profile-img-fluid mt-3">
                    @endif
                </div>

                <button type="submit" class="profile-btn-primary mt-3">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
