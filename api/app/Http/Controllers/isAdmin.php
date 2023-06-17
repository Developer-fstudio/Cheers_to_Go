<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Jogo;
use App\Models\Client;
use App\Models\Code;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class isAdmin extends Controller
{
     public static function isAdmin(){
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


    public function __construct(){
        $this->middleware('auth');
    }
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function index()
   {
        if(isAdmin::isAdmin()){
        $all = DB::select(
            'SELECT (SELECT COUNT(j.id)
        FROM jogos j) as nJogos,
        (SELECT COUNT(c.id) FROM codes c) as nCodes,
        (SELECT COUNT(id) FROM clients) as nClients,
        (SELECT COUNT(id) FROM vendas) as nVendas,
        (SELECT COUNT(id) FROM users) as nUsers;
        ');
        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
        // $users = DB::select('SELECT u.*,count(ifnull(v.id , 0) )   as nVendas,v.created_at as cdate FROM users u LEFT JOIN vendas v ON u.id = v.user_id WHERE u.id != ? GROUP BY u.id',[$user->id]);
        $users = DB::select('SELECT u.*,count(ifnull(v.id , 0) )   as nVendas
        ,v.created_at as cdate FROM users u
         LEFT JOIN vendas v ON u.id = v.user_id
           GROUP BY u.id');
        $stats = $all[0];
        $jogos = Jogo::all();
        try {
            $resposta = Http::acceptJson()->withHeaders([
                'Authorization' => 'ApiKey-v1 e4657b8826e48c9b416dae0f212c6209154c9658a34d038d98969e5b7bd43288',
            ])->get('https://api.loquiz.com/v3/tickets/');
            // dd($response->body());
            $tickets = $resposta->json();
        } catch (\Throwable $th) {
            $tickets = [];
        }

        // dd($tickets['total']);
       return view('admin.index')->with(compact("jogos","stats","users","tickets"));
        }else{
       return view('geral.permissao');
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
        if(isAdmin::isAdmin()){
        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        if($request->get('role')){
            $user->role = 'admin';
        }else{
            $user->role = 'parceiro';
        }


        $user->save();

        return redirect('/admin')->with('success','Utilizador: ' . $user->name .' adicionado com sucesso');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if(isAdmin::isAdmin()){
        $user = User::find($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if($request->get('password')){
        $user->password = Hash::make($request->get('password'));
        }
        if($request->get('role')){
            $user->role = 'admin';
        }else{
            $user->role = 'parceiro';
        }


        $user->save();

        return redirect('/admin')->with('success','Utilizador: '.$user->name.' editado com sucesso');
        }

    }
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function userCreate()
    {
         if(isAdmin::isAdmin()){
        return view('admin.user');
         }else{
        return view('geral.permissao');
         }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(isAdmin::isAdmin()){
        $user = User::find($id);
        return view('admin.edit')->with('user',$user);
        }else {
        return view('geral.permissao');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Auth::user();
        if($users->id != $id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin')->with('success', 'Utilizador: '.$user->name.' Eliminado com sucesso');
        }else{
        return redirect('/admin')->with('danger', 'Não podes eliminar o prorio utilizador');

        }
    }
}
