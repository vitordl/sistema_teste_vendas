<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Pdf;

  
class VendasController extends Controller
{

   
    public function index()
    {
        //index é pra ser a página de login
        //e tambem carregar o metodo que alimenta o banco de dados inicial
    
        if(session()->has('logado')){
            return redirect()->route('sistema');
        }
       
        $this->preencherBanco();

        return view('login');

    }

    private function preencherBanco(){
        $usuarios = [
            ['usuario' => 'vitor', 'senha' => 'vitor#'],
            ['usuario' => 'astolfo', 'senha' => 'astolfo#']
        ];

        $produtos = [
            ['produto' => 'Notebook', 'valor' => 3200.50],
            ['produto' => 'TV', 'valor' => 1985.89],
            ['produto' => 'Celular', 'valor' => 1240.00]
        ];

        $usuariosdb = Usuarios::get();

        $produtosdb = Produtos::get();

        if($usuariosdb->count() == 0 && $produtosdb->count() == 0){

            foreach($usuarios as $u){
                $userdb = new Usuarios();
                $userdb->usuario = $u['usuario'];
                $userdb->senha = $u['senha'];
                $userdb->save();
            }

            foreach($produtos as $p){
                $prodb = new Produtos();
                $prodb->produto = $p['produto'];
                $prodb->valor = $p['valor'];
                $prodb->save();
            }     
        }
        
    }


    public function login_submit(Request $request){

        $usuario_campo = $request->input('usuario');
        $senha_campo = $request->input('senha');
        
        $usdb = Usuarios::where('usuario', $usuario_campo)->first();

        $request->validate([
            'usuario' => 'required|min:3',
            'senha' => 'required|min:3',
        ]);
        
       
        if(!$usdb){
            session()->flash('aviso', 'Usuário ou senha incorretos');
            return redirect()->route('login');
        }

        if($usdb->senha != $senha_campo){
            session()->flash('aviso', 'Senha incorreta');
            return redirect()->route('login');
        }

        session()->put('logado', 'sim');
        return redirect()->route('sistema');

    
    }


    public function sistema(){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }
    
        return view('sistema');

    }


    public function sobre(){
        
        if(!session()->has('logado')){
            return redirect()->route('login');
        }

        return view('sobre');
    }

    
    


    public function deslogar(){
        if(session()->has('logado')){
            session()->forget('logado');
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }

    

   
    public function gerarPDf()
    {
        $data = ['teste' => 'oi tudo bom'];
        $pdf = Pdf::loadView('pdfteste', $data);
        return $pdf->download('pdfteste.pdf');
    
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
