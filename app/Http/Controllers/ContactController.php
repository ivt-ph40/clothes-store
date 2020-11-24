<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function showContactForm()
    {
        return view('user.contact-us');    
    }
    public function sendMail(Request $request)
    {
        // dd($request);
        $toMail = $request->email;
        $fromEmail = 'admin@gmail.com';
        $data = [
            'content' => $request->content,
            'username' => 'Nguyen Van A',
        ];
        \Mail::send('mails.contact-us', $data, function($message) use ($toMail, $fromEmail, $data){
            $message->to($toMail, $data['username']);
            $message->from($fromEmail, 'Admin');
            $message->subject('Contact Mail');
        });
        return 'success!';
    }
}
