<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\SubmissionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function bulkMailSend(){
        $userData = User::get()->take(2)->toArray();
        foreach ($userData as $key => $value) {
            Mail::to($value->email)->send(new SubmissionMail($value));
        }
    }
}
