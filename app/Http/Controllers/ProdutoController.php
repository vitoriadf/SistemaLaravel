<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Produto;
use App\Models\Marca;
use App\Models\Cor;
use App\Models\Categoria;
use App\Models\Tecido;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public readonly Produto $produto;
    public readonly Marca $marca;
    public readonly Cor $cor;
    public readonly Categoria $categoria;
    public readonly Tecido $tecido;
   
    public function __construct()
    {
        $this->produto = new Produto();
        $this->marca = new Marca();
        $this->cor = new Cor();
        $this->categoria = new Categoria();
        $this->tecido = new Tecido();
     
    }

    public function index()
    {
        $produtos = $this->produto->all();
        return view('produtos', ['produtos' => $produtos]);
    }

    public function create()
    {
        $marcas = $this->marca->all();
        $cores = $this->cor->all();
        $categorias = $this->categoria->all();
        $tecidos = $this->tecido->all();
        $produtos = $this->produto->all();

        return view('produto_create', compact('marcas', 'cores', 'categorias','tecidos','produtos'));
    }

    public function store(StoreUpdateProdutoRequest $request)
    {
        $create = $this->produto->create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'marca_id' => $request->input('marca_id'),
            'cor_id' => $request->input('cor_id'),
            'categoria_id' => $request->input('categoria_id'),
            'tecido_id' => $request->input('tecido_id'),
            'quantidade' => $request->input('quantidade'),
        ]);

        if ($create) {
            return redirect()->route('produtos.index')->with('message', 'Produto criado com sucesso');
        }

        return redirect()->back()->with('message', 'Erro ao criar o produto');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', ['produto' => $produto]);
    }

    public function edit(Produto $produto)
    {
        $marcas = $this->marca->all();
        $cores = $this->cor->all();
        $categorias = $this->categoria->all();
        $tecidos = $this->tecido->all();
        $produtos = $this->produto->all();


        return view('produto_edit', compact('produto', 'marcas','cores','categorias','tecidos'));
    }

    public function update(StoreUpdateProdutoRequest $request, string $id)
    {
        $produto = $this->produto->find($id);

        $produto->update([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'marca_id' => $request->input('marca_id'),
            'cor_id' => $request->input('cor_id'),
            'categoria_id' => $request->input('categoria_id'),
            'tecido_id' => $request->input('tecido_id'),
            'quantidade' => $request->input('quantidade'),
        ]);

        return redirect()->route('produtos.index')->with('message', 'Produto atualizado com sucesso');
    }

    public function destroy(string $id)
    {
        return redirect()->route('produtos.index')
            ->with('showProdutoDeleteModal', true)
            ->with('produtoDeleteId', $id);
    }

    public function confirmDelete(string $id)
    {
        $produto = $this->produto->find($id);

        if ($produto) {
            $produto->delete();
            return redirect()->route('produtos.index')
                ->with('message', 'Produto excluído com sucesso')
                ->with('showProdutoDeleteModal', false);
        }

        return redirect()->route('produtos.index')
            ->with('message', 'Erro ao excluir o produto')
            ->with('showProdutoDeleteModal', false);
    }



    public function closeModalDelete()
    {
        return redirect()->route('produtos.index')->with('showProdutoDeleteModal', false);
    }
}
