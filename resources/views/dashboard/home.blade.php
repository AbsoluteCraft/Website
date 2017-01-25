@extends('layouts.dashboard', ['page' => 'home', 'title' => 'Dashboard'])

@section('content')
    <main class="dashboard-home">
        <div class="container">
            <h2 class="page-title">Dashboard</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default panel-status">
                        <div class="panel-body">
                            Online right now
                            <h3>{{ $onlineRn }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default panel-status">
                        <div class="panel-body">
                            CPU
                            <div class="progress-group">
                                <svg class="progress-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 60"><path d="M33.4 36H14.6c-1.4 0-2.6-1.2-2.6-2.6V14.6c0-1.4 1.2-2.6 2.6-2.6h18.9c1.4 0 2.6 1.2 2.6 2.6v18.9c-.1 1.4-1.2 2.5-2.7 2.5zM13 9.1c-.8 0-1.5-.7-1.5-1.5V2c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.6c0 .9-.7 1.5-1.5 1.5zM20.3 9.1c-.8 0-1.5-.7-1.5-1.5V2c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.6c0 .9-.6 1.5-1.5 1.5zM27.7 9.1c-.8 0-1.5-.7-1.5-1.5V2c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.6c0 .9-.7 1.5-1.5 1.5zM35 9.1c-.8 0-1.5-.7-1.5-1.5V2c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.6c0 .9-.6 1.5-1.5 1.5z"/><g><path d="M13 47.5c-.8 0-1.5-.7-1.5-1.5v-5.6c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5V46c0 .8-.7 1.5-1.5 1.5zM20.3 47.5c-.8 0-1.5-.7-1.5-1.5v-5.6c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5V46c0 .8-.6 1.5-1.5 1.5zM27.7 47.5c-.8 0-1.5-.7-1.5-1.5v-5.6c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5V46c0 .8-.7 1.5-1.5 1.5zM35 47.5c-.8 0-1.5-.7-1.5-1.5v-5.6c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5V46c0 .8-.6 1.5-1.5 1.5z"/></g><g><path d="M46 14.5h-5.6c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5H46c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5zM46 21.8h-5.6c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5H46c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5zM46 29.2h-5.6c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5H46c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5zM46 36.5h-5.6c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5H46c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5z"/><g><path d="M7.6 14.5H2c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5h5.6c.8 0 1.5.7 1.5 1.5s-.6 1.5-1.5 1.5zM7.6 21.8H2c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5h5.6c.8 0 1.5.7 1.5 1.5s-.6 1.5-1.5 1.5zM7.6 29.2H2c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5h5.6c.8 0 1.5.7 1.5 1.5s-.6 1.5-1.5 1.5zM7.6 36.5H2c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5h5.6c.8 0 1.5.7 1.5 1.5s-.6 1.5-1.5 1.5z"/></g></g></svg>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $resources['average']['cpu'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $resources['average']['cpu'] }}%;">
                                        {{ $resources['average']['cpu'] }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default panel-status">
                        <div class="panel-body">
                            Memory
                            <div class="progress-group">
                                <svg class="progress-icon"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 30"><path d="M23.855 8.137L22.767 7.05l.646-.645c.378-.378.586-.88.586-1.414s-.21-1.035-.587-1.413l-1.96-1.96c-.106-.108-.258-.16-.408-.144-.044.005-.085.015-.046.018-.277 0-.5-.223-.51-.413.008-.03.023-.104.026-.136.014-.152-.044-.304-.157-.41-.77-.716-2.04-.687-2.775.047l-17 17c-.378.378-.586.88-.586 1.414 0 .505.19.988.54 1.36.104.114.303.153.46.14.275 0 .5.225.508.42-.008.027-.023.1-.026.126-.017.15.036.3.144.41l1.96 1.958c.378.378.88.586 1.414.586s1.036-.208 1.414-.586l.646-.646 1.086 1.086c.098.098.226.146.354.146s.256-.05.354-.146l5-5c.195-.195.195-.512 0-.707l-1.086-1.086.793-.792 1.087 1.086c.098.098.226.146.354.146s.257-.05.355-.146l8.5-8.5c.195-.195.195-.512 0-.707zM8.852 17.844l-3 3c-.097.098-.225.146-.353.146s-.257-.05-.355-.146l-2-2c-.047-.046-.083-.102-.11-.163-.133-.323-.133-.323 3.11-3.544.197-.193.513-.193.707 0l2 2c.195.196.195.513 0 .708zm6-6l-3 3c-.098.097-.226.145-.354.145s-.256-.05-.354-.147l-2-2c-.047-.046-.083-.102-.11-.163-.13-.324-.13-.324 3.112-3.545.196-.193.512-.193.706 0l2 2c.195.196.195.513 0 .708zm6-6l-3 3c-.098.097-.226.145-.354.145s-.256-.05-.354-.147l-2-2c-.047-.046-.083-.102-.11-.163-.13-.324-.13-.324 3.112-3.545.196-.193.512-.193.706 0l2 2c.195.196.195.513 0 .708z"/><text y="39" font-size="5" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by icon 54</text><text y="44" font-size="5" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text></svg>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $resources['average']['memory'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $resources['average']['memory'] }}%;">
                                        {{ $resources['average']['memory'] }}%
                                    </div>
                                </div>
                            </div>
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