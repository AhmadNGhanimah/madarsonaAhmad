<?php

namespace App\Http\Controllers\resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    public function index()
    {
        //     $userId = Auth::id();
        //     $teacher_id = Teacher::where('id', )->first()->id;
        return view('pages.apps.resume.template1');
    }
}
