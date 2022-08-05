@extends('src.layouts.app')

@section('title', 'Appointments')

@section('contents')
    @include('src.layouts.partials.breadcrumb', [
        'title' => 'Appointments',
        'items' => [['title' => 'Dashboard', 'route' => route('dashboard')]],
    ])
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                        <i class="dripicons-add"></i> Create Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('src.pages.appointment.partials.table', [
        'appointmentRoute' => route('appointments.index'),
    ])
@endsection
