<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\CboCreateRequest;
use SA\Http\Requests\CboUpdateRequest;
use SA\Repositories\CboRepository;
use SA\Validators\CboValidator;


class CbosController extends Controller
{

    /**
     * @var CboRepository
     */
    protected $repository;

    /**
     * @var CboValidator
     */
    protected $validator;

    public function __construct(CboRepository $repository, CboValidator $validator)
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
        $cbos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cbos,
            ]);
        }

        return view('cbos.index', compact('cbos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CboCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CboCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $cbo = $this->repository->create($request->all());

            $response = [
                'message' => 'Cbo created.',
                'data'    => $cbo->toArray(),
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
        $cbo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cbo,
            ]);
        }

        return view('cbos.show', compact('cbo'));
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

        $cbo = $this->repository->find($id);

        return view('cbos.edit', compact('cbo'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CboUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CboUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $cbo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Cbo updated.',
                'data'    => $cbo->toArray(),
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
                'message' => 'Cbo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cbo deleted.');
    }
}
