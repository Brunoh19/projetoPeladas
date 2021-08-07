<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jogador;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateJogadorRequest;

class JogadorController extends Controller
{
    private $repository;

    public function __construct(Jogador $jogador){

        $this->repository = $jogador;
    }

    // Index
    public function index()
    {
        $jogadores = $this->repository->paginate();

        return view('admin.pages.jogadores.index',compact('jogadores'));
    }

    // Formulário Novo Jogador
    public function create(){
        return view('admin.pages.jogadores.create');
    }

    // Salvar Novo Jogador
    public function store(StoreUpdateJogadorRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('jogadores.index')
                         ->with('message','Jogador Registrado com Sucesso!');
    }

    // Editar Jogador
    public function edit($idJogador)
    {
       if (!$jogador = $this->repository->find($idJogador)) {
            return redirect()->back();
       }

        return view('admin.pages.jogadores.edit', compact('jogador'));
    }

    // Salvar Edição no Jogador
    public function update(StoreUpdateJogadorRequest $request, $idJogador)
    {
        if (!$jogador = $this->repository->find($idJogador)) {
            return redirect()->back();
       }

       $jogador->update($request->all());

       return redirect()->route('jogadores.index')
                        ->with('message','Jogador Editado com Sucesso!');
    }

    // Deletar Jogador
    public function destroy($idJogador)
    {
        if (!$jogador = $this->repository->find($idJogador)) {
            return redirect()->back();
       }
    
       $jogador->delete();

       return redirect()->route('jogadores.index')
                        ->with('message','Jogador Excluído com Sucesso!');

    }
}
