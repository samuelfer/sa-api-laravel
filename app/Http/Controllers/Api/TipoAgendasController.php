<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\TipoAgendaCreateRequest;
use SA\Http\Requests\TipoAgendaUpdateRequest;
use SA\Repositories\TipoAgendaRepository;
use SA\Validators\TipoAgendaValidator;


class TipoAgendasController extends Controller
{

    /**
     * @var TipoAgendaRepository
     */
    protected $repository;

    /**
     * @var TipoAgendaValidator
     */
    protected $validator;

    public function __construct(TipoAgendaRepository $repository, TipoAgendaValidator $validator)
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
        $tipoAgendas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoAgendas,
            ]);
        }

        return view('tipoAgendas.index', compact('tipoAgendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TipoAgendaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TipoAgendaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tipoAgenda = $this->repository->create($request->all());

            $response = [
                'message' => 'TipoAgenda created.',
                'data'    => $tipoAgenda->toArray(),
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
        $tipoAgenda = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tipoAgenda,
            ]);
        }

        return view('tipoAgendas.show', compact('tipoAgenda'));
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

        $tipoAgenda = $this->repository->find($id);

        return view('tipoAgendas.edit', compact('tipoAgenda'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TipoAgendaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TipoAgendaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tipoAgenda = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TipoAgenda updated.',
                'data'    => $tipoAgenda->toArray(),
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
                'message' => 'TipoAgenda deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TipoAgenda deleted.');
    }
}
