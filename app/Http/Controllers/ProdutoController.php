<?php 
namespace estoque\Http\Controllers;

use \Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller{

  public function lista(){

   // $produtos = DB::select('select * from produtos');

    //usando o Eloquent
    $produtos = Produto::all();

    // return view('listagem')->with('produtos', $produtos);

    // Magic methods (exemplo)
    // return view('listagem')->withProdutos($produtos);

    // outras formas
    // return view('listagem', ['produtos' => $produtos]);

    // $data = ['produtos' => $produtos];
    // return view('listagem', $data);

    $data = []; 
    $data['produtos'] = $produtos;
    return view('produtos.listagem', $data);

  }

  // public function mostra(){

  //   //para pegar pelo input (name)
  //  // $id = Request::input('id', 0);

  //   $id = Request::route('id');
  //   $resposta = DB::select('select * from produtos where id = ?', [$id]);

  //   if (empty($resposta)) {
  //     return "Esse produto não existe";
  //   }

  //   return view('Detalhes.detalhes')->with('p', $resposta[0]);
  // }

  //Segunda forma de recuperar dados 
  public function mostra($id){

    //para pegar pelo input (name)
   // $id = Request::input('id', 0); 
   // $resposta = DB::select('select * from produtos where id = ?', [$id]);
    //desta forma tem que se passar um array no indice 0 para a resposta 
    //usando o find não é mais necessario fazer desta forma. Só passar a variavel direto.

    $resposta = Produto::find($id);  

    if (empty($resposta)) {
      return "Esse produto não existe";
    }
    
    return view('produtos.detalhes')->with('p', $resposta);
  }

  //criando um novo produto

  public function novo(){
    return view('produtos.formulario');
  }
  //adiciona 

  public function adiciona(ProdutosRequest $request){
    // $nome = Request::input('nome');
    // $descricao = Request::input('descricao');
    // $valor = Request::input('valor');
    // $quantidade = Request::input('quantidade');   

    // return implode( ', ', array($nome, $descricao, $valor, $quantidade));
    //1 forma de inserrir no banco de dados.
    // DB::insert('insert into produtos
    // (nome, quantidade, valor, descricao) values (?,?,?,?)',
    // array($nome, $quantidade, $valor, $descricao));

    // DB::table('produtos')->insert(
    //   ['nome' => $nome,
    //     'valor' => $valor,
    //     'descricao' => $descricao,
    //     'quantidade' => $quantidade
    //   ]);

    //modo Eloquent ORM (forma 1)
    // $produto = new Produto();
    // $produto->nome = Request::input('nome');
    // $produto->valor = Request::input('valor');
    // $produto->descricao = Request::input('descricao');
    // $produto->quantidade = Request::input('quantidade');

    // $produto->save();

    //Modo Eloquent ORM (forma 2) Necessita que na classe Produto esteja 
    //especificado os fillable para que não gere um erro.
    //especificando um valor guarded para o id, para que de nenhuma maneira 
    //seja possivel ele alterar o id. 
    // $params = Request::all();
    // $produto = new Produto($params);
    // $produto->save();
    //Modo Eloquent ORM (forma 3) usando factory method, não é necessario criar um objeto.
   // Produto::create(Request::all());
    //pegando já e ja validando.
    Produto::create($request->all());

   // return view('produtos.adicionado')->with('nome', $nome);

    //redireciona para pagina produto com os dados(todos) da requisição anterior.
    //return redirect('/produtos')->withInput();

    //redireciona para pagina produto somente com o dado(nome) da requisição anterior.
   // return redirect('/produtos')->withInput(Request::only('nome'));

    //redirecionando para uma açao especifica do controller. 
    return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
  }

  public function listaJson(){
  
  //  $produtos = DB::select('select * from produtos');
    
    //usando o Eloquent
    $produtos = Produto::all();

    //forma padrão definida pelo Laravel 
   // return $produtos;

  //forma explicita 
    return respose()->json($produtos);


  }

  public function remove($id){
    $produto = Produto::find($id);
    $produto->delete(); 

    return redirect()->action('ProdutoController@lista');
  }


  public function atualiza($id){
    $produtos = Produto::find($id);    
    return view('produtos.atualiza')->with('dados', $produtos);

  }


  //Fazendo o Update no Eloquent ORM
  public function fazerAtualizacao($id){
      //Busca pelo Id do produto, criando um novo produto
      $produto = Produto::find($id);
      //Depois preenche os novos dados
      $produto->nome = Request::input('nome');
      $produto->valor = Request::input('valor');
      $produto->descricao = Request::input('descricao');
      $produto->quantidade = Request::input('quantidade');
      //E assim como no insert usamos o metodo save();
      $produto->save();

      return redirect()->action('ProdutoController@lista');
  }
}

?>
