<?php

namespace opStarts\Http\Controllers;

use Illuminate\Support\Facades\URL;
use opStarts\Categories;
use opStarts\Confirmation;
use opStarts\Pages;
use opStarts\User;
use Illuminate\Http\Request;

use opStarts\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function postConfirmation(Request $r)
    {
        $data = $r->all();

        $confirmation = Confirmation::where('user_id', '=', Auth::user()->id)->first();

        if($data['confirm'] ==  $confirmation->code)
        {
            $confirmation->status = 1;
            $confirmation->save();

            $user = User::find(Auth::user()->id);
            $user->status = 1;
            $user->save();

            return redirect(URL::route('profile'))->with('message', 'You have confirmed your phone number!');
        }

        return redirect()->back()->with('status', 'Incorrect activation code!');
    }

    public function resendConfirmation(Request $r)
    {
        $user = Auth::user()->id;
        $confirmation = Confirmation::where('user_id', '=', $user)->first();
        $confirmation->code = rand(1000,9999);
        $confirmation->save();
        $confirmation->touch();

        Confirmation::send(Auth::user()->phoneNumber, $confirmation->code);

        return redirect()->back()->with('status', 'Check your phone for new activation code!');
    }

    public function postProfile(Request $r)
    {
        $data = $r->all();

        $user = Auth::user();

        if(isset($data['skills']) ? $user->skills()->sync($data['skills']) : $user->skills()->detach());


        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'profile_picture' => 'sometimes|mimes:jpeg,jpg,png|dimensions:max_width=1000,max_height=1000,min_width=75,min_height=75',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        (isset($data['gender'])) ? true : $data['gender'] = NULL;
        ($r->file('profile_picture')) ? $profilePicture = $r->file('profile_picture')->store('profileImage') : $profilePicture = $user->profile_picture;

        User::find(Auth::user()->id)
            ->update([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'nationality' => $data['nationality'],
                'gender' => $data['gender'],
                'current_status' => $data['current_status'],
                'description' => $data['description'],
                'profile_picture' => $profilePicture,
            ]);

        return redirect()->back()->with('success', 'You have updated your profile!');
    }
}
