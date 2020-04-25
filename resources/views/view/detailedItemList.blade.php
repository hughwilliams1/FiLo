<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
          <th> Category</th>
          <th> Found Date</th>
          <th> Colour</th>
          <th> Quick Info</th>
          @if (Auth::user() && Auth::user()->role)
            <th>Manage</th>
          @endif
        </tr>
    </thead>
    <tbody>
      <!-- Loop over the two rows and add the right items -->
      @foreach($items as $item)
        <tr class="clickable">
          <td> {{$item->category}} </td>
          <td> {{$item->founddate}} </td>
          <td> {{$item->colour}} </td>
          @if( $item->category ==  "jewellery")
              <td>Description: {{$item->description}} </td>
          @else
              <td>Found in: {{$item->location}} </td>
          @endif

          @if (Auth::user() && Auth::user()->role)
            <td><a type="button" href= "{{ route('item.destroy', ['id' => $item->id]) }}" class="btn btn-danger" style="color: white;">Delete</a></td>
          @endif
        </tr>

        <!-- The extra information when clicked class -->
        <tr class="more-info">
          @if ( $item->image != NULL )
            <td colspan="2" class="imgCol"><img src="{{ asset($item->image) }}" ></td>
          @else
            <td colspan="2">No image Uploaded</td>
          @endif
          @if( $item->category ==  "jewellery")
            <td colspan="2">Item ID: {{$item->id}}<br />Found Time: {{$item->foundtime}} (24h)<br />Found in: {{$item->location}}</td>
          @else
            <td colspan="2">Item ID: {{$item->id}}<br />Found Time: {{$item->foundtime}} (24h)<br />Description: {{$item->description}}</td>
          @endif
        </tr>
      @endforeach
    </tbody>
</table>
