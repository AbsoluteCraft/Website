@extends('layouts.dashboard', ['page' => 'motd', 'title' => 'MOTD'])

@section('content')

    <main class="dashboard-motds">
        <div class="container">
            <h2 class="page-title">
                Website MOTD
                @if(count($motds) == 0)
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#add-motd"><span class="fa fa-plus"></span></button>
                @endif
            </h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Message </td>
                        <td>Type</td>
                        <td class="active">Created At  <button type="submit" name="date-a"><span class="caret caret-reversed"></span></button></td>
                        <td class="text-center">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motds as $motd)
                        <tr data-id="{{ $motd->id }}" data-message="{{ $motd->message }}" data-type="{{ $motd->type }}" data-icon="{{ $motd->icon }}">
                            <td><span class="fa fa-{{ $motd->icon }}"></span> {{ strlen($motd->message) > 73 ? substr($motd->message, 0, 70) . '...' : $motd->message }}</td>
                            <td><span class="label label-{{ $motd->type }}">{{ $motd->type }}</span></td>
                            <td>{{ \Carbon\Carbon::parse($motd->created_at)->format('M d, Y h:m a') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-edit-motd">Edit</a>
                                    <form method="post" style="display:inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{ $motd->id }}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="add-motd" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add new MOTD</h4>
                    </div>
                    <form method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="message">Message</label>
                                <div class="col-sm-10">
                                    <input type="text" name="message" class="form-control" placeholder="Message for the alert">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="type">Type</label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-control">
                                        <option value="success">Success</option>
                                        <option value="info">Info</option>
                                        <option value="warning">Warning</option>
                                        <option value="danger">Danger</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="icon">Icon</label>
                                <div class="col-sm-6">
                                    <input type="text" name="icon" class="motd-icon-input form-control" placeholder="Optional Font Awesome icon">
                                    <span class="fa"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit-motd" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit MOTD</h4>
                    </div>
                    <form method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" id="input-motd-id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="message">Message</label>
                                <div class="col-sm-10">
                                    <input type="text" name="message" id="input-motd-message" class="form-control" placeholder="Message for the alert">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="type">Type</label>
                                <div class="col-sm-10">
                                    <select name="type" id="input-motd-type" class="form-control">
                                        <option value="success">Success</option>
                                        <option value="info">Info</option>
                                        <option value="warning">Warning</option>
                                        <option value="danger">Danger</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="icon">Icon</label>
                                <div class="col-sm-6">
                                    <input type="text" name="icon" id="input-motd-icon" class="motd-icon-input form-control" placeholder="Optional Font Awesome icon">
                                    <span class="fa"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@stop
