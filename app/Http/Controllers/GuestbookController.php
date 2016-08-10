<?php
 
namespace App\Http\Controllers;
 
use App\Guestbook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
 
class GuestbookController extends Controller{
 
 
    public function index(){
 
        $guestbooks  = Guestbook::all();
        //$guestbooks  = Guestbook::orderBy('id','desc')->get();
 
        return response()->json($guestbooks);
 
    }
 
    public function getGuestbook($id){
 
        $guestbook  = Guestbook::find($id);
 
        return response()->json($guestbook);
    }
 
    public function saveGuestbook(Request $request){
 
        $guestbook = Guestbook::create($request->all());
 
        return response()->json($guestbook);
 
    }
 
    public function deleteGuestbook($id){
        $guestbook  = Guestbook::find($id);
 
        $guestbook->delete();
 
        return response()->json('success');
    }
 
    public function updateGuestbook(Request $request,$id){
        $guestbook  = Guestbook::find($id);
 
        $guestbook->title = $request->input('title');
        $guestbook->name = $request->input('name');
        $guestbook->message = $request->input('message');
 
        $guestbook->save();
 
        return response()->json($guestbook);
    }
 
}