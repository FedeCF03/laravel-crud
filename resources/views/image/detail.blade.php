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
                        <div>  <h2>comments{{ $image->comments->count() }}</h2>
                            <hr>
                            <form method="POST" action="{{ route('comment.save') }}">
                                @csrf
                               <input type="hidden" name="image_id" value="{{ $image->id }}" >
                                <p>
                                   <textarea class="form-control" name="content" required>

                                   </textarea>
                               </p>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary" value="Add comment">
                                    Submit</button>
                                    </div>
                            </form>
                            <div class="comments">
                                @foreach ($image->comments as $comment)
                                    <div class="comment">
                                        @if (Auth::check() && ($comment->user_id==Auth::user()->id) )
                                        <a href="{{ route('comment.delete',['id'=>$comment->id ])}}">eliminar</a>
                                        @endif

                                        <span class="nickname">{{ $comment->user->name }}:</span>
                                        <span class="nickname">{{ $comment->content }}</span>
                                    </div>
                                @endforeach
                            </div>
                        <div class="like"></div>
                        <div class="desc">{{ $image->description }}</div>
                    </div>


            </div>

        </div>

    </div>
@endsection
