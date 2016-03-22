@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Users <small>&raquo; Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/users/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> New user
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="users-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th class="hidden-sm">Role</th>
            <th class="hidden-md">Companies</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td class="hidden-sm">{{ $user->role()->getResults()->role_name }} <!--  $user->role()->getResults()->role_name --></td>
              <td class="hidden-sm">{{ $user->company() }} <!-- $user->company()->getResults()->name  --></td>
              <td>
                <a href="/admin/users/{{ $user->id }}/edit"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> Edit
                </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop

@section('scripts')
  <script>
    $(function() {
      $("#users-table").DataTable({
      });
    });
  </script>
@stop