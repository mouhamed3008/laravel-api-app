<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStorRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //recupeerer tous les utilisateurs
    public function  index(){
       $users = User::all();
        return  UserResource::collection($users);
    }

    //creer un nouvel utilisateur
    public function store(UserStorRequest $request){
       $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'date_naissance'=>$request->date_naissance,
            'age'=>$request->age
        ]);
        return new UserResource($user);
    }

    //d'afficher un utilisateur
    public function show(User $user){
        return new UserResource($user);
    }



    //mis a jour d'un utilisateur
    public function update(User $user, Request $request){
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'date_naissance'=>$request->date_naissance,
            'age'=>$request->age
        ]);
        return new UserResource($user);
    }


}
