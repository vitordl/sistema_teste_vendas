<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Usuarios;
use App\Models\Vendas;
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
                $prodb->vendedor = 'usuario_admin';
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
        session()->put('usuario', $usuario_campo);
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

        if(!session()->has('logado')){
            return redirect()->route('login');
        }


        return view('cadastro_produtos');
    }


    public function cadastro_produtos_submit(Request $request){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }
       
        $produto = $request->input('produtos');
        $valor = $request->input('valor');

        $produtos = new Produtos();

        $produtos->produto = "[{$produto}]";
        $produtos->valor = $valor;
        $produtos->vendedor = session('usuario');

        $produtos->save();
    
        echo $produto.'<br>';
        echo $valor;

    }


    public function cadastro_vendas(){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }


        $produtos = Produtos::orderBy('produto')->get();

        return view('cadastro_vendas', ['produtos' => $produtos]);
    }

    public function cadastro_vendas_submit(Request $request){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }

        $cliente = $request->input('cliente');
        $produto = $request->input('produtos');
        $valor = $request->input('valor');
        $quantidade = $request->input('quantidade');

        $total = $valor * $quantidade;
        $pagamento = $request->input('pagamento');


        return view('cadastro_vendas_submit',
            [
                'cliente' => $cliente, 'produto' => $produto,
                'valor' => $valor, 'quantidade' => $quantidade,
                'pagamento' => $pagamento, 'total' => $total,
            ]
        );
    }

    public function cadastro_vendas_submit2(Request $request){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }


        $cliente = $request->input('cliente');
        $produto = $request->input('produtos');
        $valor = $request->input('valor');
        $quantidade = $request->input('quantidade');
        $total = $request->input('total');
        $pagamento = $request->input('pagamento');
        $qtdparcelas = $request->input('qtdparcelas');
        $valorparcela = $request->input('valorparcela');
        
        return view('cadastro_vendas_submit2',
        [
            'cliente' => $cliente, 'produto' => $produto,
            'valor' => $valor, 'quantidade' => $quantidade,
            'pagamento' => $pagamento, 'total' => $total,
            'qtdparcelas' => $qtdparcelas, 'valorparcela' => $valorparcela
        ]
    );
    }


    public function vendas_salvar(Request $request){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }


        $cliente = $request->input('cliente');
        $produto = $request->input('produtos');
        $valor = $request->input('valor');
        $quantidade = $request->input('quantidade');
        $total = $request->input('total');
        $pagamento = $request->input('pagamento');
        $qtdparcelas = $request->input('qtdparcelas');
        $valorparcela = $request->input('valorparcela');

        $vendas = new Vendas();
        
        $vendas->vendedor = session('usuario');
        $vendas->cliente = $cliente;
        $vendas->produto = $produto;
        $vendas->valor = $valor;
        $vendas->quantidade = $quantidade;
        $vendas->valor_total = $total;
        $vendas->tipo_pgto = $pagamento;
        $vendas->parcelas = $qtdparcelas;
        $vendas->valor_parcela = $valorparcela;
        $vendas->save();


        return redirect()->route('vendas_controle');

    }


    public function vendas_controle(){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }


        $vendas = Vendas::get();
        return view('vendas_controle', ['vendas' => $vendas]);
    }


    public function vendas_remover($id){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }


        $vendas = Vendas::find($id);
        $vendas->delete();
        return redirect()->route('vendas_controle');
    }


    public function relatorio_vendas(){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }


        $vendas = Vendas::get();
        $total_valor = Vendas::sum('valor_total');
        return view('relatorio_vendas', ['vendas' => $vendas, 
        'total_valor' => $total_valor]);
    }

    public function relatorio_produtos(){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }


        $produtos = Produtos::orderBy('produto')->get();

        return view('relatorio_produtos', ['produtos' => $produtos]);
    }

    
    public function deslogar(){
        if(session()->has('logado')){
            session()->forget('logado');
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
   
    public function gerar_pdf_vendas()
    {

        if(!session()->has('logado')){
            return redirect()->route('login');
        }
       
        $vendas = Vendas::get();
        $total_valor = Vendas::sum('valor_total');
    
        $data = ['vendas' => $vendas, 'total_valor' => $total_valor];

        $pdf = Pdf::loadView('pdf_vendas', $data);
        return $pdf->download('pdf_vendas.pdf');
    
    }

    public function gerar_pdf_produtos(){

        if(!session()->has('logado')){
            return redirect()->route('login');
        }

        
        $produtos = Produtos::orderBy('produto')->get();

        $data = ['produtos' => $produtos];

        $pdf = Pdf::loadView('pdf_produtos', $data);
        return $pdf->download('pdf_produtos.pdf');

    }




}
