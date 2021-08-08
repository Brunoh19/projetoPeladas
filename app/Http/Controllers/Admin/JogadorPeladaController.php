<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jogador;
use App\Models\Pelada;
use Illuminate\Http\Request;

class JogadorPeladaController extends Controller
{

    protected $jogador, $pelada;

    public function __construct(Jogador $jogador, Pelada $pelada)
    {
        $this->jogador =  $jogador;
        $this->pelada = $pelada;
    }

    // Listar Peladas Que um Determinado Jogar Está Inscrito
    public function peladas($idJogador)
    {
        $jogador = $this->jogador->find($idJogador);

        if (!$jogador) {
            return redirect()->back();
        }

        $peladas = $jogador->peladas()->paginate();

        return view('admin.pages.jogadores.peladas.index', compact('jogador', 'peladas'));
    }

    // Listar Jogadores Que Se Inscreveram na Pelada
    public function jogadores($idPelada)
    {
        $pelada = $this->pelada->find($idPelada);

        if (!$pelada) {
            return redirect()->back();
        }

        $jogadores = $pelada->jogadores()->paginate();

        return view('admin.pages.peladas.jogadores.index', compact('pelada', 'jogadores'));
    }

    public function peladasAvailable(Request $request, $idJogador)
    {

        if (!$jogador = $this->jogador->find($idJogador)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $peladas = $jogador->peladasAvailable($request->filter);

        return view('admin.pages.jogadores.peladas.available', compact('jogador', 'peladas', 'filters'));
    }

    public function attachPeladasJogador(Request $request, $idJogador)
    {

        if (!$jogador = $this->jogador->find($idJogador)) {
            return redirect()->back();
        }

        if (!$request->peladas || count($request->peladas) == 0) {
            return redirect()
                ->back()
                ->with('info', 'Selecione Pelo Menos Uma Pelada!');
        }

        $jogador->peladas()->attach($request->peladas);

        return redirect()->route('jogadores.peladas', $jogador->id);
    }


    public function detachPeladaJogador($idJogador, $idPelada)
    {

        $jogador = $this->jogador->find($idJogador);
        $pelada = $this->pelada->find($idPelada);

        if (!$jogador || !$pelada) {
            return redirect()->back();
        }

        $jogador->peladas()->detach($pelada);

        return redirect()->back();
    }

}
