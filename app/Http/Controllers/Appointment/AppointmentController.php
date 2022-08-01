<?php

namespace App\Http\Controllers\Appointment;

use App\Models\Appointment\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Appointment::get())
                ->addColumn('action', function($entity) {
                    return view('src.partials.table.action', [
                        'checkedRoute' => route('appointments.visited', [
                            'appointment' => $entity->id, 
                            'status' => true,
                        ]),
                        'editRoute' => route('appointments.edit', ['appointment' => $entity->id]),
                        'destoryWarningText' => 'Are you sure, Delete this appointments?',
                        'destroyRoute' => route('appointments.destroy', ['appointment' => $entity->id]),
                    ]);
                })
                ->addColumn('visit', function ($entity) {
                    return view('src.partials.table.date')->with('date', $entity->datetime);
                })
                ->addColumn('status', function($entity) {
                    if($entity->status) {
                        $status = 'Visited';
                        $badge = 'bg-success';
                    } else {
                        $status = 'Not Visited';
                        $badge = 'bg-danger';
                    }
                    return '<span class="badge '. $badge .'">'. $status .'</span>';
                })
                ->rawColumns(['action', 'visit', 'status'])
                ->editColumn('created_at', function ($entity) {
                    return view('src.partials.table.date')->with('date', $entity->created_at);
                })
                ->make(true);
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
            return redirect()->back()->with('message-error', 'Something went wrong!');
        }
    }
}
