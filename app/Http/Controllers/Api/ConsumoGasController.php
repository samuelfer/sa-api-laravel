<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\ConsumoGasCreateRequest;
use SA\Http\Requests\ConsumoGasUpdateRequest;
use SA\Repositories\ConsumoGasRepository;
use SA\Validators\ConsumoGasValidator;


class ConsumoGasController extends Controller
{

    /**
     * @var ConsumoGasRepository
     */
    protected $repository;

    /**
     * @var ConsumoGasValidator
     */
    protected $validator;

    public function __construct(ConsumoGasRepository $repository, ConsumoGasValidator $validator)
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
        $consumoGas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $consumoGas,
            ]);
        }

        return view('consumoGas.index', compact('consumoGas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConsumoGasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ConsumoGasCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $consumoGa = $this->repository->create($request->all());

            $response = [
                'message' => 'ConsumoGas created.',
                'data'    => $consumoGa->toArray(),
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
        $consumoGa = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $consumoGa,
            ]);
        }

        return view('consumoGas.show', compact('consumoGa'));
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

        $consumoGa = $this->repository->find($id);

        return view('consumoGas.edit', compact('consumoGa'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ConsumoGasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ConsumoGasUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $consumoGa = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ConsumoGas updated.',
                'data'    => $consumoGa->toArray(),
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
                'message' => 'ConsumoGas deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ConsumoGas deleted.');
    }
}
