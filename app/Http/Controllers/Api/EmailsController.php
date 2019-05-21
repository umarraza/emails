<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Emails;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmailsController extends Controller
{

    public function show()
    {
        $emails = Emails::all();
        return view('createEmails')->with('email',$emails); 

        // return view('createEmails', compact('emails'));
    }

    public function create(Request $request)  // Create New Series
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
    
                return redirect()->back();
    
            }
        }
    }

    
}
