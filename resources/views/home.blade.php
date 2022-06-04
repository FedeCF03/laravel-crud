@extends('layouts.app')

@section('content')
    @include('includes.message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($images as $image)
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ url('/user/avatar/' . $image->user->image) }}" class="img-thumbnail" width="80px">
<a href="{{ url('/image/' . $image->id) }}"><span class="nickname">
                            {{ $image->user->name }}
                            </span>
                        </a>
                        </div>

                        <div class="card-body">
                            <img src="{{ route('getIamge', ['filename' => $image->image_path]) }}" />

                        </div>
                        <a href="" class="btn btn-warning" >comments{{ $image->comments->count() }}</a>

                        </a>
                        <div class="like"></div>
                        <div class="desc">{{ $image->description }}</div>
                    </div>
                @endforeach

            </div>

        </div>

    </div>
@endsection
