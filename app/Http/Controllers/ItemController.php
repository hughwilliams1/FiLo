<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Item;
use App\Traits\UploadTrait;

class ItemController extends Controller
{
    //Make the item class *inherit* the trait to easily uplaod files
    use UploadTrait;

    public function show($id) {
      $item = Item::find($id);
      return view('items.show', array('item' => $item));
    }

    public function list() {
      return view('items.list', array('items'=>Item::all()));
    }

    public function insert(Request $request) {
      //Get the current user
      $user = User::findOrFail(auth()->user()->id);
      // Validation ontop of js fourm validation
      $validator = $request->validate([
        'category' => 'required|max:255',
        'foundtime' => 'required|date_format:H:i',
        'founddate' => 'required|date|before:tomorrow',
        'location' => 'required|max:255',
        'colour' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'description' => 'required|max:1000'
      ]);

      //Handle the image object
      if ($request->file('image') != NULL) {
        $image = $request->file('image');

        //Save the image based on the user_id and time submitted
        $name = $user->id.'_'.time();
        //Set the folder dest
        $folder = '/uploads/images/';
        //Set the file path with the folder + name + extension of the file
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();

        //Use the trait to upload the image with the created params
        $this->uploadOne($image, $folder, 'public', $name);

      } else {
        $filePath = NULL;
      }
      //Add the items to the DB
      $item = new Item([
        'category' => $request->get('category'),
        'foundtime' => $request->get('foundtime'),
        'founddate' => $request->get('founddate'),
        'user_id' => $user->id,
        'location' => $request->get('location'),
        'colour' => $request->get('colour'),
        'image' => $filePath,
        'description' => $request->get('description')
      ]);
      $item->save();

      return redirect()->back()->with(['status' => 'Added item to the databse!']);
    }

    public function destroy($id) {
      $item = Item::find($id);
      $item->delete();

      return redirect()->back()->with(['status' => 'Added item to the databse!']);
    }
}
