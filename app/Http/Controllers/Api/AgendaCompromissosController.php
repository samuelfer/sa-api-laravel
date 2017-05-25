<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\AgendaCompromissoRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AgendaCompromissoRepository;



class AgendaCompromissosController extends Controller
{

    /**
     * @var AgendaCompromissoRepository
     */
    protected $repository;

    public function __construct(AgendaCompromissoRepository $repository)
    {
        return $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AgendaCompromissoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaCompromissoRequest $request)
    {
        $agenda_compromisso = $this->repository->create($request->all());
        return response()->json($agenda_compromisso, 201);
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
        return $this->repository->findByField('id_agenda', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AgendaCompromissoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AgendaCompromissoUpdateRequest $request, $id)
    {
        $agenda_compromisso = $this->repository->update($request->all(), $id);
        return response()->json($agenda_compromisso, 200);
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
        } else {
            return response()->json(['error' => 'Resource can not b deleted'], 500);
        }

        return redirect()->back()->with('message', 'Agenda Compromisso deleted.');
    }
}
