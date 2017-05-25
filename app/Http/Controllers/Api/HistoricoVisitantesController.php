<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\HistoricoVisitanteCreateRequest;
use SA\Http\Requests\HistoricoVisitanteUpdateRequest;
use SA\Repositories\HistoricoVisitanteRepository;
use SA\Validators\HistoricoVisitanteValidator;


class HistoricoVisitantesController extends Controller
{

    /**
     * @var HistoricoVisitanteRepository
     */
    protected $repository;

    /**
     * @var HistoricoVisitanteValidator
     */
    protected $validator;

    public function __construct(HistoricoVisitanteRepository $repository, HistoricoVisitanteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $historicoVisitantes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $historicoVisitantes,
            ]);
        }

        return view('historicoVisitantes.index', compact('historicoVisitantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HistoricoVisitanteCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(HistoricoVisitanteCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $historicoVisitante = $this->repository->create($request->all());

            $response = [
                'message' => 'HistoricoVisitante created.',
                'data'    => $historicoVisitante->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $historicoVisitante = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $historicoVisitante,
            ]);
        }

        return view('historicoVisitantes.show', compact('historicoVisitante'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $historicoVisitante = $this->repository->find($id);

        return view('historicoVisitantes.edit', compact('historicoVisitante'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  HistoricoVisitanteUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(HistoricoVisitanteUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $historicoVisitante = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'HistoricoVisitante updated.',
                'data'    => $historicoVisitante->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
                'message' => 'HistoricoVisitante deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'HistoricoVisitante deleted.');
    }
}
