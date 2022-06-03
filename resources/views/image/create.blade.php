@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Image</h3>
                    </div>
                </div>


                <div class="card-body">
                    <form action="{{ route('image.save') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <label for="image_path">imagen</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="image_path" name="image_path" placeholder="subir">
                        </div>
                        @if ($errors->has('image_path'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_path') }}</strong>
                            </span>
                        @endif
                        <label for="desc">desc</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="desc" name="desc" placeholder="desc"></textarea>
                        </div>
                        @if ($errors->has('desc'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('desc') }}</strong>
                            </span>
                        @endif

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                subir
                            </button>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </div>
@endsection
