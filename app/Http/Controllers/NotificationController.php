<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class NotificationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user_id = auth()->user()->id;

            $user = User::find($user_id);


        return view('mytasks.index', compact('user'));
    }







    //notification

    public function getAllNotification(Request $request){

        try{
        $notif = Notification::query()->with('users')->with('info')->orderBy('id', 'desc')->get();
                        // ->where(['status' => 1])

            //supprimer les notifications datant de plus de 30jours
            $dataNow = now()->subDays(30);
            foreach($notif as $n){
                if ($n->deleted_at < $dataNow){
                    $n->delete();
                }
            }

        return $this->sendResponse($notif,'');
        }catch(\Exception $e){
            return $this->sendError(__('notification.failed'), ['error' => $e->getMessage()], 500);
        }
    }

    public function getAllStatusWithPaginate(Request $request){
        try
        {
        $notif = Notification::query()->orderBy('id', 'asc')->get()->paginate(3);
            return $this->sendResponse($notif, '');
        }catch(\Exception $e){
            return $this->sendError(__('notification.failed'), ['error' => $e->getMessage()], 500);
        }
    }


    public function updateSennNotif(Request $request)
    {
      try {
        $id = $request->id;
        $notif = Notification::where(['id' => $id]);
        if($notif){
          $notif->update(['seen' => $request->seen]);
          return $this->sendResponse(null,"Success");
        }
      } catch (\Throwable $e) {
        return $this->sendError(__('notification.failed'), ['error' => $e->getMessage()], 500);
      }
    }


    // public function deleteAvis(Request $request){

    //     try
    //     {
    //         if (Auth::guard('api')->check()) {

    //             $id= $request->id;

    //             Avis::where(['id' =>$id])->delete();


    //             return $this->sendResponse(null, 'Success');
    //         }
    //         return $this->sendResponse(null, '');
    //     }catch(\Exception $e){
    //         return $this->sendError(__('notification.failed'), ['error' => $e->getMessage()], 500);
    //     }

    // }


    public function CountUnseen(){
        $count = Notification::where('seen',0)->count();
        return $this->sendResponse($count, '');
    }


    public function updateSeenNotif(Request $request)
    {
      try {

        $id = $request->id;
        $notif = Notification::where(['id' => $id]);
        if($notif){
          $notif->update(['seen' => $request->seen]);

          return $this->sendResponse(null,"Success");
        }
      } catch (\Throwable $e) {
        return $this->sendError(__('notification.failed'), ['error' => $e->getMessage()], 500);
      }
    }

    public function allSeen()
    {
        $user_id = auth()->user()->id;

        $notif = Notification::where('user_id', $user_id)->where(['seen' => 0])->update(['seen' =>1]);
        return back()->withInput();

    }

}
