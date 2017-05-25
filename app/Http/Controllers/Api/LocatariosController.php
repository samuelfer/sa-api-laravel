<?php

namespace SA\Http\Controllers;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\LocatarioCreateRequest;
use SA\Http\Requests\LocatarioUpdateRequest;
use SA\Repositories\LocatarioRepository;
use SA\Validators\LocatarioValidator;


class LocatariosController extends Controller
{

    /**
     * @var LocatarioRepository
     */
    protected $repository;

    /**
     * @var LocatarioValidator
     */
    protected $validator;

    public function __construct(LocatarioRepository $repository, LocatarioValidator $validator)
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
        $locatarios = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $locatarios,
            ]);
        }

        return view('locatarios.index', compact('locatarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LocatarioCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LocatarioCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $locatario = $this->repository->create($request->all());

            $response = [
                'message' => 'Locatario created.',
                'data'    => $locatario->toArray(),
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
        $locatario = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $locatario,
            ]);
        }

        return view('locatarios.show', compact('locatario'));
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

        $locatario = $this->repository->find($id);

        return view('locatarios.edit', compact('locatario'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  LocatarioUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(LocatarioUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $locatario = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Locatario updated.',
                'data'    => $locatario->toArray(),
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
                'message' => 'Locatario deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Locatario deleted.');
    }
}
