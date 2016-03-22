    {{-- Top Bar --}}
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3 class="pull-left">&nbsp;&nbsp;</h3>
        <div class="pull-left">
          <ul class="breadcrumb">
            @foreach ($folder_data->breadcrumbs as $path => $disp)
              <li><a href="/admin/companies/{{ $data->id }}/edit?folder={{ $path }}&amp;tab=files">{{ $disp }}</a></li>
            @endforeach
            <li class="active">{{ $folder_data->folderName }}</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 text-right">
       @if (Auth::user()->role()->getResults()->role_name === 'admin')
        <button type="button" class="btn btn-success btn-md"
                data-toggle="modal" data-target="#modal-folder-create">
          <i class="fa fa-plus-circle"></i> New Folder
        </button>
        <button type="button" class="btn btn-primary btn-md"
                data-toggle="modal" data-target="#modal-file-upload">
          <i class="fa fa-upload"></i> Upload File
        </button>
       @endif
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        <table id="uploads-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Date</th>
            <th>Size</th>
            <th data-sortable="false">Actions</th>
          </tr>
          </thead>
          <tbody>

          {{-- The Subfolders --}}
          @foreach ($folder_data->subfolders as $path => $name)
            <tr>
              <td>
                <a href="/admin/companies/{{ $data->id }}/edit?folder={{ $path }}&amp;tab=files">
                  <i class="fa fa-folder fa-lg fa-fw"></i>
                  {{ $name }}
                </a>
              </td>
              <td>Folder</td>
              <td>-</td>
              <td>-</td>
              <td>
               @if (Auth::user()->role()->getResults()->role_name === 'admin')
                <button type="button" class="btn btn-xs btn-danger"
                        onclick="delete_folder('{{ $name }}')">
                  <i class="fa fa-times-circle fa-lg"></i>
                  Delete
                </button>
               @endif
              </td>
            </tr>
          @endforeach

          {{-- The Files --}}
          @foreach ($folder_data->files as $file)
            <tr>
              <td>
                <a href="{{ $file['webPath'] }}">
                  @if (is_image($file['mimeType']))
                    <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                  @else
                    <i class="fa fa-file-o fa-lg fa-fw"></i>
                  @endif
                  {{ $file['name'] }}
                </a>
              </td>
              <td>{{ $file['mimeType'] or 'Unknown' }}</td>
              <td>{{ $file['modified']->format('j-M-y g:ia') }}</td>
              <td>{{ human_filesize($file['size']) }}</td>
              <td>
               @if (Auth::user()->role()->getResults()->role_name === 'admin')
                <button type="button" class="btn btn-xs btn-danger"
                        onclick="delete_file('{{ $file['name'] }}')">
                  <i class="fa fa-times-circle fa-lg"></i>
                  Delete
                </button>
               @endif
                @if (is_image($file['mimeType']))
                  <button type="button" class="btn btn-xs btn-success"
                          onclick="preview_image('{{ $file['webPath'] }}')">
                    <i class="fa fa-eye fa-lg"></i>
                    Preview
                  </button>
                @endif
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>

      </div>
    </div>

  @include('admin.companies._modals')


@section('scripts')
  <script>

     $(function() {
      $('.datepicker').pickadate();
      $('#myTabs a[href="#{{ $tab }}"]').tab('show');
     });

    // Confirm file delete
    function delete_file(name) {
      $("#delete-file-name1").html(name);
      $("#delete-file-name2").val(name);
      $("#modal-file-delete").modal("show");
    }

    // Confirm folder delete
    function delete_folder(name) {
      $("#delete-folder-name1").html(name);
      $("#delete-folder-name2").val(name);
      $("#modal-folder-delete").modal("show");
    }

    // Confirm folder delete
    function delete_account(id,name) {
      $("#delete-account-name1").html(name);
      $("#bank_id").val(id);
      $("#modal-bank-delete").modal("show");
    }

    // Preview image
    function preview_image(path) {
      $("#preview-image").attr("src", path);
      $("#modal-image-view").modal("show");
    }

    // Startup code
    $(function() {
      $("#uploads-table").DataTable({"bSort": false});
    });
  </script>
@stop