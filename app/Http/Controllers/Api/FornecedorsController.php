<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\FornecedorCreateRequest;
use SA\Http\Requests\FornecedorUpdateRequest;
use SA\Repositories\FornecedorRepository;
use SA\Validators\FornecedorValidator;


class FornecedorsController extends Controller
{

    /**
     * @var FornecedorRepository
     */
    protected $repository;

    /**
     * @var FornecedorValidator
     */
    protected $validator;

    public function __construct(FornecedorRepository $repository, FornecedorValidator $validator)
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
        $fornecedors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $fornecedors,
            ]);
        }

        return view('fornecedors.index', compact('fornecedors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FornecedorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FornecedorCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $fornecedor = $this->repository->create($request->all());

            $response = [
                'message' => 'Fornecedor created.',
                'data'    => $fornecedor->toArray(),
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
        $fornecedor = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $fornecedor,
            ]);
        }

        return view('fornecedors.show', compact('fornecedor'));
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

        $fornecedor = $this->repository->find($id);

        return view('fornecedors.edit', compact('fornecedor'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  FornecedorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(FornecedorUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $fornecedor = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Fornecedor updated.',
                'data'    => $fornecedor->toArray(),
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
                'message' => 'Fornecedor deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Fornecedor deleted.');
    }
}
