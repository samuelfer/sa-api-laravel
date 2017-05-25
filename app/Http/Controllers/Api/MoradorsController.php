<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\MoradorCreateRequest;
use SA\Http\Requests\MoradorUpdateRequest;
use SA\Repositories\MoradorRepository;
use SA\Validators\MoradorValidator;


class MoradorsController extends Controller
{

    /**
     * @var MoradorRepository
     */
    protected $repository;

    /**
     * @var MoradorValidator
     */
    protected $validator;

    public function __construct(MoradorRepository $repository, MoradorValidator $validator)
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
        $moradors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $moradors,
            ]);
        }

        return view('moradors.index', compact('moradors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MoradorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MoradorCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $morador = $this->repository->create($request->all());

            $response = [
                'message' => 'Morador created.',
                'data'    => $morador->toArray(),
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
        $morador = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $morador,
            ]);
        }

        return view('moradors.show', compact('morador'));
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

        $morador = $this->repository->find($id);

        return view('moradors.edit', compact('morador'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MoradorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MoradorUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $morador = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Morador updated.',
                'data'    => $morador->toArray(),
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
                'message' => 'Morador deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Morador deleted.');
    }
}
