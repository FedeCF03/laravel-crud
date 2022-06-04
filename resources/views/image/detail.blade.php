@extends('layouts.app')

@section('content')
    @include('includes.message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ url('/user/avatar/' . $image->user->image) }}" class="img-thumbnail" width="80px">

                            {{ $image->user->name }}
                        </div>

                        <div class="card-body">
                            <img src="{{ route('getIamge', ['filename' => $image->image_path]) }}" />

                        </div>
                        <a href="" class="btn btn-warning" >comments{{ $image->comments->count() }}</a>

                        </a>
                        <div class="like"></div>
                        <div class="desc">{{ $image->description }}</div>
                    </div>


            </div>

        </div>

    </div>
@endsection
