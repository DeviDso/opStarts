<div id="services_info" class="tabcontent">
    <div class="form-group{{ $errors->has('skills') ? ' has-error' : '' }}">
        <label for="skills" class="col-md-3 control-label">Services</label>
        <div class="col-md-9">
            <input id="skills" type="text" onkeydown="addSkill(this)" autocomplete="off" style="width: 350px">

            @if ($errors->has('skills'))
                <span class="help-block">
                    <strong>{{ $errors->first('skills') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="skills_list" class="col-md-3 control-label">
            <small>Your services:</small>
        </label>
        <div class="col-md-9">
            <div id="skills_list">
                @foreach($skills as $skill)
                    <span class="skill" onclick="remove(this)" id="{{ $skill->id }}">{{ $skill->name }}</span>
                    <input type="hidden" name="skills[]" value="{{ $skill->id }}" id="hidden-{{ $skill->id }}">
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group padding-bottom">
        <label for="skills_list" class="col-md-3 control-label">
            Can't find your service?
        </label>
        <div class="col-md-9">
            <div id="skills_list">
                <div class="col-md-12" id="new_skills"></div>
                <div id="add_new_service">
                    + Add new service
                </div>
            </div>
        </div>
    </div>
</div>