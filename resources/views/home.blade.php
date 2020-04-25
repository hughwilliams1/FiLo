<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/homeScreen.js') }}"></script>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- If any errors on the return of adding display here -->
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>
                    {{ $error }}
                  </li>
                  @endforeach
                </ul>
              </div>
            @endif

            <!-- If the requests succeeds then display this dismissible popup -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  {{ session('status') }}
                </div>
            @endif

            <div class="card">
              <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <!-- Create the buttons for the tabs. They call the .js method to open the tab when clicked -->
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'items')" id="default">Items</button>
                        <button class="tablinks" onclick="openTab(event, 'addItem')">Add an item</button>
                        <button class="tablinks" onclick="openTab(event, 'requests')">Request an item</button>
                        @if (Auth::user() && Auth::user()->role)
                          <button class="tablinks" onclick="openTab(event, 'manageRequests')">Manage requests</button>
                        @endif
                    </div>


                    <!-- Items button content -->
                    <div id="items" class="tabcontent">
                      @include('view.detailedItemList', $items)
                    </div>


                    <!-- Add an item button content -->
                    <div id="addItem" class="tabcontent">
                      @include('view.addItem')
                    </div>


                    <!-- Requests button content -->
                    <div id="requests" class="tabcontent">
                      @include('view.requestItem')
                    </div>


                    <!-- Requests button content -->
                    <div id="manageRequests" class="tabcontent">
                      @include('view.requestList', $requests)
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("default").click();
  // Only allow dates before today
  founddate.max = new Date().toISOString().split("T")[0];
  // // Toggle tool tips
  // $(function () {
  //   $('[data-toggle="tooltip"]').tooltip()
  // })
</script>

@endsection
