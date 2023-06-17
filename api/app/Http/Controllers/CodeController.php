<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use App\Models\Jogo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CodeController extends Controller
{
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function codesByGame()
    {

        $codes = DB::select('SELECT COUNT(c.id) as nCodes,nome,jogo_id FROM codes c INNER JOIN jogos j on(c.jogo_id = j.id) WHERE estado = 0 GROUP BY nome,estado');

        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
        return view('code.codesByGame')->with(compact('codes',"user"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function index()
     {
        if(isAdmin::isAdmin()){
         $codes = DB::select('SELECT c.id as c_id,j.id as j_id,* FROM codes c INNER JOIN jogos j on(c.jogo_id = j.id)');

         $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
         if(!$user){
            return redirect('/login');
         }
         return view('code.index')->with(compact('codes',"user"));
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
        if (isAdmin::isAdmin()) {
        $jogos = Jogo::all();
        return view('code.create')->with('jogos',$jogos);
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

        $codes = new Code();

        $codes->code = $request->get('code');
        $codes->jogo_id = $request->get('jogoid');
        $codes->estado = $request->get('estado');

        $codes->save();

        return redirect('/codes')->with('success',"Codigo: " . $codes->code ." criado com sucesso");
            }else{
                return back()->with('danger','Sem Permissao');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show(Code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $codes = DB::select('SELECT * FROM codes WHERE id = ?',[$id]);
$code = $codes[0];
        //  dd($code);
        $jogos = Jogo::all();
        $user = Auth::user();
         if(!$user){
            return redirect('/login');
         }
        if (isAdmin::isAdmin()) {
        $edit = 1;
        return view('code.edit')->with(compact('code','edit', "jogos",'user'));
        }else{
            $edit = 0;
            return view('code.edit')->with(compact('code','edit',"jogos",'user'));
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

            $codes = Code::find($id);

            $codes->code = $request->get('code');
        $codes->jogo_id = $request->get('jogoid');
        $codes->estado = $request->get('estado');

        $codes->save();
            return redirect('/codes')->with('success',"Codigo: " . $codes->code ." editado com sucesso");

            }else{
                return back()->with('danger','Sem Permissao');

            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (isAdmin::isAdmin()) {
            $code = Code::find($id);
            $code->delete();
            return redirect('/codes')->with('success',"Eliminado com sucesso codigo: " . $code->code);
            }else{
                return back()->with('danger','Sem Permissao');
            }
    }
}
