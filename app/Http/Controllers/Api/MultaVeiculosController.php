<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\MultaVeiculoCreateRequest;
use SA\Http\Requests\MultaVeiculoUpdateRequest;
use SA\Repositories\MultaVeiculoRepository;
use SA\Validators\MultaVeiculoValidator;


class MultaVeiculosController extends Controller
{

    /**
     * @var MultaVeiculoRepository
     */
    protected $repository;

    /**
     * @var MultaVeiculoValidator
     */
    protected $validator;

    public function __construct(MultaVeiculoRepository $repository, MultaVeiculoValidator $validator)
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
        $multaVeiculos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $multaVeiculos,
            ]);
        }

        return view('multaVeiculos.index', compact('multaVeiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MultaVeiculoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MultaVeiculoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $multaVeiculo = $this->repository->create($request->all());

            $response = [
                'message' => 'MultaVeiculo created.',
                'data'    => $multaVeiculo->toArray(),
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
        $multaVeiculo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $multaVeiculo,
            ]);
        }

        return view('multaVeiculos.show', compact('multaVeiculo'));
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

        $multaVeiculo = $this->repository->find($id);

        return view('multaVeiculos.edit', compact('multaVeiculo'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MultaVeiculoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MultaVeiculoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $multaVeiculo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'MultaVeiculo updated.',
                'data'    => $multaVeiculo->toArray(),
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
                'message' => 'MultaVeiculo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MultaVeiculo deleted.');
    }
}
