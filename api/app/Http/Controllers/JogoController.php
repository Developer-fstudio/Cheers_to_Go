<?php

namespace App\Http\Controllers;

use App\Http\Controllers\isAdmin;
use App\Models\Jogo;
use App\Models\Client;
use App\Models\Code;
use App\Models\Venda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Image;
use Illuminate\Support\Facades\Http;
use App\Mail\VendaEmail;
use Illuminate\Support\Facades\Mail;


class JogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function isAdmin(){
        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
        if ($user->role == 'admin') {
            return 1;
        }else{
            return 0;
        }
    }
    public function index()
    {
        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
        $jogos = Jogo::all();
        return view('jogo.index')->with(compact('jogos','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (isAdmin::isAdmin()) {
            return view('jogo.create');
        }else{
            return back()->with('danger','Sem Permissao');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isAdmin::isAdmin()) {
            $jogos = new Jogo();

        $jogos->nome = $request->get('nome');
        $jogos->utilizador = $request->get('utilizador');
        $jogos->codigo = $request->get('codigo');
        $jogos->online = $request->get('online');
        if($request->file('file')){
        $request->validate([
            //  'file' => 'mimes:jpg,bmp,png|max:1000',
        ]);


        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/uploads');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(100, 100, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['file']);
        // $destinationPath = public_path('/uploads');
        // $image->move($destinationPath, $input['file']);

        $jogos->img = '/uploads/'.$input['file'];
    }



        $jogos->save();
        return redirect('/jogos')->with('success','Jogo '. $jogos->nome .' Criado');
        }else{
            return back()->with('danger','Sem Permissao');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rgVender($id,Request $request)
    {
        $jogo = Jogo::find($id);
        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
// dd($jogo);
$resposta = Http::acceptJson()->withHeaders([
    'Authorization' => 'ApiKey-v1 e4657b8826e48c9b416dae0f212c6209154c9658a34d038d98969e5b7bd43288',
])->get('https://api.loquiz.com/v3/games/'.$jogo->codigo);
// dd($response->body());
$game = $resposta->json();
        $client = Client::find($request->get('client'));

       /* $response = Http::withHeaders([
            'Authorization' => 'ApiKey-v1 e4657b8826e48c9b416dae0f212c6209154c9658a34d038d98969e5b7bd43288',
        ])->post('https://api.loquiz.com/v3/tickets', [
            "gameId" => $jogo->codigo,
            "email" => $client->email ?? $user->email,
            "username" => $game['username'],
            "validFrom" => 0,
            "validUntil" => '1773722409',
            "scope" => ""
        ]);
        $ticket = $response->json();
        if(isset($ticket['message'])){
        return redirect('/jogos')->with('danger',$ticket['message']);

        }*/




        $venda = new Venda();

        $venda->client_id = $client->id;
        $venda->user_id = $user->id;
        // $code = DB::select('SELECT id FROM codes WHERE jogo_id = ? AND estado = 0 LIMIT 1',[$id]);
        // $codigo = Code::find($code[0]->id);
        // $codigo->estado = 1;
        // $codigo->save();
        $venda->code_id = $ticket['id'] ?? 0;
        $venda->jogo_id = $jogo->id;


        $venda->save();

        // dd($venda);

        $mailData = new \stdClass();
        $mailData->venda = $venda;
        $mailData->jogo = $jogo;
        $mailData->client = $client;
        $mailData->user = $user;
        $mailData->game = $game;

        //   Mail::to($client->email)->send(new VendaEmail($mailData));
        // dd($mailData);

        // return redirect('/jogos')->with('success','Jogo Vendido Ticket : ' .$ticket['id'] );
         return redirect('/jogos')->with('success','Jogo Vendido Ticket : ' );
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jogo = Jogo::find($id);
        $edit = 0;
        return view('jogo.edit')->with(compact('jogo','edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
        $jogo = Jogo::find($id);

        if (isAdmin::isAdmin()) {
        $edit = 1;
        return view('jogo.edit')->with(compact('jogo','edit','user'));
        }else{
        $edit = 0;
            return view('jogo.edit')->with(compact('jogo','edit','user'));
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (isAdmin::isAdmin()) {

        $jogos = Jogo::find($id);

        $jogos->nome = $request->get('nome');
        $jogos->utilizador = $request->get('utilizador');
        $jogos->online = $request->get('online');
        $jogos->codigo = $request->get('codigo');
        if($request->file('file')){
            $request->validate([
                //  'file' => 'mimes:jpg,bmp,png|max:1000',
            ]);


            $image = $request->file('file');
            $input['file'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['file']);
            // $destinationPath = public_path('/uploads');
            // $image->move($destinationPath, $input['file']);

            $jogos->img = '/uploads/'.$input['file'];
        }


        $jogos->save();
        return redirect('/jogos')->with('success','Jogo Salvo');;
        }else{
            return back()->with('danger','Sem Permissao');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */

     public function vender($id)
{

        // $code = DB::select('SELECT id FROM codes WHERE jogo_id = ? AND estado = 0 LIMIT 1',[$id]);
        // if(count($code) == 0){
        //     return redirect('/jogos')->with('danger','Jogo Sem Codigos Disponiveis');
        // }else{
            $clients = Client::all();
            return view('jogo.vender')->with(compact("clients"));
        // }
    }
    public function destroy($id)
    {
        if (isAdmin::isAdmin()) {
        $jogo = Jogo::find($id);
        File::delete($jogo->imagem);
        $jogo->delete();
        return redirect('/jogos');
        }else{
            return back()->with('danger','Sem Permissao');
        }
    }
}
