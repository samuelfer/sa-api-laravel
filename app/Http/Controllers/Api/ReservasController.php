<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use SA\Http\Requests\ReservaRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\ReservaRepository;



class ReservasController extends Controller
{

    /**
     * @var ReservaRepository
     */
    protected $repository;

    public function __construct(ReservaRepository $repository)
    {
        $this->repository = $repository;
        //$this->repository->applyMultitenancy();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->with('bloco')->with('areaComum')->all();

        //$var = $this->repository->pluck('id_area_comum');
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
        //return $this->repository->findByField('id', $id);
        $reserva =  $this->repository->find($id);
        $reserva->bloco; //Pegando os blocos
        $reserva->areaComum->de_cadastro_reserva_area_comum;//Modelo do veiculo
        return response()->json($reserva, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ReservaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ReservaRequest $request)
    {
        $reserva = $this->repository->create($request->all());
        return response()->json($reserva, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ReservaRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ReservaRequest $request, $id)
    {
        $reserva = $this->repository->update($request->all(), $id);
        return response()->json($reserva, 200);
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

        return redirect()->back()->with('message', 'Reserva deleted.');
    }

    //AQUI EU TESTARIA O METODO QUE FIZ NO ReservaRepositoryEloquent
    public function getInadimplencia()
    {
        return $this->repository->getInadimplencia();
    }
}
