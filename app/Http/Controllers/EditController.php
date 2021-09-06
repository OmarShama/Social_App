<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{

    public function index()
    {
        return view('auth.edit');
    }

    public function store(EditProfileRequest $request)
    {
        $validatedData = $request->validated();
        $path = Storage::putFile('users', $validatedData['image']);
        $validatedData['image']=$path;
        $user = auth()->user();
        // $validatedData['user_id'] = auth()->user()->id;
        $user->update($validatedData);

        return redirect()->back();
    }
}
