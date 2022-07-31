<?php

namespace App\Http\Repositories\Core;

use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ContactRepository {

    public function index() {
        return Datatables::of(Contact::all())
            ->addColumn('action', function($entity) {
                return view('src.partials.table.action', [
                    'destoryWarningText' => 'Are you sure, Delete this row.',
                    'destroyRoute' => route('contacts.destroy', ['contacts' => $entity->id]),
                ]);
            })
            ->addColumn('status', function($entity) {
                if($entity->status) {
                    $status = 'Active';
                    $badge = 'bg-success';
                } else {
                    $status = 'In Active';
                    $badge = 'bg-danger';
                }
                return '<span class="badge '. $badge .'">'. $status .'</span>';
            })
            ->rawColumns(['action', 'status'])
            ->editColumn('created_at', function ($entity) {
                return view('src.partials.table.date')->with('date', $entity->created_at);
            })
            ->make(true);
    }

    public function store(Request $request) {
        return Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
    }

    public function destroy($id) {
        return Contact::findorfail($id)->delete();
    }
}
