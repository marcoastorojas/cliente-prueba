<?php

namespace App\Http\Controllers\Notificaciones;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            ['hora' => 'saludos']
        );
    }

    public function todoloscliente()
    {
        //
    }

    public function poremail(Request $request)
    {
        $email = $request->email;
        if (!$email) {
            return response()->json(["ok" => "false", "msg" => "falta el campo 'email'"], 400);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(["ok" => "false", "msg" => "no existe un usuario para el email enviado"], 400);
        }
        $devicetoken = $user->device_token;
        $serverkey = env("SERVER_KEY");

        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = [
            'Authorization: Bearer '.$serverkey,
            'Content-Type: application/json',
        ];
        $data = [
            'registration_ids' => [$devicetoken],
            'notification' => [
                'body' => 'Body of Your Notification 4',
                'title' => 'titulo 5',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVHdEO4PzJuktXIVC8E9kDchwYQ71K9W_Pig&usqp=CAU',
                'sound' => 'default'
            ],
            'data' => [
                'body' => 'Body of Your Notification in Data',
                'title' => 'Title of Your Notification in Title',
                'key_1' => 'Value for key_1',
                'key_2' => 'Value for key_2'
            ]
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_exec($ch);
        curl_close($ch);

        return response()->json(["currenttoken" => $devicetoken]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
