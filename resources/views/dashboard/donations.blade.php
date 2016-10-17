@extends('layouts.dashboard', ['page' => 'donations', 'title' => 'Donations'])

@section('content')
    <main class="dashboard-donations">
        <div class="container">
            <h2 class="page-title">Donations</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td class="filter"><input type="text" name="filter" id="filter" class="form-control input-sm" placeholder="Search..."></td>
                        <td>Username  <button type="submit" name="username"><span class="caret caret-reversed"></span></button></td>
                        <td>Rank  <button type="submit" name="rank-a"><span class="caret caret-reversed"></span></button></td>
                        <td>Amount  <button type="submit" name="amount"><span class="caret caret-reversed"></span></button></td>
                        <td>Status  <button type="submit" name="status"><span class="caret caret-reversed"></span></button></td>
                        <td class="active">Date  <button type="submit" name="date-a"><span class="caret caret-reversed"></span></button></td>
                        <td class="text-center">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donations as $donation)
                        <tr>
                            <td class="text-center"><img src="{{ player_avatar($donation->user->uuid) }}" alt="{{ $donation->user->username }}"></td>
                            <td><a href="{{ route('player', ['player' => $donation->user->username]) }}" target="_blank"><span class="text-{{ $donation->user->rank->name }} usernameFilter">{{ $donation->user->username }}</span></a></td>
                            <td><span class="label label-{{ $donation->rank->name }}">{{ $donation->rank->title }}</span></td>
                            <td>£{{ number_format($donation->amount, 2) }}</td>
                            <td>
                                @if($donation->approved)
                                    <span class="text-success">Approved</span>
                                @else
                                    <span class="text-info">In progress</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($donation->user->created_at)->toFormattedDateString() }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="{{ route('dashboard.donations.approve', ['id' => $donation->id]) }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if(!$donation->approved)
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        @else
                                            <button type="submit" class="btn btn-danger">Revoke</button>
                                        @endif
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@stop
