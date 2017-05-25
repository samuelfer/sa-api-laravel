<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\RetornoCreateRequest;
use SA\Http\Requests\RetornoUpdateRequest;
use SA\Repositories\RetornoRepository;
use SA\Validators\RetornoValidator;


class RetornosController extends Controller
{

    /**
     * @var RetornoRepository
     */
    protected $repository;

    /**
     * @var RetornoValidator
     */
    protected $validator;

    public function __construct(RetornoRepository $repository, RetornoValidator $validator)
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
        $retornos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $retornos,
            ]);
        }

        return view('retornos.index', compact('retornos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RetornoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RetornoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $retorno = $this->repository->create($request->all());

            $response = [
                'message' => 'Retorno created.',
                'data'    => $retorno->toArray(),
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
        $retorno = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $retorno,
            ]);
        }

        return view('retornos.show', compact('retorno'));
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

        $retorno = $this->repository->find($id);

        return view('retornos.edit', compact('retorno'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RetornoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(RetornoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $retorno = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Retorno updated.',
                'data'    => $retorno->toArray(),
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
                'message' => 'Retorno deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Retorno deleted.');
    }
}
