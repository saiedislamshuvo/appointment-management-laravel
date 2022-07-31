<?php

namespace App\Http\Controllers\Core;

use App\Http\Repositories\Core\ContactRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository){
        $this->contactRepository = $contactRepository;
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            return $this->contactRepository->index();
        }
        return view('src.pages.contacts.index');
    }

    public function destroy($id) {
        $this->contactRepository->destroy($id);
        return redirect()->back();
    }
}
