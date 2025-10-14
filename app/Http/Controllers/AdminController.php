<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Gallary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Contact;
use App\Notifications\SendEmailNofication;

use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    //admin controller

    public function index()
    {
        $data = Room::all();
        $gallery = Gallary::all();
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'user') {
                return view('home.index', compact('data', 'gallery'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $data = Room::all();
        $gallery = Gallary::all();
        return view('home.index', compact('data', 'gallery'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }
    public function add_room(Request $request)
    {
        $data = new Room();
        $data->room_title = $request->title;
        $image = $request->image;
        $data->description = $request->room_description;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $data->price = $request->price;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }

    public function display_room()
    {
        $data = Room::all();
        return view('admin.display_room', compact('data'));
    }

    public function delete_room($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update_room($id)
    {
        $data = Room::find($id);
        return view('admin.update_room', compact('data'));
    }

    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back();
    }

    public function bookings()
    {
        $data = Booking::all();
        return view('admin.booking', compact('data'));
    }

    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function approve_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = "Approve";
        $booking->save();
        return redirect()->back();
    }

    public function delete_room_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = "Rejected";
        $booking->save();
        return redirect()->back();
    }

    public function gallary()
    {
        $gallery = Gallary::all();
        return view('admin.gallary', compact('gallery'));
    }

    public function upload_gallary(Request $request)
    {
        $data = new Gallary();

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('gallary', $imagename);

        $data->image = $imagename;

        $data->save();

        return redirect()->back();
    }

    public function delete_gallery($id)
    {
        $gallary_image = Gallary::find($id);
        $gallary_image->delete();
        return redirect()->back();
    }

    public function messages()
    {
        $data =  Contact::all();
        return view('admin.messages', compact('data'));
    }

    public function delete_contact($id)
    {
        $data = Contact::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function send_mail($id)
    {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }


    public function mail(Request $request, $id)
    {
        $data = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline,
        ];

        Notification::send($data, new SendEmailNofication($details));

        return redirect()->back();
    }
}
