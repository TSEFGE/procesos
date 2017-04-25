<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatEscolaridadRequest;
use App\Http\Requests\UpdateCatEscolaridadRequest;
use App\Repositories\CatEscolaridadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CatEscolaridadController extends AppBaseController
{
    /** @var  CatEscolaridadRepository */
    private $catEscolaridadRepository;

    public function __construct(CatEscolaridadRepository $catEscolaridadRepo)
    {
        $this->catEscolaridadRepository = $catEscolaridadRepo;
    }

    /**
     * Display a listing of the CatEscolaridad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catEscolaridadRepository->pushCriteria(new RequestCriteria($request));
        $catEscolaridads = $this->catEscolaridadRepository->all();

        return view('cat_escolaridads.index')
            ->with('catEscolaridads', $catEscolaridads);
    }

    /**
     * Show the form for creating a new CatEscolaridad.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_escolaridads.create');
    }

    /**
     * Store a newly created CatEscolaridad in storage.
     *
     * @param CreateCatEscolaridadRequest $request
     *
     * @return Response
     */
    public function store(CreateCatEscolaridadRequest $request)
    {
        $input = $request->all();

        $catEscolaridad = $this->catEscolaridadRepository->create($input);

        Flash::success('Cat Escolaridad saved successfully.');

        return redirect(route('catEscolaridads.index'));
    }

    /**
     * Display the specified CatEscolaridad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catEscolaridad = $this->catEscolaridadRepository->findWithoutFail($id);

        if (empty($catEscolaridad)) {
            Flash::error('Cat Escolaridad not found');

            return redirect(route('catEscolaridads.index'));
        }

        return view('cat_escolaridads.show')->with('catEscolaridad', $catEscolaridad);
    }

    /**
     * Show the form for editing the specified CatEscolaridad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catEscolaridad = $this->catEscolaridadRepository->findWithoutFail($id);

        if (empty($catEscolaridad)) {
            Flash::error('Cat Escolaridad not found');

            return redirect(route('catEscolaridads.index'));
        }

        return view('cat_escolaridads.edit')->with('catEscolaridad', $catEscolaridad);
    }

    /**
     * Update the specified CatEscolaridad in storage.
     *
     * @param  int              $id
     * @param UpdateCatEscolaridadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatEscolaridadRequest $request)
    {
        $catEscolaridad = $this->catEscolaridadRepository->findWithoutFail($id);

        if (empty($catEscolaridad)) {
            Flash::error('Cat Escolaridad not found');

            return redirect(route('catEscolaridads.index'));
        }

        $catEscolaridad = $this->catEscolaridadRepository->update($request->all(), $id);

        Flash::success('Cat Escolaridad updated successfully.');

        return redirect(route('catEscolaridads.index'));
    }

    /**
     * Remove the specified CatEscolaridad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catEscolaridad = $this->catEscolaridadRepository->findWithoutFail($id);

        if (empty($catEscolaridad)) {
            Flash::error('Cat Escolaridad not found');

            return redirect(route('catEscolaridads.index'));
        }

        $this->catEscolaridadRepository->delete($id);

        Flash::success('Cat Escolaridad deleted successfully.');

        return redirect(route('catEscolaridads.index'));
    }
}
