<?php

namespace App\Http\Controllers\martina;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\event;
use App\models\Sponser;
use App\models\EventUsersBookings;
use App\User;
use App\Vendor;
use Illuminate\Support\Facades\Auth;

class eventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = event::inRandomOrder()->limit(10)->get();
        //15 OR 5?
        $newestEvents = event::latest('start_date')->limit(5)->get();
        $allEventsData = event::orderBy('id', 'desc')->get();
        $statistics = $this->Statistics();

        return view('site.index',['events'=>$events,'newestEvents'=>$newestEvents,'allEventsData'=>$allEventsData,'statistics'=>$statistics]);
    }

    public function Statistics(){
        //Users
        $users = count(User::get()->all());
        //Events
        $events = count(event::get()->all());
        //Tickets
        $bookings = count(EventUsersBookings::get()->all());
        // Sponsers
        $sponsers = count(Sponser::get()->all());

        $res = [
            'users'=>$users,
            'events'=>$events,
            'tickets'=>$bookings,
            'sponsers'=>$sponsers
        ];
        return $res;
    }

    public function allEvents()
    {
        $events = event::latest('start_date')->get();
        return view('site.events',['events'=>$events]);
    }

    public function addTicket($eventID, $num)
    {


        $findUser = EventUsersBookings::where('user_id','=',session()->get('user_id'))->where('event_id','=',$eventID)->get();
        if ($findUser->count() > 0) {
            $userBook = EventUsersBookings::find($findUser[0]->id);
            $numTeckit = $userBook->numberOfTicket + $num;
            $userBook->numberOfTicket = $numTeckit;
            $userBook->save();
        }
        else {
            $book = EventUsersBookings::create([

                'user_id' => session()->get('user_id'),
                'event_id' => $eventID,
                'numberOfTicket' => $num,
                ]);
        }
        $eventS = event::find($eventID);
        $availableSeats = $eventS->event_available_seats - $num;
        $eventS->event_available_seats = $availableSeats;
        $eventS->save();

        return redirect('/');
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = event::find($id);
        $owner = Vendor::find($event['vendor_id']);
        $sponsors = event::find($id)->sponsers()->get();

        return view('site.event-details',['event'=>$event, 'owner'=>$owner, 'sponsors'=>$sponsors]);
    }

    public function showTypeOfSign($type)
    {
        $signIn = $type;
        return view('site.sign',['signIn'=>$signIn]);
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
