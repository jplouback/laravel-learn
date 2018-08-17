<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\Painel\ProductFormRequest;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produto;



class ProdutoController extends Controller
{

    private  $produto;
    private  $totalPage = 5;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produto $produto)
    {
        $title = 'Página de Produtos';
        $produtos = $this->produto->paginate($this->totalPage);
        return view('painel.produtos.index', compact('produtos', 'title'));
    }

    public function testes()
    {

//        $insert = $this->produto->create([
//                    'name'          => 'Produto teste 2',
//                    'number'        => '56789',
//                    'active'        => true,
//                    'category'      => 'eletronicos',
//                    'description'   => 'Descrição do meu Produto teste 2',
//                ]);
//
//        if ($insert){
//            return "Inserido com sucesso id: {$insert->id}";
//        } else {
//            return "não inserido";
//        }

//        $prod = $this->produto->find(5);
//        $update = $prod->update([
//                        'name'          => 'Louback',
//                        'number'        => '181818',
//                        'active'        => false,
//                    ]);
//
//        if ($update){
//            return "Produto {$prod->name} ({$prod->id}) alterado com sucesso!";
//        } else {
//            return "não alterado";
//        }

         $prod = $this->produto->find(4);
         $delete = $prod->delete();

        if ($delete){
            return "Produto {$prod->name} ({$prod->id}) Deletado com sucesso!";
        } else {
            return "Falha ao deletar";
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo Produto';
        $categorias = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.produtos.create-edit', compact('title', 'categorias') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {

        // Pega todos os campos do formulário
        $dataForm = $request->all();

        $dataForm['active'] = ( !isset($dataForm['active']) ) ? 0 : 1;


//        // Validação (Agora está sendo feita pela injeção do ProductFormRequest
//        $this->validate($request, $this->produto->rules, $this->produto->mensagens);


        // Faz o Cadastro
        $insert = $this->produto->create($dataForm);

        if ($insert) {
            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('produtos.create-edit');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);
        $title = "Produto: {$produto->name}";
        return view('painel.produtos.show', compact('title', 'produto') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Recuperando produto
        $produto = $this->produto->find($id);

        $title = "Editar Produto {$produto->name}";
        $categorias = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.produtos.create-edit', compact('title', 'categorias', 'produto') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $dataForm = $request->all();

        $dataForm['active'] = ( !isset($dataForm['active']) ) ? 0 : 1;

        $produto = $this->produto->find($id);

        $update = $produto->update($dataForm);

        if ($update) {
            return redirect()->route('produtos.edit', $id)->with('success','Cadastrado com sucesso!');
        } else {
            return route('protutos.edit', $id)->with([
                'errors' => 'Falha ao editar'
            ]);
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
        $produto = $this->produto->find($id);

        $delete = $produto->delete();

        if($delete) {
            return redirect()->route('produtos.index')->with('success','Deletado com sucesso!');
        } else {
            return route('protutos.show', $id)->with([
                'errors' => 'Falha ao deletar'
            ]);
        }

    }
}
