@extends('layouts.dashboard', ['page' => 'motd', 'title' => 'MOTD'])

@section('content')

    <main class="dashboard-motds">
        <div class="container">
            <h2 class="page-title">
                Website MOTD
                @if($motd)
                    <div class="pull-right">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit-motd">Edit</button>
                        <form method="post" style="display:inline">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{{ $motd->id }}">
                            <button type="submit" class="btn btn-danger">Disable</button>
                        </form>
                    </div>
                @else
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#add-motd"><span class="fa fa-plus"></span></button>
                @endif
            </h2>
            @if($motd)
                <div class="motd motd-{{ $motd->type }}">
                    <div class="container">
                        @if($motd->icon)
                            <span class="fa fa-{{ $motd->icon }}"></span>
                        @endif
                        {!! $motd->message !!}
                    </div>
                </div>
            @endif
        </div>
        <div class="modal fade" id="add-motd" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add new MOTD</h4>
                    </div>
                    <form method="post" class="form-horizontal">
                        {{ csrf_field() }}
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
        @if($motd)
            <div class="modal fade" id="edit-motd" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit MOTD</h4>
                        </div>
                        <form method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $motd->id }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="message">Message</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="message" id="input-motd-message" class="form-control" placeholder="Message for the alert" value="{{ $motd->message }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="type">Type</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="input-motd-type" class="form-control">
                                            <option value="success"{!! $motd->type == 'success' ? ' selected="selected"' : '' !!}>Success</option>
                                            <option value="info"{!! $motd->type == 'info' ? ' selected="selected"' : '' !!}>Info</option>
                                            <option value="warning"{!! $motd->type == 'warning' ? ' selected="selected"' : '' !!}>Warning</option>
                                            <option value="danger"{!! $motd->type == 'danger' ? ' selected="selected"' : '' !!}>Danger</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="icon">Icon</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="icon" id="input-motd-icon" class="motd-icon-input form-control" placeholder="Optional Font Awesome icon" value="{{ $motd->icon }}">
                                        <span class="fa fa-{{ $motd->icon }}"></span>
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
        @endif
    </main>
@stop
