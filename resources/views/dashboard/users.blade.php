@extends('layouts.dashboard', ['page' => 'users', 'title' => 'Users'])

@section('content')
    <main class="dashboard-users">
        <div class="container">
            <h2 class="page-title">Users</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td class="filter"><input type="text" name="filter" id="filter" class="form-control input-sm" placeholder="Search..."></td>
                        <td>Username  <button type="submit" name="username"><span class="caret caret-reversed"></span></button></td>
                        <td class="active">Rank  <button type="submit" name="rank-a"><span class="caret"></span></button></td>
                        <td>Tokens  <button type="submit" name="tokens"><span class="caret caret-reversed"></span></button></td>
                        <td>Date Joined  <button type="submit" name="date-a"><span class="caret caret-reversed"></span></button></td>
                        <td class="text-center">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center"><img src="{{ player_avatar($user->uuid) }}" alt="{{ $user->username }}"></td>
                            <td><a href="{{ route('player', ['player' => $user->username]) }}" target="_blank"><span class="text-{{ $user->rank->name }} usernameFilter">{{ $user->username }}</span></a></td>
                            <td><span class="label label-{{ $user->rank->name }}">{{ $user->rank->title }}</span></td>
                            <td>{{ isset($user->player) ? $user->player->tokens : 0 }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->toFormattedDateString() }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    @if(Auth::user()->rank->id > $user->rank->id || Auth::user()->rank->name == 'operator')
                                        <a href="{{ route('dashboard.users.get', ['id' => $user->id]) }}" class="btn btn-default">Edit</a>
                                        <a href="#" class="btn btn-info">Tokens</a>
                                    @else
                                        <button disabled class="btn btn-default">Edit</button>
                                        <button disabled class="btn btn-info">Tokens</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@stop
