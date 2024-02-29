<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index(){
        if(auth()->user()->role == 1){
            $users = User::get();
        }else{
            $users = User::whereId(auth()->user()->id)->get();
        }
        return view('Back.user.index',[
            'users' => $users
        ]);
    }

    public function store(UserRequest $request){
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return back()->with('success', 'user has been created');
    }

    public function update(UserUpdateRequest $request, $id){
        $data = $request->validated();

        if ($data['password'] != ''){ 
            $data['password'] = bcrypt($data['password']);
            User::find($id)->update($data);
        }else{
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        

        return back()->with('success', 'user has been updated');
    }

    public function destroy(string $id){

        User::find($id)->delete();
        return back()->with('success', 'user has been deleted');
    }
}
