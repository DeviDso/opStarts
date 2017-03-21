<?php

namespace opStarts;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'phone_number', 'gender', 'nationality', 'profile_picture', 'current_status', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pages()
    {
        return $this->hasMany('opStarts\Pages', 'user_id', 'id');
    }

    public function skills()
    {
        return $this->belongsToMany('opStarts\Skills', 'user_skills',
            'user_id', 'skill_id');
    }

    public function groups()
    {
        return $this->belongsToMany('opStarts\UserGroups', 'user_group_members',
            'user_id', 'group_id');
    }

    public static function validate($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:2',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        return true;
    }

    public static function getName($id)
    {
        return User::find($id)->name;
    }

    public static function getFullName($id)
    {
        return User::find($id)->name . ' ' . User::find($id)->surname;
    }

    public static function getProfilePicture($id)
    {
        return User::find($id)->profile_picture;
    }
}
