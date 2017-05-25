<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\MultaCreateRequest;
use SA\Http\Requests\MultaUpdateRequest;
use SA\Repositories\MultaRepository;
use SA\Validators\MultaValidator;


class MultasController extends Controller
{

    /**
     * @var MultaRepository
     */
    protected $repository;

    /**
     * @var MultaValidator
     */
    protected $validator;

    public function __construct(MultaRepository $repository, MultaValidator $validator)
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
        $multas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $multas,
            ]);
        }

        return view('multas.index', compact('multas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MultaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MultaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $multum = $this->repository->create($request->all());

            $response = [
                'message' => 'Multa created.',
                'data'    => $multum->toArray(),
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
        $multum = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $multum,
            ]);
        }

        return view('multas.show', compact('multum'));
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

        $multum = $this->repository->find($id);

        return view('multas.edit', compact('multum'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MultaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MultaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $multum = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Multa updated.',
                'data'    => $multum->toArray(),
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
                'message' => 'Multa deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Multa deleted.');
    }
}
