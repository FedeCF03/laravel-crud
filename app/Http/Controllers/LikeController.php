<?php

namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($image_id){

        $user = Auth::user();
$like = new Like();
$like->user_id=$user->id;
$like->image_id= (int)$image_id;
$isset_like = Like::where('user_id',$user->id)->where('image_id',$image_id)->count();

if($isset_like == 0){
    $like->save();
    return response()->json(['like'=>true]);}
 elseif($isset_like == 1){
    $like = Like::where('user_id',$user->id)->where('image_id',$image_id)->first();
    $like->delete();
    return response()->json(['like'=>false]);
}else{
    return response()->json(['message'=>'el like no existe']);
}
    }
}


