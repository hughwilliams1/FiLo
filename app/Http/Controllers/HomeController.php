<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Requests;

use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::all();
        $requests = [];
        if (Gate::denies('getRequests')) {
          return view('home', compact(['items','requests']));
        } else {
          $requests = Requests::all();
          return view('home', compact(['items','requests']));
        }
    }

    public function deleteRequest() {

    }

    public function getRequests() {
      $requestQuery = Requests::all();
      if (Gate::denies('getRequests')) {

      } else {
        return array('requests'=>$requestQuery);
      }
    }
}
