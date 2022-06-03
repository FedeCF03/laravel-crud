@if(Auth::user()->image)
<img src="{{ url('/user/avatar/'.Auth::user()->image) }}" class="img-thumbnail" width="200px">

@endif