<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\BloqueioPeriodoCreateRequest;
use SA\Http\Requests\BloqueioPeriodoUpdateRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\BloqueioPeriodoRepository;


class BloqueioPeriodosController extends Controller
{

    /**
     * @var BloqueioPeriodoRepository
     */
    protected $repository;

    public function __construct(BloqueioPeriodoRepository $repository)
    {
        $this->repository = $repository;
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
     * @param  BloqueioPeriodoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BloqueioPeriodoCreateRequest $request)
    {
        $bloqueio_periodo = $this->repository->create($request->all());
        return response()->json($bloqueio_periodo, 201);
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
        return $this->repository->findByField('id_bloqueio', $id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BloqueioPeriodoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BloqueioPeriodoUpdateRequest $request, $id)
    {

        $bloqueio_periodo = $this->repository->update($request->all(), $id);
        return response()->json($bloqueio_periodo, 200);
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

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'BloqueioPeriodo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'BloqueioPeriodo deleted.');
    }
}
