<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\ProfileUserGeneralResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth.api');
    }

    function profile_user(Request $request) {
        $user = auth('api')->user();
        $userModel = User::findOrFail($user->id);
        if ($request->hasFile("imagen")) {
            if ($userModel->avatar) {
                Storage::delete($userModel->avatar);
            }
            $path = Storage::putFile("users",$request->file("imagen"));
            $request->request->add(["avatar"->$path]);
        }
        $userModel->update($request->all());
        return response()->json(["message"=>200,"user"=>ProfileUserGeneralResource::make($userModel)]);
    }
}
