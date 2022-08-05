<?php

namespace App\Http\Controllers\Core;

use App\Http\Repositories\AppointmentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository) {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            return $this->appointmentRepository->get_today_appointment();
        }
        $appointment_statistics = $this->appointmentRepository->get_appointment_statistics();
        return view('src.pages.dashboard.index', [
            'appointment_statistics' => $appointment_statistics,
        ]);
    }
}
