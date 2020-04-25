<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
          <th> Request</th>
          <th> User</th>
          <th> Item</th>
          <th> Reason</th>
          <th> Approved</th>
          <th colspan="2" style="text-align: center"> Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach($requests as $request)
        <tr>
          <td> {{$request->id}} </td>
          <td> {{$request->user_id}} </td>
          <td> {{$request->item_id}} </td>
          <td> {{$request->reason}} </td>
          @if($request->approved)
              <td>Yes</td>
          @else
              <td>No</td>
          @endif
          <td>
            <a type="Button" class="btn btn-success" href= "{{ route('request.approve', ['id' => $request->id]) }}" style="color: white;">Approve</a>
          </td>
          <td>
            <a type="Button" class="btn btn-danger" href= "{{ route('request.refuse', ['id' => $request->id]) }}" style="color: white;">Refuse</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
