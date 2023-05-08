<?php

namespace App\Http\Controllers;

use App\Mail\MensajeRecibido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MensajesController extends Controller
{
    public function store()
    {
        // dd(request()->all());
        $message = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ],[
            'name.required' => __('Necesito tu nombre')
        ]);

        Mail::to('wgcalisaya@gmail.com')->queue(new MensajeRecibido($message));

        // return new MensajeRecibido($message);
        return 'Mensaje enviado';
    }
}
