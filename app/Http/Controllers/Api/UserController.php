<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Display the specified resource.
     */

     public function store(UserRequest $request)
     {
         //Retrieve the validated input data...
         $validated = $request->validated();

         $validated['password'] = Hash::make($validated['password']);
 
         $user = User::create($validated);
 
         return $user;
     }

    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return $user;
    }
}
