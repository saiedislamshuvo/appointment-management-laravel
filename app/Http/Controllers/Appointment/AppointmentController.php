<?php

namespace App\Http\Controllers\Appointment;

use App\Models\Appointment\Appointment;
use App\Http\Repositories\AppointmentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository) {
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->appointmentRepository->get_appointment();
        }
        return view('src.pages.appointment.index');
    }

    public function visited($id, $status) {
        try {
            $appointment = Appointment::findorfail($id);
            $appointment->status = $status ?? false;
            $appointment->update();
            return redirect()->route('appointments.index')->with('message', 'Appointment Updated Successfully!');
        } catch(\Exception $e) {
            return redirect()->back()->with('message-error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('src.pages.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Appointment::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'datetime' => $request->datetime,
                'serial' => $request->serial,
                'note' => $request->note,
                'status' => $request->status == 'on' ? true : false,
            ]);
            return redirect()->route('appointments.index')->with('message', 'Appointment Created Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', 'Something went wrong!');
        }
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
        $appointment = Appointment::findorfail($id);
        return view('src.pages.appointment.edit', [
            'appointment' => $appointment,
        ]);
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
        try {
            Appointment::findorfail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'datetime' => $request->datetime,
                'serial' => $request->serial,
                'note' => $request->note,
                'status' => $request->status == 'on' ? true : false,
            ]);
            return redirect()->route('appointments.index')->with('message', 'Appointment Updated Successfully!');
        } catch(\Exception $e) {
            return redirect()->back()->with('message-error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Appointment::findorfail($id)->delete();
            return redirect()->route('appointments.index')->with('message', 'Appointment Deleted Successfully!');
        } catch(\Exception $e) {
            return redirect()->route('appointments.index')->with('message-error', 'Something went wrong!');
        }
    }
}
