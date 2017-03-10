<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    protected $table = 'user_groups';

    protected $fillable = ['user_id', 'name', 'description'];

    public function user()
    {
        return $this->belongsTo('opStarts\Users', 'id', 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany('opStarts\User', 'user_group_members', 'group_id', 'user_id');
    }

    public static function groupSkills($id)
    {
        $group = UserGroups::find($id);
        $users = $group->users()->get();
        $userList = [];

        foreach($users as $user)
        {
            $userList[] = $user->id;
        }

        $skills = UserSkills::whereIn('user_id', $userList)->distinct()->get();

        $allSkills = [];

        foreach($skills as $skill)
        {
            $allSkills[] = Skills::find($skill->skill_id);
        }

        $allSkills = array_unique($allSkills);

        return $allSkills;
    }

    public static function getMembersCount($id)
    {
        $group = UserGroups::find($id);

        return $group->users()->count();
    }
}
