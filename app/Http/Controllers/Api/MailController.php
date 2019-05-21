<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail;

class MailController extends Controller
{
    public function send() {
        Mail::send(['text' => 'mail'],['name','Umar Raza'], function ($message){
            $message->to('umarraza2200@gmail.com', 'To Umar Raza')->subject('Test Email');
            $message->to('umarraza@stackcru.com', 'Stackcru');
        });
        return "Email Send successfully";
    }
}
