<?php

namespace App\Http\Repositories;

use App\Models\Appointment\Appointment;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AppointmentRepository {

    public function get_appointment() {
        return $this->data_table(Appointment::all());
    }

    public function get_today_appointment() {
        return $this->data_table(Appointment::whereDate('datetime', Carbon::today()));
    }

    public function get_appointment_statistics() {
        return [
            'today' => Appointment::whereDate('datetime', Carbon::today())->count(),
            'last_30_days' => Appointment::where('datetime', '>=', Carbon::now()->subDays(30)->toDateTimeString())->count(),
            'total' => Appointment::count(),
        ];
    }

    private function data_table($query) {
        return Datatables::of($query)
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
}
