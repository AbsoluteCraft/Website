@extends('layouts.dashboard', ['page' => 'donations', 'title' => 'Donations'])

@section('content')
    <main class="dashboard-donations">
        <div class="container">
            <h2 class="page-title">Donations</h2>
            <table id="table-donations" class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Username</th>
                        <th>Rank</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
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
