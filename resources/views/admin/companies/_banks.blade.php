    {{-- Top Bar --}}
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3 class="pull-left">&nbsp;&nbsp;</h3>
        <div class="pull-left">
        </div>
      </div>
      <div class="col-md-6 text-right">
       @if (Auth::user()->role()->getResults()->role_name === 'admin')
        <button type="button" class="btn btn-success btn-md"
                data-toggle="modal" data-target="#modal-bank-create">
          <i class="fa fa-plus-circle"></i> New Bank Account
        </button>
       @endif
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        <table id="uploads-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Account No</th>
            <th>Currency</th>
            <th>Bank</th>
            <th data-sortable="false">Actions</th>
          </tr>
          </thead>
          <tbody>

          {{-- The Subfolders --}}
          @foreach ($companies_banks as $company_bank)
            <tr>
              <td>
               {{ $company_bank->account_no }}
              </td>
              <td>{{ $company_bank->currency }}</td>
              <td>{{ $company_bank->bank() }}</td>
              <td>
               @if (Auth::user()->role()->getResults()->role_name === 'admin')
                <button type="button" class="btn btn-xs btn-danger"
                        onclick="delete_account('{{ $company_bank->id }}','{{ $company_bank->account_no }}')">
                  <i class="fa fa-times-circle fa-lg"></i>
                  Delete
                </button>
               @endif
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>

      </div>
    </div>

 

 <div class="modal fade" id="modal-bank-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="/admin/bank" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="company_id" value="{{ $data->id }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
          <h4 class="modal-title">Create New Bank Account</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="account_no" class="col-sm-3 control-label">
              Account No
            </label>
            <div class="col-sm-8">
              <input type="text" id="account_no" name="account_no" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="currency" class="col-sm-3 control-label">
             Currency
            </label>
            <div class="col-sm-8">
              <select class="form-control" name="currency">
                <option value="MUR">MUR</option>
                <option value="USD">US Dollar</option>
                <option value="EURO">Euro</option>
                <option value="POUND">UK Pound</option>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label for="currency" class="col-sm-3 control-label">
             Bank
            </label>
            <div class="col-sm-8">
             <select class="form-control" name="bank_id">
              @foreach ($banks as $bank)
                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
              @endforeach
            </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">
            Create Bank A/C
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-bank-delete">
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
          Are you sure you want to delete the
          <kbd><span id="delete-account-name1">account</span></kbd>
          account?
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/bank/delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="company_id" value="{{{ $data->id  }}}">
          <input type="hidden" name="bank_id" id="bank_id">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Delete Folder
          </button>
        </form>
      </div>
    </div>
  </div>
</div>


