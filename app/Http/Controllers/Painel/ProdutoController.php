<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produto;

class ProdutoController extends Controller
{

    private  $produto;

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
        $produtos = $this->produto->all();
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
        return view('painel.produtos.create', compact('title', 'categorias') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Pega todos os campos do formulário
        $dataForm = $request->all();

        // Faz o Cadastro
        $insert = $this->produto->create($dataForm);

        if ($insert) {
            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('produtos.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
