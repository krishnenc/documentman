@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Companies <small>&raquo; Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
       @if ($role === 'admin')
        <a href="/admin/companies/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> New company
        </a>
       @endif
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="companies-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th class="hidden-sm">name</th>
            <th class="hidden-md">website</th>
            <th class="hidden-md">incorporation number</th>
            <th class="hidden-md">incorporation date</th>
            <th class="hidden-sm">Address</th>
            <th data-sortable="false">Tel No</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($companies as $company)
            <tr>
              <td>
              <a href="/admin/companies/{{ $company->id }}/edit">
                  <b>{{ $company->name }}</b>
              </a>
              </td>
              <td>{{ $company->website }}</td>
              <td class="hidden-sm">{{ $company->incorporation_number }}</td>
              <td class="hidden-md">{{ $company->incorporation_date }}</td>
              <td class="hidden-md">{{ $company->registered_office_address }}</td>
              <td class="hidden-md">{{ $company->tel_no }}</td>
              <td>
                <a href="/admin/companies/{{ $company->id }}/edit"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> 
                    @if ($role === 'admin')
                     Edit
                    @else
                     View
                    @endif
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
      $("#companies-table").DataTable({
      });
    });
  </script>
@stop