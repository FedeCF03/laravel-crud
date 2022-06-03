<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config()
    {
        return view('user.config');
    }

    public function update(Request $request)
    {


    $user= Auth::user();
        $id=$user->id;
        $validate=$this->validate($request, [
            'name' => 'required|string|max:255|unique:users,name,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'surname' => 'required|string|unique:users,surname,'.$id,
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,

        ]);
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick= $request->input('nick');
        $email = $request->input('email');


        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;
        $imagen=$request->file('imagen');
if($imagen){
$imagen_com=time().'.'.$imagen->getClientOriginalName();

Storage::disk('users')->put($imagen_com, file_get_contents($imagen->getRealPath()));

$user->image=$imagen_com;

}

        $user->save();

         return back();
    }

    public function getImagen($filename)
    {
        $file=Storage::disk('users')->get($filename);

        return new Response($file, 200);

}
}
