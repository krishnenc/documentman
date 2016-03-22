@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3> 
           <a href="/admin/companies">
                  Companies
           </a> <small>&raquo; {{ $state }} Company {{ $data->name}}</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Company {{ $state }} Form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')
            @include('admin.partials.success')

              <div class="row">
                <div class="col-md-6">
                  <p class="form-control-static"></p>
                   <ul id="myTabs" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Info</a></li>
                    <li role="presentation"><a href="#banks" aria-controls="banks" role="tab" data-toggle="tab">Bank Accounts</a></li>
                    <li role="presentation"><a href="#files" aria-controls="files" role="tab" data-toggle="tab">Documents</a></li>
                  </ul>
                </div>
              </div>
              <BR>
              <!-- Nav tabs -->
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="info">
                    <form class="form-horizontal" role="form" method="POST"
                    action="/admin/companies/{{ $data->id }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="id" value="{{ $data->id }}">
                         @include('admin.companies._form')
                          @if (Auth::user()->role()->getResults()->role_name === 'admin')
                           <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                              <button type="submit" class="btn btn-primary btn-md">
                                <i class="fa fa-save"></i>
                                &nbsp; Save Changes
                              </button>
                              <button type="button" class="btn btn-danger btn-md"
                                      data-toggle="modal" data-target="#modal-delete">
                                <i class="fa fa-times-circle"></i>
                                Delete
                              </button>
                            </div>
                          </div>
                          @endif
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="banks">
                   @include('admin.companies._banks')
                </div>
                <div role="tabpanel" class="tab-pane" id="files">
                  @include('admin.companies._files')
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Confirm Delete --}}
  <div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
          <h4 class="modal-title">Please Confirm</h4>
        </div>
        <div class="modal-body">
          <p class="lead">
            <i class="fa fa-question-circle fa-lg"></i> &nbsp;
            Are you sure you want to delete this company?
          </p>
        </div>
        <div class="modal-footer">
          <form method="POST" action="/admin/companies/{{ $data->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">
              <i class="fa fa-times-circle"></i> Yes
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

@stop
