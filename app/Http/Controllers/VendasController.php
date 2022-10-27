<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class VendasController extends Controller
{

   
    public function index()
    {
        //index é pra ser a página de login
        //e tambem carregar o metodo que alimenta o banco de dados inicial

        function preencherBanco(){

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

        preencherBanco();

        return view('login');


        // $request->session()->has('logado');
   
    }


    public function sistema(Request $request){
        /* 
        provavelmente aqui farei um foreach pra ver se existe o usuario e ele pode estar logado e depois crio uma session logado para o usuario e uso ela em todo os metods, tentar ne.. 
        */
        $usuario_campo = $request->input('usuario');
    
        $usuariosdb = Usuarios::get();

        foreach($usuariosdb as $u){
            if($usuario_campo == $u->usuario){
                return view('sistema');
            }else{
                return view('login');
            }
        }

        
        // print_r($usuariosdb);
        // echo "logado";
        
    }

    

   
    public function create()
    {
        //
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
