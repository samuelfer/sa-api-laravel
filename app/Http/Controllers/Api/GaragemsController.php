<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\GaragemCreateRequest;
use SA\Http\Requests\GaragemUpdateRequest;
use SA\Repositories\GaragemRepository;
use SA\Validators\GaragemValidator;


class GaragemsController extends Controller
{

    /**
     * @var GaragemRepository
     */
    protected $repository;

    /**
     * @var GaragemValidator
     */
    protected $validator;

    public function __construct(GaragemRepository $repository, GaragemValidator $validator)
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
        $garagems = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $garagems,
            ]);
        }

        return view('garagems.index', compact('garagems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GaragemCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GaragemCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $garagem = $this->repository->create($request->all());

            $response = [
                'message' => 'Garagem created.',
                'data'    => $garagem->toArray(),
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
        $garagem = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $garagem,
            ]);
        }

        return view('garagems.show', compact('garagem'));
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

        $garagem = $this->repository->find($id);

        return view('garagems.edit', compact('garagem'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  GaragemUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(GaragemUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $garagem = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Garagem updated.',
                'data'    => $garagem->toArray(),
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
                'message' => 'Garagem deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Garagem deleted.');
    }
}
