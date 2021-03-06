<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Requests;
use App\Http\Requests\Services\CreateServicesRequest;
use App\Http\Requests\Services\UpdateServicesRequest;
use App\Repositories\Services\ServicesRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Services\Services;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServicesController extends InfyOmBaseController
{
    /** @var  ServicesRepository */
    private $servicesRepository;

    public function __construct(ServicesRepository $servicesRepo)
    {
        $this->servicesRepository = $servicesRepo;
    }

    /**
     * Display a listing of the Services.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->servicesRepository->pushCriteria(new RequestCriteria($request));
        $services = $this->servicesRepository->all();
        return view('admin.services.services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Services.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.services.services.create');
    }

    /**
     * Store a newly created Services in storage.
     *
     * @param CreateServicesRequest $request
     *
     * @return Response
     */
    public function store(CreateServicesRequest $request)
    {
        $input = $request->all();

        $services = $this->servicesRepository->create($input);

        Flash::success('Services saved successfully.');

        return redirect(route('admin.services.services.index'));
    }

    /**
     * Display the specified Services.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $services = $this->servicesRepository->findWithoutFail($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('services.index'));
        }

        return view('admin.services.services.show')->with('services', $services);
    }

    /**
     * Show the form for editing the specified Services.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $services = $this->servicesRepository->findWithoutFail($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('services.index'));
        }

        return view('admin.services.services.edit')->with('services', $services);
    }

    /**
     * Update the specified Services in storage.
     *
     * @param  int              $id
     * @param UpdateServicesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicesRequest $request)
    {
        $services = $this->servicesRepository->findWithoutFail($id);

        

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('services.index'));
        }

        $services = $this->servicesRepository->update($request->all(), $id);

        Flash::success('Services updated successfully.');

        return redirect(route('admin.services.services.index'));
    }

    /**
     * Remove the specified Services from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.services.services.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Services::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.services.services.index'))->with('success', Lang::get('message.success.delete'));

       }

}
