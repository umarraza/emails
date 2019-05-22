<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Emails;
use App\Models\Messages;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmailsController extends Controller
{

    public function create(Request $request) 
    {

        $rules = [
            'email'   =>  'required|unique:emails',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($rules);
        } else {
            
                $email = Emails::create([
    
                    'email'   =>  $request->email,
        
                ]);
                
                if ($email->save()) {
        
                    return redirect('show-emails');
        
                }
        }
    }

    public function show()
    {
        $emails = Emails::all();
        return view('show-emails', compact('emails')); 
    }

    public function store(Request $request) 
    {
        $rules = [
            'body'   =>  'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($rules);
        } else {
            
            $email = Messages::create([
    
                'body'   =>  $request->body,
    
            ]);
            
            if ($email->save()) {
    
                return redirect('show-emails');
    
            }
        }
    }


    public function sendMails(Request $request) {

        $rules = [
            'body'   =>  'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($rules);
        } else {
            
            $emailMessage = Messages::create([
    
                'body'   =>  $request->body,
    
            ]);
            
            $emailMessage->save();
        }
        
        $emails = Emails::all();

        $message = $request->body;
        $data = json_encode($message);

        if (!empty($request->body)){
            foreach ($emails as $user) {

                $username = $user->email;
                $tousername = $username;
    
                \Mail::send('mail',["data"=>$data], function ($message) use ($tousername) {
                    $message->from('umarraza2200@gmail.com', 'password');
                    $message->to($tousername)->subject('Test Mails');
               });
    
            }
        }else{

            return "Warning! Please Type your message.";
        }

        return "Emails Send successfully!";
    }
}

