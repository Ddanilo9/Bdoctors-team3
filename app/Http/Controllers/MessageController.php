<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $messages = Message::where('doctor_id', Auth::user()->doctor['id'])->orderBy('created_at', 'desc')->get();
        $doctor = Doctor::find(Auth::user()->doctor['id']);

        return view('admin.messages.index', compact('messages', 'doctor'));
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
        $message = new Message();
        $data = $request->all();
        $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'message' => 'required',
            'doctor_id' => 'required'
        ]);
        
        $doctor = Doctor::findOrFail($data['doctor_id']);
    
        $message = new Message();
        $message->name = $data['name'];
        $message->email = $data['email'];
        $message->message = $data['message'];
        $message->doctor_id = $data['doctor_id'];

        $message->save();

        return redirect()->route('guest.doctors.show', $doctor->slug);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
