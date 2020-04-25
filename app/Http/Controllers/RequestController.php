<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Gate;
use DB;

use Validator;
use App\User;
use App\Item;
use App\Requests;

class RequestController extends Controller
{

    public function approve(int $id) {
      if (Gate::denies('approveRequest')) {
        return redirect()->back()->with(['error' => "You don't have permissions to perfom this action.", 403]);
      } else {
        DB::table('requests')->where('id',$id)->update(['approved' => 1]);
        return redirect()->back()->with(['status' => 'Request Approved']);
      }
    }

    public function refuse(int $id) {
      if (Gate::denies('approveRequest')) {
        return redirect()->back()->with(['error' => "You don't have permissions to perfom this action.", 403]);
      } else {
        DB::table('requests')->where('id',$id)->update(['approved' => 0]);
        return redirect()->back()->with(['status' => 'Request Denied']);
      }
    }

    public function insert(Request $request) {
      //Get the current user
      $user = User::findOrFail(auth()->user()->id);

      // Validation ontop of js fourm validation. Also checks
      // if the given item_id exists in the item table
      $validator = $request->validate([
        'id' => 'required|numeric|exists:Items,id',
        'reason' => 'required|max:1000'
      ]);

      $newRequest = new Requests([
        'user_id' => $user->id,
        'item_id' => $request->get('id'),
        'reason' => $request->get('reason'),
      ]);
      $newRequest->save();

      return redirect()->back()->with(['status' => 'Request submitted!']);

    }

}
