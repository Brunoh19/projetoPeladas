<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelada;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePeladaRequest;

class PeladaController extends Controller
{

    private $repository;

    public function __construct(Pelada $pelada){

        $this->repository = $pelada;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peladas = $this->repository->paginate();

        return view('admin.pages.peladas.index',compact('peladas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.peladas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePeladaRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('peladas.index')
                         ->with('message','Pelada Registrada com Sucesso!');
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
    public function edit($idPelada)
    {
        if (!$pelada = $this->repository->find($idPelada)) {
            return redirect()->back();
       }

        return view('admin.pages.peladas.edit', compact('pelada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePeladaRequest $request, $idPelada)
    {
        if (!$pelada = $this->repository->find($idPelada)) {
            return redirect()->back();
        }

       $pelada->update($request->all());

       return redirect()->route('peladas.index')
                        ->with('message','Pelada Editada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPelada)
    {
        if (!$pelada = $this->repository->find($idPelada)) {
            return redirect()->back();
        }
    
       $pelada->delete();

       return redirect()->route('peladas.index')
                        ->with('message','Pelada Excluída com Sucesso!');
    }
}
