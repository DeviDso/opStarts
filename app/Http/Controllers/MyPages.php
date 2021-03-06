<?php

namespace opStarts\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use opStarts\Cities;
use opStarts\Http\Requests;
use opStarts\Pages;
use opStarts\Portfolio;
use opStarts\Skills;

class MyPages extends Controller
{
    public function postPage(Request $r)
    {
        $data = $r->all();

        $validator = Validator::make($data, [
            'category' => 'required',
            'name' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $page = Pages::create([
            'user_id' => Auth::user()->id,
            'category_id' => $data['category'],
            'name' => $data['name'],
            'phone_number' => Auth::user()->phone_number,
            'email' => Auth::user()->email,
            'type' => 0,
            'slug' => str_slug($data['name']),
        ]);

        return redirect(URL::route('myPage', [$page->id]));
    }

    public function editIndividualPage(Request $r, $id)
    {
        $data = $r->all();
        $page = Pages::find($id);
        $newSkills = [];

        $validator = Validator::make($data,[
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'logo' => 'sometimes|mimes:jpeg,jpg,png|dimensions:max_width=500,max_height=500,min_width=75,min_height=75',
            'cover' => 'sometimes|mimes:jpeg,jpg,png|dimensions:max_width=3000,max_height=1200,min_width=480,min_height=150',
            'website' => 'url',
            'facebook' => 'url',
            'google' => 'url',
            'linkedin' => 'url',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        ($r->file('logo')) ? $logo = $r->file('logo')->store('logo') : $logo = $page->logo;
        ($r->file('cover')) ? $cover = $r->file('cover')->store('cover') : $cover = $page->cover;
        (strlen($data['city']) > 0) ? $city = Cities::firstOrCreate(['name' => $data['city'], 'slug' => str_slug($data['city'])]) : $city = '';

        Pages::find($id)
            ->update([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'description' => $data['description'],
                'logo' => $logo,
                'cover' => $cover,
                'website' => $data['website'],
                'facebook' => $data['facebook'],
                'google' => $data['google'],
                'linkedin' => $data['linkedin'],
                'map_lat' => $data['lat'],
                'map_long' => $data['long'],
                'city' => (strlen($city->slug) > 0) ? $city->id : $city,
                'address' => $data['address'],
                'slug' => str_slug($data['name']),
            ]);

        if(isset($data['newSkills']))
        {
            foreach($data['newSkills'] as $skill)
            {
                $check = Skills::where('slug', str_slug($skill))->count();

                if($check == 0)
                {
                    $skill = Skills::create([
                        'name' => $skill,
                        'slug' => str_slug($skill),
                        'category' => $page->category_id,
                    ]);

                    $newSkills[] = $skill->id;
                }
            }

            if(!isset($data['skills']))
            {
                $data['skills'] = [];
            }

            $data['skills'] = array_merge($data['skills'], $newSkills);
        }

        if(isset($data['skills']))
        {

            $page->skills()->sync($data['skills']);
        }
        else
        {
            $page->skills()->detach();
        }

        return back();
    }

    public function editCompanyPage(Request $r, $id)
    {
        $data = $r->all();
        $page = Pages::find($id);
        $newSkills = [];

        $validator = Validator::make($data,[
            'company_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'logo' => 'sometimes|mimes:jpeg,jpg,png|dimensions:max_width=500,max_height=500,min_width=75,min_height=75',
            'cover' => 'sometimes|mimes:jpeg,jpg,png|dimensions:max_width=3000,max_height=1200,min_width=480,min_height=150',
            'website' => 'url',
            'facebook' => 'url',
            'google' => 'url',
            'linkedin' => 'url',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        ($r->file('logo')) ? $logo = $r->file('logo')->store('logo') : $logo = $page->logo;
        ($r->file('cover')) ? $cover = $r->file('cover')->store('cover') : $cover = $page->cover;
        (strlen($data['city']) > 0) ? $city = Cities::firstOrCreate(['name' => $data['city'], 'slug' => str_slug($data['city'])]) : $city = '';

        Pages::find($id)
            ->update([
                'name' => $data['company_name'],
                'phone_number' => $data['phone_number'],
                'cvr_number' => $data['cvr_number'],
                'email' => $data['email'],
                'address' => $data['address'],
                'post_code' => $data['post_code'],
                'city' => (strlen($city) > 0) ? $city->id : $city,
                'street' => $data['street'],
                'number' => $data['street_number'],
                'country' => $data['country'],
                'map_lat' => $data['lat'],
                'map_long' => $data['long'],
                'description' => $data['description'],
                'logo' => $logo,
                'cover' => $cover,
                'website' => $data['website'],
                'facebook' => $data['facebook'],
                'google' => $data['google'],
                'linkedin' => $data['linkedin'],
                'slug' => str_slug($data['company_name']),
            ]);

        if(!isset($data['skills']))
        {
            $data['skills'] = [];
        }

        if(isset($data['newSkills']))
        {
            foreach($data['newSkills'] as $skill)
            {
                $check = Skills::where('slug', str_slug($skill))->count();

                if($check == 0)
                {
                    $skill = Skills::create([
                        'name' => $skill,
                        'slug' => str_slug($skill),
                        'category' => $page->category_id,
                    ]);

                    $newSkills[] = $skill->id;
                }
                else
                {
                    $tempSkill = Skills::where('slug', str_slug($skill))->first();
                    $newSkills[] = $tempSkill->id;
                }
            }

            $data['skills'] = array_merge($data['skills'], $newSkills);
        }

        if(isset($data['skills']))
        {

            $page->skills()->sync($data['skills']);
        }
        else
        {
            $page->skills()->detach();
        }

        return back();
    }

    public function changePageStatus($id)
    {
        $page = Pages::find($id);
        if (count($page->description) > 0)
        {
            ($page->status) ? $page->status = 0 : $page->status = 1;
            $page->save();
        }
        else
        {
            return back()->with('toast', 'test');
        }

        return back();
    }

    public function editPage(Request $r, $id)
    {
        $data = $r->all();
        $page = Pages::find($id);
        $newSkills = [];

        $validator = Validator::make($data,[
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'logo' => 'sometimes|mimes:jpeg,jpg,png|dimensions:max_width=500,max_height=500,min_width=75,min_height=75',
            'cover' => 'sometimes|mimes:jpeg,jpg,png|dimensions:max_width=3000,max_height=1200,min_width=480,min_height=150',
            'website' => 'url',
            'facebook' => 'url',
            'google' => 'url',
            'linkedin' => 'url',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        ($r->file('logo')) ? $logo = $r->file('logo')->store('logo') : $logo = $page->logo;
        ($r->file('cover')) ? $cover = $r->file('cover')->store('cover') : $cover = $page->cover;
        (strlen($data['city']) > 0) ? $city = Cities::firstOrCreate(['name' => $data['city'], 'slug' => str_slug($data['city'])]) : $city = '';

        Pages::find($id)
            ->update([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'description' => $data['description'],
                'logo' => $logo,
                'cover' => $cover,
                'website' => $data['website'],
                'facebook' => $data['facebook'],
                'google' => $data['google'],
                'linkedin' => $data['linkedin'],
                'map_lat' => $data['lat'],
                'map_long' => $data['long'],
                'address' => $data['address'],
                'post_code' => $data['post_code'],
                'city' => (strlen($city) > 0) ? $city->id : $city,
                'street' => $data['street'],
                'number' => $data['street_number'],
                'country' => $data['country'],
                'slug' => str_slug($data['name']),
            ]);

        if(!isset($data['skills']))
        {
            $data['skills'] = [];
        }

        if(isset($data['newSkills']))
        {
            foreach($data['newSkills'] as $skill)
            {
                $check = Skills::where('slug', str_slug($skill))->count();

                if($check == 0)
                {
                    $skill = Skills::create([
                        'name' => $skill,
                        'slug' => str_slug($skill),
                        'category' => $page->category_id,
                    ]);

                    $newSkills[] = $skill->id;
                }
                else
                {
                    $tempSkill = Skills::where('slug', str_slug($skill))->first();
                    $newSkills[] = $tempSkill->id;
                }
            }

            $data['skills'] = array_merge($data['skills'], $newSkills);
        }

        if(isset($data['skills']))
        {

            $page->skills()->sync($data['skills']);
        }
        else
        {
            $page->skills()->detach();
        }

        return back();

    }













    public function deletePage($id)
    {
        Pages::destroy($id);

        return redirect()->back()->with('status', 'You page was deleted!');
    }

//    public function editPage(Request $r, $id)
//    {
//        $data = $r->all();
//
//        $page = Pages::find($id);
//
//        $logo = $page->logo;
//
//        if($r->file('logo'))
//        {
//            $logo = $r->logo->store('images');
//        }
//
//        Pages::find($id)
//            ->update([
//                'company_name' => $data['company_name'],
//                'slug' => str_slug($data['company_name']),
//                'description' => $data['description'],
//                'cvr_number' => $data['cvr_number'],
//                'city' => $data['city'],
//                'street' => $data['street'],
//                'number' => $data['number'],
//                'post_code' => $data['postal_code'],
//                'address' => $data['address'],
//                'country' => $data['country'],
//                'map_lat' => $data['map_lat'],
//                'map_long' => $data['map_long'],
//                'work_experience' => $data['work_experience'],
//                'phone_number' => $data['phone_number'],
//                'email' => $data['email'],
//                'website' => $data['website'],
//                'facebook' => $data['facebook'],
//                'linkedin' => $data['linkedin'],
//                'google' => $data['google'],
//                'logo' => $logo,
//                'cvrNumber' => $data['cvr_number'],
//            ]);
//
//        Cities::firstOrCreate([
//            'name' => $data['city'],
//            'slug' => str_slug($data['city'])
//        ]);
//
//
//        if(isset($data['services']) )
//        {
//            $page->services()->sync($data['services']);
//        }
//        else
//        {
//            $page->services()->detach();
//        }
//
//        return redirect()->back();
//    }

    public function activatePage($id)
    {
        $page = Pages::find($id);
        if($page->user_id == Auth::user()->id || count($page->description) > 0 )
        {
            $page->status = 1;
            $page->save();

            return redirect()->back()->with('status', 'You have activated your page: ' . $page->company_name);
        }

        return redirect('home');
    }

    public function suspendPage($id)
    {
        $page = Pages::find($id);
        if($page->user_id == Auth::user()->id)
        {
            $page->status = 0;
            $page->save();

            return redirect()->back()->with('status', 'You have suspended your page: ' . $page->company_name);
        }

        return redirect('home');
    }

    public function postPortfolio(Request $r, $page)
    {

    }

    public function viewPage($id)
    {
        $data['page'] = Pages::find($id);
        $data['skills'] = $data['page']->skills()->get();

        $data['gallery_items'] = Portfolio::where('page_id', $id)->get();

        return view('user.pages.view', $data);
    }

    public function description(Request $r, $id)
    {
        $data = $r->all();

        $page = Pages::find($id);
        $page->description = $data['description'];
        $page->save();

        $result = array('status' => 'success', 'message' => 'Updated');

        return json_encode($result);
    }

    public function name(Request $r, $id)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'value' => 'required|min:2'
        ]);

        if($validator->fails())
        {
            $result = array('status' => true, 'message' => $validator->errors());
            return json_encode($result);
        }

        $page = Pages::find($id);
        $page->name = $r->input('value');
        $page->save();

        $result = array('status' => 'success', 'message' => 'Updated');

        return json_encode($result);
    }

    public function email(Request $r, $id)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'value' => 'required|min:2'
        ]);

        if($validator->fails())
        {
            $result = array('status' => true, 'message' => $validator->errors());
            return json_encode($result);
        }

        $page = Pages::find($id);
        $page->email = $r->input('value');
        $page->save();

        $result = array('status' => 'success', 'message' => 'Email updated!');

        return json_encode($result);
    }

    public function website(Request $r, $id)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'value' => 'required|min:2'
        ]);

        if($validator->fails())
        {
            $result = array('status' => true, 'message' => $validator->errors());
            return json_encode($result);
        }

        $page = Pages::find($id);
        $page->website = $r->input('value');
        $page->save();

        $result = array('status' => 'success', 'message' => 'Website updated!');

        return json_encode($result);
    }

    public function phone(Request $r, $id)
    {
        $data = $r->all();

        $validator = Validator::make($data,[
            'value' => 'required|min:2'
        ]);

        if($validator->fails())
        {
            $result = array('status' => true, 'message' => $validator->errors());
            return json_encode($result);
        }

        $page = Pages::find($id);
        $page->phone_number = $r->input('value');
        $page->save();

        $result = array('status' => 'success', 'message' => 'Phone number updated!');

        return json_encode($result);
    }

    public function logo(Request $r)
    {
        $data = $r->input('imagebase64');

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $path = 'users/' . Auth::user()->id . '/profile/' . str_random(16) . '.jpg';

        Storage::disk('local')->put($path, $data);

        $user = User::find(Auth::user()->id);
        $user->profile_picture = $path;
        $user->save();

        return back();
    }

}
