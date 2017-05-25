<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\DocumentoFuncionarioCreateRequest;
use SA\Http\Requests\DocumentoFuncionarioUpdateRequest;
use SA\Repositories\DocumentoFuncionarioRepository;
use SA\Validators\DocumentoFuncionarioValidator;


class DocumentoFuncionariosController extends Controller
{

    /**
     * @var DocumentoFuncionarioRepository
     */
    protected $repository;

    /**
     * @var DocumentoFuncionarioValidator
     */
    protected $validator;

    public function __construct(DocumentoFuncionarioRepository $repository, DocumentoFuncionarioValidator $validator)
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
        $documentoFuncionarios = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $documentoFuncionarios,
            ]);
        }

        return view('documentoFuncionarios.index', compact('documentoFuncionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DocumentoFuncionarioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoFuncionarioCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $documentoFuncionario = $this->repository->create($request->all());

            $response = [
                'message' => 'DocumentoFuncionario created.',
                'data'    => $documentoFuncionario->toArray(),
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
        $documentoFuncionario = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $documentoFuncionario,
            ]);
        }

        return view('documentoFuncionarios.show', compact('documentoFuncionario'));
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

        $documentoFuncionario = $this->repository->find($id);

        return view('documentoFuncionarios.edit', compact('documentoFuncionario'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  DocumentoFuncionarioUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(DocumentoFuncionarioUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $documentoFuncionario = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'DocumentoFuncionario updated.',
                'data'    => $documentoFuncionario->toArray(),
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
                'message' => 'DocumentoFuncionario deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'DocumentoFuncionario deleted.');
    }
}
