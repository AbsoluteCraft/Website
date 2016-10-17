@extends('layouts.dashboard', ['page' => 'users', 'title' => $user->username])

@section('content')
    <main class="dashboard-user">
        <div class="container">
            <h2 class="page-title">{{ $user->username }}</h2>
            <div class="col-md-2">
                <img src="https://crafatar.com/avatars/boveybrawlers?size=128&amp;default=https%3A%2F%2Fcrafatar.com%2Favatars%2FTeamAbsolute%3Fsize%3D128" alt="boveybrawlers">
            </div>
            <div class="col-md-6">
                <form action="{{ route('dashboard.users.update', ['id' => $user->id]) }}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" value="{{ $user->username }}" id="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"{!! $user->active == 1 ? ' checked="checked"' : '' !!}> Verified Email
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                        <div class="col-sm-8">
                            <input type="date" name="dob" value="{{ $user->dob }}" id="dob" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="created_at" class="col-sm-2 control-label">Date Joined</label>
                        <div class="col-sm-8">
                            <input type="text" name="created_at" value="{{ $user->created_at }}" id="created_at" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rank" class="col-sm-2 control-label">Rank</label>
                        <div class="col-sm-8">
                            <select name="rank" id="rank" class="form-control">
                                @foreach($ranks as $num => $rank)
                                    <option value="{{ $num }}"{!! $user->rank->id == $num ? ' selected="selected"' : '' !!}>{{ $rank['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bio" class="col-sm-2 control-label">Bio</label>
                        <div class="col-sm-8">
                        <textarea name="bio" id="bio" class="form-control" rows="5">
{{ $user->bio }}
                        </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_email" class="col-sm-2 control-label">Contact Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="contact_email" value="{{ $user->contact_email }}" id="contact_email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="skype" class="col-sm-2 control-label">Skype</label>
                        <div class="col-sm-8">
                            <input type="text" name="skype" value="{{ $user->skype }}" id="skype" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="col-sm-2 control-label">Facebook</label>
                        <div class="col-sm-8">
                            <input type="text" name="facebook" value="{{ $user->facebook }}" id="facebook" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="col-sm-2 control-label">Twitter</label>
                        <div class="col-sm-8">
                            <input type="text" name="twitter" value="{{ $user->twitter }}" id="twitter" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="steam" class="col-sm-2 control-label">Steam</label>
                        <div class="col-sm-8">
                            <input type="text" name="steam" value="{{ $user->steam }}" id="steam" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="planetminecraft" class="col-sm-2 control-label">Planet Minecraft</label>
                        <div class="col-sm-8">
                            <input type="text" name="planetminecraft" value="{{ $user->planetminecraft }}" id="planetminecraft" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="youtube" class="col-sm-2 control-label">YouTube</label>
                        <div class="col-sm-8">
                            <input type="text" name="youtube" value="{{ $user->youtube }}" id="youtube" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_background_id" class="col-sm-2 control-label">Profile Background</label>
                        <div class="col-sm-8">
                            <select name="profile_background_id" id="profile_background_id" class="form-control">
                                @foreach($profile_backgrounds as $background)
                                    <option value="{{ $background->id }}"{!! $user->profile_background_id == $background->id ? 'selected="selected"' : '' !!}>{{ $background->url }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" value="Edit User" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@stop