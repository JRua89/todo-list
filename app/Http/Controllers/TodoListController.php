<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index() {
     return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }

    
    public function markComplete($id) {

        $listitem = ListItem::find($id);
        $listitem->is_complete = 1;
        $listitem->save();

        return redirect('/');
    }

    public function saveItem(Request $request){

        
        $newlistitem = new ListItem;
        
        $newlistitem->name = $request->listItem;
        $newlistitem->is_complete = 0;
        $newlistitem->save();

        return redirect('/');
    }
}
