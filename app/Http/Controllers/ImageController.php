<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File
;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Response;


class ImageController extends Controller
{

    public function create()
    {
        return view('image.create');
    }

    public function save(Request $request)
    {
        $validate = $this->validate($request, [
            'image_path' => 'required|image',
            'desc' => 'required'

        ]);

        $description = $request->input('desc');
        $image_path = $request->file('image_path');
        $user = Auth::user();
$image = new Image();
$image->user_id =$user->id;

$image->description=$description;

if($image_path){
    $image_path_name = time().$image_path->getClientOriginalName();
    Storage::disk('images')->put($image_path_name, file_get_contents($image_path->getRealPath()));
    $image->image_path = $image_path_name;
}

$image->save();

return redirect()->route('home')->with(['message'=>'imagen subida']);

}

public function getImage($filename){
    $file = Storage::disk('images')->get($filename);
    return new Response($file,200);
}
public function detail ($id){
    $image = Image::find($id);
    return view('image.detail',['image'=>$image]);
}

}

