<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Http\Controllers\isAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isAdmin::isAdmin()) {
            $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
            $all = DB::select('SELECT
             v.id as v_id,u.name as u_name,c.id as c_id,c.name as c_name,
             v.created_at as dataVenda,
             j.id as j_id,nome FROM vendas v INNER JOIN users u on(u.id = v.user_id)
               INNER JOIN clients c on(c.id = v.client_id)
                INNER JOIN jogos j on(j.id = v.jogo_id)');
            $vendas = $all;

            return view('venda.index')->with(compact('vendas',"user"));
        }else{
            return view('geral.permissao');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function recibo($id)
    {
        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
            $all = DB::select('SELECT
             v.id as v_id,u.name as u_name,co.id as co_id,code,c.id as c_id,c.name as c_name,
             v.created_at as dataVenda,
             j.id as j_id,nome FROM vendas v INNER JOIN users u on(u.id = v.user_id)
              INNER JOIN codes co on(co.id = v.code_id)
               INNER JOIN clients c on(c.id = v.client_id)
                INNER JOIN jogos j on(j.id = co.jogo_id)
                WHERE id = ?',[$id]);
                // dd($all);
            $vendas = $all;
            dd($vendas);
        return view('venda.recibo')->with(compact('vendas',"user"));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
            $all = DB::select('SELECT
             v.id as v_id,u.name as u_name,v.code_id,c.name as c_name,
             v.created_at as dataVenda,c.email as c_mail,u.email as u_mail,
             j.id as j_id,nome FROM vendas v INNER JOIN users u on(u.id = v.user_id)
               INNER JOIN clients c on(c.id = v.client_id)
                INNER JOIN jogos j on(j.id = v.jogo_id)
                WHERE v.id = ?',[$id]);
                // dd($all);
            $vendas = $all[0];
            // dd($vendas);

            $resposta = Http::acceptJson()->withHeaders([
                'Authorization' => 'ApiKey-v1 e4657b8826e48c9b416dae0f212c6209154c9658a34d038d98969e5b7bd43288',
            ])->get('https://api.loquiz.com/v3/tickets/'.$vendas->code_id);
            // dd($response->body());
            $tickets = $resposta->json();
            $data = new \stdClass();
            $data->ticket = $vendas;
              // dd($vendas);
        return view('venda.recibo')->with(compact('vendas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        //
    }
}
