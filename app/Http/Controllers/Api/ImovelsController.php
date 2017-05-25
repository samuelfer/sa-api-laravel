<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Controllers\Response;
use SA\Http\Requests\imovelRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\ImovelRepository;


class ImovelsController extends Controller
{

    /**
     * @var ImovelRepository
     */
    protected $repository;

    //protected $category;

    public function __construct(ImovelRepository $repository)
    {
        $this->repository = $repository;
        //$this->category = $category;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //('dashboard')->with('status', 'Profile updated!');
        return $this->repository->with('bloco')->with('tipoSituacao')->paginate(15);
        //return $this->repository->paginate(5);
        //dd($var);

        //CHECAR SE O USUARIO ESTA AUTENTICADO
        //if (Auth::check()) {}

        //EXIBIR O NOME DO USUARIO AUTENTICADO
        // Get the currently authenticated user...
        //dd($user = Auth::user()->name);
        // Get the currently authenticated user's ID...
       //$id = Auth::id();
       //if ($id <> 2){
       //    echo "Voce nao pode ver a listagem";
       //}else{
           //return $this->repository->all();
      // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imovel = $this->repository->find($id);
        $imovel->bloco; //Pegando os blocos
        $imovel->tipoSituacao;//Pegando os tipos de situacao de imovel
        return response()->json($imovel, 201);
    }

    //Pegando os comunicados do imovel
    public function comunicado($id)
    {
        $imovel = $this->repository->find($id);
        $imovel->comunicado;
        return response()->json($imovel, 201);
    }


    //Pegando os faleconoscos do imovel
    public function faleconosco($id)
    {
        $imovel = $this->repository->find($id);
        $imovel->faleConosco;
        return response()->json($imovel, 201);
    }

    //Pegando os faleconoscos do imovel
    public function correspondencia($id)
    {
        $imovel = $this->repository->find($id);
        $imovel->correspondencia;
        return response()->json($imovel, 201);
    }

    //Pegando os faleconoscos do imovel
    public function ocorrenciaMorador($id)
    {
        $imovel = $this->repository->find($id);
        $imovel->ocorrenciaMorador;
        return response()->json($imovel, 201);
    }

    //Pegando os faleconoscos do imovel
    public function visita($id)
    {
        $imovel = $this->repository->find($id);
        $imovel->visita;
        return response()->json($imovel, 201);
    }

//    public function teste($id)
//    {
//        $teste = DB::table('comunicacaos')->select('id_comunicacao', 'dt_comunicacao')->where('id_numero_imovel', $id)->get();
//        dd($teste);
//    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  imovelRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(imovelRequest $request)
    {

        $imovel = $this->repository->create($request->all());
        return response()->json($imovel, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ImovelUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ImovelRequest $request, $id)
    {
        $imovel = $this->repository->update($request->all(), $id);
        return response()->json($imovel, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if ($deleted) {
            return response()->json([], 204);
        }else{
            return response()->json(['error' => 'Resource can not b deleted'], 500);
        }

        return redirect()->back()->with('message', 'Imovel deleted.');
    }
}
