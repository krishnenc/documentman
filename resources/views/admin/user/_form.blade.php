<div class="form-group">
  <label for="name" class="col-md-3 control-label">
    Name
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="name"
           id="name" value="{{ $data->name }}">
  </div>
</div>

<div class="form-group">
  <label for="password" class="col-md-3 control-label">
    Password
  </label>
  <div class="col-md-8">
    <input type="password" class="form-control" name="password"
           id="password" value="">
  </div>
</div>

<div class="form-group">
  <label for="email" class="col-md-3 control-label">
    Email
  </label>
  <div class="col-md-8">
    <textarea class="form-control" id="email"
              name="email" rows="3">{{
      $data->email
    }}</textarea>
  </div>
</div>

<div class="form-group">
  <label for="page_image" class="col-md-3 control-label">
    Role
  </label>
  <div class="col-md-8">
    <select class="form-control" name="role_id">
      @if ($roles->count())
          @foreach($roles as $role)
              <option value="{{ $role->id }}" 
              {{ $selectedRole == $role->id ? 'selected="selected"' : '' }}>{{ $role->role_name }}</option>    
          @endforeach
      @endif
    </select> 
  </div>
</div>

<div class="form-group">
  <label for="page_image" class="col-md-3 control-label">
    Company
  </label>
  <div class="col-md-8">
     <select class="form-control" id="myselect" name="companies[]" multiple="multiple" size="10">
        @if ($companies->count())
          @foreach($companies as $company)
              <option value="{{ $company->id }}" 
              {{ in_array($company->id,$myCompanies) ? 'selected="selected"' : '' }}>{{ $company->name }}</option>    
          @endforeach
      @endif
      </select>
  </div>
</div>
