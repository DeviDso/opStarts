<?php

namespace opStarts\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use opStarts\Http\Requests;
use opStarts\Skills;
use opStarts\User;
use opStarts\UserGroupInvitation;
use opStarts\UserGroups;
use opStarts\UserSkills;

class UserGroupsController extends Controller
{
    public function create()
    {
        return view('user.groups.new');
    }

    public function postGroup(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $ug = UserGroups::create([
            'user_id' => Auth::user()->id,
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        $ug->users()->sync($data['owner']);

        if(isset($data['members']))
        {
            foreach($data['members'] as $member)
            {
                UserGroupInvitation::create([
                    'group_id' => $ug->id,
                    'email' => $member,
                ]);

                $check = User::where('email', $member)->exists();

                if(!$check)
                {
                    //NEED TO FINISH THIS (Send email for user which is not on the system!!!)
                   // echo $member;
                }
            }
        }
        return redirect(route('userGroup', $ug->id));
    }

    public function group($id)
    {
        $data['group'] = UserGroups::find($id);
        $data['members'] = $data['group']->users()->get();

        return view('user.groups.group', $data);
    }

    public function invitations()
    {
        $email = Auth::user()->email;

        $invitations = UserGroupInvitation::where('email', $email)->get();

        $data['invitations'] = [];

        foreach($invitations as $invitation)
        {
            $data['invitations'][] = UserGroups::find($invitation->group_id);
        }

        return view('user.groups.invitations', $data);
    }

    public function acceptInvitation(Request $r)
    {
        $data = $r->all();

        $user = Auth::user();

        $check = UserGroupInvitation::where('group_id', $data['group_id'])->where('email', $user->email)->exists();

        if($check)
        {
            $invitation = UserGroupInvitation::where('group_id', $data['group_id'])->where('email', $user->email)->first();

            $group = UserGroups::find($data['group_id']);
            $group->users()->attach($user->id);
            $invitation->delete();
        }

        return redirect('/');
    }
}
