<form action="{{ route('request.insert') }}" method="POST">
  @csrf
  <div class="form-group row">
      <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Item ID: ') }}</label>
      <div class="col-md-6">
          <input id="id" name="id" type="number" placeholder="1" required autofocus min="1">
      </div>
  </div>
  <div class="form-group row">
      <label for="reason" class="col-md-4 col-form-label text-md-right">{{ __('Reason for request: ') }}</label>
      <div class="col-md-6">
          <textarea id="reason" name="reason" rows="8" cols="30" required placeholder="Description of why you made the request."></textarea>
      </div>
  </div>
  <div class="form-group row mb-0">
      <div class="col-md-8 offset-md-4">
          <input type="submit" value="Submit" class="btn btn-primary"></input>
          <input type="reset"  class="btn btn-light"></input>
      </div>
  </div>
</form>
