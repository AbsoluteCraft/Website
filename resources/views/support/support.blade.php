@extends('layouts.master', ['page' => 'support', 'title' => 'Help & Support'])

@section('content')
    <main class="support support-home">
        <div class="container">
            <h1>Support</h1>
            <div class="row">
                <div class="section col-md-3">
                    <div class="panel panel-default">
                        <a href="{{ route('support.knowledge-base') }}">
                            <span class="fa fa-book"></span>
                            <h2>Knowledge Base</h2>
                        </a>
                    </div>
                </div>
                <div class="section col-md-3">
                    <div class="panel panel-default">
                        <a href="{{ route('support.tickets') }}">
                            <span class="fa fa-ticket"></span>
                            <h2>Support Tickets</h2>
                        </a>
                    </div>
                </div>
                <div class="section col-md-3">
                    <div class="panel panel-default">
                        <a href="{{ route('support.status') }}">
                            <span class="fa fa-heartbeat"></span>
                            <h2>Server Status</h2>
                        </a>
                    </div>
                </div>
                <div class="section col-md-3">
                    <div class="panel panel-default">
                        <a href="">
                            <span class="fa fa-comments"></span>
                            <h2>Live Chat</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop