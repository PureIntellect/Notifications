<?php namespace PureIntellect\Notifications\Controllers;

use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
  public function all()
  {
    return \Laravel\Spark\Notification::with('creator')->with('user')->orderBy('created_at', 'desc')->get();
  }

  public function get($type)
  {
      switch($type){
        case "users":
          return \App\User::all();
        default:
          return response()->json();
      }
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'body'    =>  'required',
      'user' =>  'required',
      'action_text' => 'required_with:action_url',
      'action_url'  => 'required_with:action_text',
    ]);
    if(is_Array($request->user)){
      foreach ($request->user as $user) {
        $notification = new \Laravel\Spark\Notification;
        $notification->id = Uuid::uuid4();
        $notification->body = $request->input('body');
        $notification->user_id = $user['id'];
        $notification->action_text = $request->input('action_text');
        $notification->action_url = $request->input('action_url');
        $notification->created_by = Auth::user()->id;
        $notification->save();
      }
    }
    else {
      $user = $request->input('user_id');
      $notification = new \Laravel\Spark\Notification;
      $notification->id = \Illuminate\Support\Facades\Hash::make( time() . Auth::user()->id );
      $notification->body = $request->input('body');
      $notification->user_id = $user['id'];
      $notification->action_text = $request->input('action_text');
      $notification->action_url = $request->input('action_url');
      $notification->created_by = Auth::user()->id;
      $notification->save();
    }
    return $notification;
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'body'    =>  'required',
      'user_id' =>  'required',
      'action_text' => 'required_with:action_url',
      'action_url'  => 'required_with:action_text',
    ]);
    $user = $request->input('user_id');
    $notification = \Laravel\Spark\Notification::findOrFail($id);
    $notification->body = $request->input('body');
    $notification->user_id = $user['id'];
    $notification->action_text = $request->input('action_text');
    $notification->action_url = $request->input('action_url');
    $notification->created_by = Auth::user()->id;
    $notification->save();

    return $notification;
  }

  public function destroy($id)
  {
    $notification = \Laravel\Spark\Notification::findOrFail($id);
    $notification->delete();
  }
}
