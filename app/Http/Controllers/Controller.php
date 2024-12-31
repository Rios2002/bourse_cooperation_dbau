<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // function testAPI()
    // {

    //     $response =
    //         Http::withoutVerifying()
    //         // ->accept('application/json')
    //         // ->withHeaders(['Content-type' => 'application/json'])
    //         ->post("https://sitatunga.uac.bj/infoEtudiant", [
    //             "identifiant" => "dbauuacbenin",
    //             "password" =>  "All0c3Tu&",
    //             "anneeAcademique" => "2024-2025",
    //             "matricule" => "10003125"
    //         ]);


    //     dd(json_decode($response->body()));
    // }
}
