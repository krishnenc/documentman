<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="title" class="col-md-2 control-label">
        Name
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="name" autofocus
               id="name" value="{{ $data->name }}">
      </div>
    </div>
    <div class="form-group">
      <label for="website" class="col-md-2 control-label">
        Website
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="website"
               id="website" value="{{ $data->website }}">
      </div>
    </div>
    <div class="form-group">
      <label for="incorporation_number" class="col-md-2 control-label">
        Incorporation No
      </label>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-8">
            <input type="text" class="form-control" name="incorporation_number"
                   id="incorporation_number"
                   alt="Image thumbnail" value="{{ $data->incorporation_number }}">
          </div>
          <div class="visible-sm space-10"></div>
          <div class="col-md-4 text-right">

          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        Incorporation date
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control datepicker" name="incorporation_date"
           id="incorporation_date" value="{{ $data->incorporation_date }}">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        VAT Registration Date
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control datepicker" name="vat_registration_date"
           id="vat_registration_date" value="{{ $data->vat_registration_date }}">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        Trade license No
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="trade_license_no"
           id="trade_license_no" value="{{ $data->trade_license_no }}">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        Employer Registration No (PAYE)
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="employer_registration_no"
           id="employer_registration_no" value="{{ $data->employer_registration_no }}">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        Municipality License No
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="municipality_license_no"
           id="municipality_license_no" value="{{ $data->municipality_license_no }}">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        Telecom A/C No
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="telecom_no"
           id="telecom_no" value="{{ $data->telecom_no }}">
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="tel_no" class="col-md-3 control-label">
        Tel No
      </label>
      <div class="col-md-8">
        <input class="form-control" name="tel_no" id="tel_no"
               type="text" value="{{ $data->tel_no }}">
      </div>
    </div>
    <div class="form-group">
      <label for="tel_no" class="col-md-3 control-label">
        Fax No
      </label>
      <div class="col-md-8">
        <input class="form-control" name="fax_no" id="fax_no"
               type="text" value="{{ $data->fax_no }}">
      </div>
    </div>
    <div class="form-group">
      <label for="mobile_no" class="col-md-3 control-label">
        Mobile No
      </label>
      <div class="col-md-8">
        <input class="form-control" name="mobile_no" id="mobile_no"
               type="text" value="{{ $data->mobile_no }}">
      </div>
    </div>
    <div class="form-group">
      <label for="registered_office_address" class="col-md-3 control-label">
        Registered Office Address
      </label>
      <div class="col-md-8">
        <textarea class="form-control" id="registered_office_address"
                  name="registered_office_address" rows="3">{{
          $data->registered_office_address
        }}</textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="vat_registration_no" class="col-md-3 control-label">
        VAT Registration no
      </label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="vat_registration_no"
                  name="vat_registration_no" rows="3" value="{{$data->vat_registration_no}}"></input>
      </div>
    </div>
    <div class="form-group">
      <label for="tax_account_no" class="col-md-3 control-label">
        Tax Account No
      </label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="tax_account_no"
                  name="tax_account_no" rows="3" value="{{$data->tax_account_no}}"></input>
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        CWA A/C No
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="cwa_no"
           id="cwa_no" value="{{ $data->cwa_no }}">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-2 control-label">
        CEB A/C No
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="ceb_no"
           id="ceb_no" value="{{ $data->ceb_no }}">
      </div>
    </div>
  </div>
</div>