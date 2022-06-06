@extends('layouts.app')

@section('content')
    @include('includes.message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($images as $image)
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ url('/user/avatar/' . $image->user->image) }}" class="img-thumbnail"
                                width="80px">
                            <a href="{{ url('/image/' . $image->id) }}"><span class="nickname">
                                    {{ $image->user->name }}
                                </span>
                            </a>
                        </div>

                        <div class="image-container">
                            <img src="{{ route('getIamge', ['filename' => $image->image_path]) }}" />

                        </div>

                    </div>
                        </a>
                        <div class="like">
                            {{ count($image->likes) }}
                            <?php $user_like = false; ?>
                            @foreach ($image->likes as $like)
                                @if ($like->user->id == Auth::user()->id)
                                    <?php $user_like = true; ?>
                                @endif;
                                @endforeach

                            <img src="{{ asset('imgs/black-like.png') }}" class="btn-like">
                            <img src="{{ asset('imgs/blue-like.png') }}" class="btn-like">

                        </div>
                        <div class="desc">{{ $image->description }}</div>
                    </div>

            </div>

        </div>

    </div>
@endsection
