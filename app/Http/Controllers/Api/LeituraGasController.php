<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\LeituraGasCreateRequest;
use SA\Http\Requests\LeituraGasUpdateRequest;
use SA\Repositories\LeituraGasRepository;
use SA\Validators\LeituraGasValidator;


class LeituraGasController extends Controller
{

    /**
     * @var LeituraGasRepository
     */
    protected $repository;

    /**
     * @var LeituraGasValidator
     */
    protected $validator;

    public function __construct(LeituraGasRepository $repository, LeituraGasValidator $validator)
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
        $leituraGas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $leituraGas,
            ]);
        }

        return view('leituraGas.index', compact('leituraGas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LeituraGasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LeituraGasCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $leituraGa = $this->repository->create($request->all());

            $response = [
                'message' => 'LeituraGas created.',
                'data'    => $leituraGa->toArray(),
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
        $leituraGa = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $leituraGa,
            ]);
        }

        return view('leituraGas.show', compact('leituraGa'));
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

        $leituraGa = $this->repository->find($id);

        return view('leituraGas.edit', compact('leituraGa'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  LeituraGasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(LeituraGasUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $leituraGa = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'LeituraGas updated.',
                'data'    => $leituraGa->toArray(),
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
                'message' => 'LeituraGas deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'LeituraGas deleted.');
    }
}
