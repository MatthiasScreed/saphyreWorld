<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Back\UserRequest;

class UserController extends ResourceController
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = app()->make(UserRequest::class);
        $request->merge([
            'valid' => $request->has('valid'),
        ]);

        User::findOrFail($id)->update($request->all());
        return back()->with('ok', __('The user has been successfully updated'));
    }

    public function valid(User $user)
    {
        $user->valid = true;
        $user->save();
        return response()->json();
    }
    public function unvalid(User $user)
    {
        $user->valid = false;
        $user->save();
        return response()->json();
    }
}