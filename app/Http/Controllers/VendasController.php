<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

  
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


    public function cadastro_produtos(){
        return view('cadastro_produtos');
    }


    public function cadastro_produtos_submit(Request $request){
       
        $produto = $request->input('produto');
        $valor = $request->input('valor');
    
        echo $produto.'<br>';
        echo $valor;

    }


    public function cadastro_vendas(){
        return view('cadastro_vendas');
    }

    public function cadastro_vendas_submit(Request $request){
        $cliente = $request->input('cliente');
        $produto = $request->input('produtos');
        $valor = $request->input('valor');
        $quantidade = $request->input('quantidade');

        $total = $valor * $quantidade;
        $pagamento = $request->input('pagamento');

        echo 'CLIENTE: '.$cliente.'<br>'; 
        echo 'PRODUTO: '.$produto.'<br>';
        echo 'VALOR: '.$valor.'<br>';
        echo 'QTD: '.$quantidade.'<br>';
        echo 'TOTAL: R$ '.$total.'<br>';
        echo 'TIPO DE PAGAMENTO: '.$pagamento.'<br>';


        if($pagamento == 'a prazo'){
        echo "QTD PARCELAS:";

        ?>
            <select name="qtdparcelas" id="qtdparcelas" required onclick="valorParcela()">
                <option selected value="">Selecione</option>
                <option value="2">2x sem juros</option>
                <option value="3">3x sem juros</option>
                <option value="5">5x sem juros</option>
                <option value="7">7x sem juros</option>
                <option value="10">10x sem juros</option>

            
            </select>

            VALOR PARCELA: <input type="text" name="valorparcela" readonly id="valorparcela">

            <script>
                function valorParcela(){
        
                    var qtdparcelas = document.getElementById('qtdparcelas').value;

                    var valor_por_qtd_parcela = 3500/qtdparcelas;

              
                    document.getElementById('valorparcela').value = 'R$'+valor_por_qtd_parcela;

                    
                }
                
            </script>
        <?php
        }
  

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


}
