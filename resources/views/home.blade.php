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
                    <div>  <h2>comments{{ $image->comments->count() }}</h2>
                        <hr>
                        <form method="POST" action="">
                            @csrf
                           <input type="hidden" name="image_id" value="{{ $image->id }}" >
                            <p>
                               <textarea class="form-control" name="content" required >

                               </textarea>
                           </p>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary" value="Add comment">
                                Submit</button>
                                </div>
                        </form>
                    </div>
                        </a>
                        <div class="like"></div>
                        <div class="desc">{{ $image->description }}</div>
                    </div>
                @endforeach

            </div>

        </div>

    </div>
@endsection
