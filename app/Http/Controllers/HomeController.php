<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Contact;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);

        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $id)
    {

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'date|after:start_date'
        ]);


        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $isbooked = Booking::where('room_id', $id)->where('start_date', '<=', $end_date)->where('end_date', '>=', $start_date)->exists();

        if ($isbooked) {

            return redirect()->back()->with('message', 'Room Booked Already try with other date');
        } else {

            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;

            $data->save();

            return redirect()->back()->with('message', 'Room Booked Successfully');
        }
    }

    public function contact(Request $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->message=$request->message;
        $contact->email = $request->email;

        $contact->save();

        return redirect()->back()->with('message', 'Message sent successfully');

    }
}
