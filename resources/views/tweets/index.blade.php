@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Tweet Form Section -->
        <div class="col-md-12">
            <div class="tweet-form-container card">
                <div class="tweet-form-header card-header">Create Tweet</div>
                <div class="card-body">
                    <form action="{{ route('tweets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="tweet-form-textarea form-control" rows="3" placeholder="What's happening?" required></textarea>
                        </div>
                        <div class="form-group mt-2 position-relative">
                            <label for="image-upload" class="image-upload-label">
                                <i class="fas fa-paperclip"></i>
                            </label>
                            <input type="file" name="image" id="image-upload" class="form-control-file d-none" accept="image/*">
                        </div>
                        <button type="submit" class="tweet-form-button btn btn-primary mt-2">Tweet</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tweet Display Section -->
        <div class="col-md-12 mt-4">
            @foreach($tweets as $tweet)
                <div class="tweet-display-card card mb-3">
                    <div class="tweet-display-body card-body">
                        <div class="tweet-user-info">
                            <span class="tweet-display-title card-title">{{ $tweet->user->name }}</span>
                            <span class="tweet-display-timestamp">{{ $tweet->created_at->diffForHumans() }}</span>
                        </div>
                        <hr class="tweet-divider">
                        <div class="tweet-display-content">
                            <p class="tweet-display-text">{{ $tweet->content }}</p>
                            @if($tweet->image)
                                <img src="{{ Storage::url($tweet->image) }}" class="img-fluid mt-3" alt="Tweet Image">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
