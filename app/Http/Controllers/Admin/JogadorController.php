<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jogador;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateJogadorRequest;
use Exception;

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
        try {

            $this->repository->create([
                'nome' => $request['nome'],
                'apelido' => $request['apelido'],
                'email' => $request['email'],
                'senha' => bcrypt($request['senha'])
            ]);
    
            return redirect()->route('jogadores.index')
                             ->with('message','Jogador Registrado com Sucesso!');

        } catch (Exception $e) {

            return redirect()->route('jogadores.index')->with('error',$e->getMessage());
        }
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

      try {

        $jogador->repository->update([
            'nome' => $request['nome'],
            'apelido' => $request['apelido'],
            'email' => $request['email'],
            'senha' => bcrypt($request['senha'])
        ]);

       return redirect()->route('jogadores.index')
                        ->with('message','Jogador Editado com Sucesso!');

      } catch (Exception $e) {

        return redirect()->route('jogadores.index')->with('error',$e->getMessage());
      }
    }

    // Deletar Jogador
    public function destroy($idJogador)
    {
        if (!$jogador = $this->repository->find($idJogador)) {
            return redirect()->back();
       }
    
       try {

        $jogador->delete();

        return redirect()->route('jogadores.index')
                         ->with('message','Jogador Excluído com Sucesso!');

       } catch (Exception $e) {

            return redirect()->route('jogadores.index')->with('error',$e->getMessage());
       }

    }

    // Filtro de Pesquisa
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $jogadores = $this->repository
                            ->where(function($query) use ($request){
                                if ($request->filter){
                                    $query->where('nome','LIKE',"%{$request->filter}%")
                                            ->orWhere('apelido','LIKE',"%{$request->filter}%");
                                }
                            })
                            ->paginate();                   

        return view('admin.pages.jogadores.index', compact('jogadores', 'filters'));

    }
}
