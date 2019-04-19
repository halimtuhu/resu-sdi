<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailingController extends Controller
{
    public function mail()
    {
        try {
            $data = array('name'=>"Joshua", "body" => "This is my first Online Email.");
            Mail::send('emails.mail', $data, function($message) {
              $message->to('halimtuhuprasetyo@gmail.com', 'Halim Tuhu Prasetyo')
                      ->subject('Online Email Test');
              $message->from('noreply.resusdi19990412@gmail.com','From RESU SDI');
            });
            dd('ok');
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
