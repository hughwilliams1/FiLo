@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Items - Simple view</div>
                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                  @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th> Category</th>
                              <th> Foundtime</th>
                              <th> Colour</th>
                              <th> Extra Info</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($items as $item)
                            <tr>
                              <td> {{$item->category}} </td>
                              <td> {{$item->foundtime}} </td>
                              <td> {{$item->colour}} </td>
                              @if( $item->category ==  "pet")
                                  <td>Found in: {{$item->location}} </td>
                              @elseif ( $item->category == "phone")
                                  <td>Found in: {{$item->location}} </td>
                              @else
                                  <td>Description: {{$item->description}} </td>
                              @endif
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
