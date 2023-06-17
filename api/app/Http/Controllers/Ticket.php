<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\isAdmin;
use Illuminate\Support\Facades\Http;

class Ticket extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (isAdmin::isAdmin()) {
            try {
                $response = Http::acceptJson()->withHeaders([
                    'Authorization' => 'ApiKey-v1 e4657b8826e48c9b416dae0f212c6209154c9658a34d038d98969e5b7bd43288',
                ])->get('https://api.loquiz.com/v3/tickets?sort=-updated.at');
                // dd($response->body());
                $tickets = $response->json();
                 $tickets = $tickets['items'];
                //  foreach($tickets as $ticket)
                //  {
                //     dd($ticket);
                //  }

            } catch (\Throwable $th) {
                $tickets = [];
            }
             return view('ticket.index')->with(compact('tickets'));
        }else{
            return back()->with('danger','Sem Permissao');
        }


    }
}
