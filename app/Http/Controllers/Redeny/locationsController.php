<?php

namespace App\Http\Controllers\Redeny;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\event;
use App\models\EventUsersBookings;

class locationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //WHY4!
        $events = event::get();
        return view('site.search',compact('events'));
    }

    public function userDashboard(){
        if(session()->get('user_id')){
            $userBookings = EventUsersBookings::where('user_id',session()->get('user_id'))->get();

            foreach($userBookings as $userbook){
                $events [] = event::find($userbook->event_id);
            }
            if(!$events){
                $events=[];
            }
            return view('site.userDashboard',compact('events','userBookings'));
        }else{
            return view('auth.login');
        }

    }
    // public function updateUserProfile(){
    //     if(session()->get('user_id')) {
    //         $userId =  session()->get('user_id');
    //         $data = User::find($userId)->first();

    //             return view('site.profile', compact('data'));

    //     }else {
    //         return view('auth.login');
    //     }
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city= $request->input('city');
        $owner = $request->input('owner');
        $event_start_date = $request->input('event_start_date');
        if($event_start_date){
            $events =  event::where('address',$city)->orWhere('vendor_id',$owner)->orWhere('start_date','like','%'.$event_start_date .'%')->get();
        }else{
            $events =  event::where('address',$city)->orWhere('vendor_id',$owner)->get();
        }
        //return $event_start_date;

        return view('site.events',compact('events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
