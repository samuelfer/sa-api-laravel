<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\TermoCreateRequest;
use SA\Http\Requests\TermoUpdateRequest;
use SA\Repositories\TermoRepository;
use SA\Validators\TermoValidator;


class TermosController extends Controller
{

    /**
     * @var TermoRepository
     */
    protected $repository;

    /**
     * @var TermoValidator
     */
    protected $validator;

    public function __construct(TermoRepository $repository, TermoValidator $validator)
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
        $termos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $termos,
            ]);
        }

        return view('termos.index', compact('termos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TermoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TermoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $termo = $this->repository->create($request->all());

            $response = [
                'message' => 'Termo created.',
                'data'    => $termo->toArray(),
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
        $termo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $termo,
            ]);
        }

        return view('termos.show', compact('termo'));
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

        $termo = $this->repository->find($id);

        return view('termos.edit', compact('termo'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TermoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TermoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $termo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Termo updated.',
                'data'    => $termo->toArray(),
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
                'message' => 'Termo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Termo deleted.');
    }
}
