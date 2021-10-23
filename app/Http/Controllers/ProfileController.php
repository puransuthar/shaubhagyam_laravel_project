<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('auth.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $Validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'digits:10', 'unique:users,mobile_number,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'gender' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'profile_pic' => ['mimes:jpg,jpeg,png'],
        ]);

        if($Validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $Validator->errors()->all()
            ]);
        }
        else{
            $user = User::find($id);
            $filename = $user->profile_pic;
            $prev_image_path = public_path('user_images/').$filename;

            if($request->hasFile('profile_pic')){
                if($filename != ''){
                    unlink($prev_image_path);
                }
                
                $file = request()->file('profile_pic');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('user_images/',$filename); 
            }

            $user->name = $request->name;
            $user->mobile_number = $request->mobile_number;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->profile_pic = $filename;
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'Profile Updated Successfully.'
            ]);
        }
    }

    public function list()
    {
        $users = User::all();
        return view('auth.listusers', compact('users'));
    }
}
