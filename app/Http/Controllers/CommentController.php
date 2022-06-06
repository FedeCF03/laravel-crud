<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request)
    {
        $validated = $request->validate([
            'image_id' => ' required | numeric',
            'content' => 'required | max:255'
        ]);

        //Recoger los datos del formulario
        $user_id = Auth::user()->id;
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        $comment = new comment();
        $comment->user_id = $user_id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        redirect()->route('detail' ,['id'=>$image_id]  );

        $comment->save();

    }
public function delete($id)
{

    $user=Auth::user();

    $comment = Comment::find($id);
    $image_id = $comment->image_id;

    if($user && $comment->user_id == $user->id)
    {
        $comment->delete();
        return redirect()->route('detail' ,['id'=>$image_id]  );
    }
    else
    {
        return redirect()->route('home');
    }

}


}
