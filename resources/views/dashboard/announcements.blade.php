@extends('layouts.dashboard', ['page' => 'announcements', 'title' => 'Announcements'])

@section('content')
    <main class="dashboard-announcements">
        <div class="container">
            <h2 class="page-title">
                Server Announcements
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#add-announcement"><span class="fa fa-plus"></span></button>
            </h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Message </td>
                        <td>Added by</td>
                        <td class="active">Created At  <button type="submit" name="date-a"><span class="caret caret-reversed"></span></button></td>
                        <td class="text-center">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($announcements as $announcement)
                        <tr>
                            <td>{{ strlen($announcement->message) > 73 ? substr($announcement->message, 0, 70) . '...' : $announcement->message }}</td>
                            <td>{{ $announcement->user->username }}</td>
                            <td>{{ \Carbon\Carbon::parse($announcement->created_at)->format('M d, Y h:m a') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-edit-announcement">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="edit-announcement" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add new MOTD</h4>
                    </div>
                    <form action="" method="post" class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="message">Message</label>
                                <div class="col-sm-10">
                                    <input type="text" name="message" class="form-control" placeholder="Message">
                                    <p class="help-block">You can use <a href="https://wiki.ess3.net/mc/" target="_blank">chat color codes</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-announcement" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add new Announcement</h4>
                    </div>
                    <form action="" method="post" class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="message">Message</label>
                                <div class="col-sm-10">
                                    <input type="text" name="message" class="form-control" placeholder="Message">
                                    <p class="help-block">You can use <a href="https://wiki.ess3.net/mc/" target="_blank">chat color codes</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@stop
