<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('form');
    }


    public function store(StoreUserRequest $request)
    {

        return 'form recieved';
    }

    /**
     * @ Model event life cycle using events and listener -> way 1
     */
    public function creatingEvent()
    {
        User::create([
            'name' => 'ddidy',
            'email' => rand(1,10).'mail@mail.com',
            'password' => 'check',
            'sub' => '1',
        ]);
    }

    /**
     * @ Model event life cycle using boot method -> way 2
     */
    public function updateEvent()
    {
        $user = User::findOrFail(rand(1,10));
        $user->update(['name' => 'dada']);

    }

    /**
     * @ Model event life cycle using Observer ->way 3
     */
    public function deleteEvent()
    {
        $user = User::findOrFail(rand(1,10));
        $user->delete();

    }
}
