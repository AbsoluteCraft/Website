@extends('layouts.dashboard', ['page' => 'home', 'title' => 'Dashboard'])

@section('content')
    <main class="dashboard-home">
        <div class="container">
            <h2 class="page-title">Dashboard</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Online right now
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Widget
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Widget
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div id="widget-players-online" class="panel panel-default">
                        <div class="panel-body">
                            <header>
                                <h3>Players Online</h3>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a href="{{ route('dashboard.home', ['from' => '1 day ago']) }}" class="btn btn-default btn-sm{{ $playersOnline['scale'] == 'hour' ? ' active' : '' }}">Day</a>
                                        <a href="{{ route('dashboard.home', ['from' => '1 week ago']) }}" class="btn btn-default btn-sm{{ $playersOnline['scale'] == 'day' && $playersOnline['amount'] == 7 ? ' active' : '' }}">Week</a>
                                        <a href="{{ route('dashboard.home', ['from' => '1 month ago']) }}" class="btn btn-default btn-sm{{ $playersOnline['scale'] == 'day' && $playersOnline['amount'] > 7 ? ' active': '' }}">Month</a>
                                    </div>
                                </div>
                            </header>
                            <section>
                                <canvas class="chart"></canvas>
                                <div class="data" style="display:none">{!! json_encode($playersOnline) !!}</div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <header>
                                Demographics
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="submit" data-scale="all" class="btn btn-default btn-sm" disabled>All Time</button>
                                    </div>
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop