<form action="{{ route('item.insert') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
      <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location found: ') }}</label>
      <div class="col-md-6">
          <input id="location" name="location" type="text" placeholder="5 The Parkway Rd" required autofocus>
      </div>
  </div>

  <div class="form-group row">
      <label for="founddate" class="col-md-4 col-form-label text-md-right">{{ __('Date found: ') }}</label>
      <div class="col-md-6">
        <input id="founddate" name="founddate" type="date" min='2000-01-01' required>
      </div>
  </div>

  <div class="form-group row">
      <label for="foundtime" class="col-md-4 col-form-label text-md-right">{{ __('Time found: ') }}</label>
      <div class="col-md-6">
        <input id="foundtime" name="foundtime" type="time" required>
      </div>
  </div>

  <div class="form-group row">
      <label for="colour" class="col-md-4 col-form-label text-md-right">{{ __('Colour: ') }}</label>
      <div class="col-md-6">
        <input id="colour" name="colour" type="text" placeholder="Red" required>
      </div>
  </div>

  <div class="form-group row">
      <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category: ') }}</label>
      <div class="col-md-6">
          <select id="category" name="category" class="form-control" required>
            <option value="pet">Pet</option>
            <option value="phone">Phone</option>
            <option value="jewellery">Jewellery</option>
          </select>
      </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description: ') }}</label>
        <div class="col-md-6">
            <textarea id="description" name="description" rows="8" cols="30" required placeholder="Description of the item."></textarea>
        </div>
    </div>

    <div class="form-group row">
      <label for="image" class="col-md-4 col-form-label text-md-right"> {{ __('Image: ') }}</label>
        <div class="col-md-6">
          <input id="image" type="file" class="form-control" name="image">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <input type="submit" value="Submit" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-light"></input>
        </div>
    </div>

  </div>
</form>
