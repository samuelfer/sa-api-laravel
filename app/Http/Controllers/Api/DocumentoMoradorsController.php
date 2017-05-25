<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\DocumentoMoradorCreateRequest;
use SA\Http\Requests\DocumentoMoradorUpdateRequest;
use SA\Repositories\DocumentoMoradorRepository;
use SA\Validators\DocumentoMoradorValidator;


class DocumentoMoradorsController extends Controller
{

    /**
     * @var DocumentoMoradorRepository
     */
    protected $repository;

    /**
     * @var DocumentoMoradorValidator
     */
    protected $validator;

    public function __construct(DocumentoMoradorRepository $repository, DocumentoMoradorValidator $validator)
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
        $documentoMoradors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $documentoMoradors,
            ]);
        }

        return view('documentoMoradors.index', compact('documentoMoradors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DocumentoMoradorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoMoradorCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $documentoMorador = $this->repository->create($request->all());

            $response = [
                'message' => 'DocumentoMorador created.',
                'data'    => $documentoMorador->toArray(),
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
        $documentoMorador = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $documentoMorador,
            ]);
        }

        return view('documentoMoradors.show', compact('documentoMorador'));
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

        $documentoMorador = $this->repository->find($id);

        return view('documentoMoradors.edit', compact('documentoMorador'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  DocumentoMoradorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(DocumentoMoradorUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $documentoMorador = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'DocumentoMorador updated.',
                'data'    => $documentoMorador->toArray(),
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
                'message' => 'DocumentoMorador deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'DocumentoMorador deleted.');
    }
}
