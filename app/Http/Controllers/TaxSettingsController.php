<?php namespace App\Http\Controllers;

use App\Http\Requests\TaxSettingFormRequest;
use App\Invoicer\Repositories\Contracts\TaxSettingInterface as Tax;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;


class TaxSettingsController extends Controller {

    private $tax;

    public function __construct(Tax $tax){
        $this->tax = $tax;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $taxes = $this->tax
            ->where('user_uuid', \Auth::user()->uuid)
            ->get();
		return view('settings.tax.index', compact('taxes'));
	}

    /**
     * Store a newly created resource in storage.
     * @param TaxSettingFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TaxSettingFormRequest $request)
	{
        $data = array('name' => $request->name, 'value' => $request->value, 'user_uuid' => \Auth::user()->uuid);
		if($this->tax->create($data)){
            Flash::success('mise a jour Réussite');
        }else{
            Flash::error('mise a jour échoué');
        }
        return redirect('settings/tax');
	}


	/**
	 * Show the form for editing the specified resource.
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tax = $this->tax->getById($id);
        return view('settings.tax.edit', compact('tax'));
	}

    /**
     * Update the specified resource in storage.
     * @param TaxSettingFormRequest $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(TaxSettingFormRequest $request, $id)
	{
		$data   =  array('name'=>$request->name, 'value'=>$request->value, 'selected' => $request->selected,  'user_uuid' => \Auth::user()->uuid);
        if($request->selected)
            $this->tax->resetDefault();

        if($this->tax->updateById($id, $data)){
            Flash::success('mise a jour Réussite');
            return Response::json(array('Succès' => true, 'msg' => 'taxea été mise à jour'), 201);
        }

        return Response::json(array('échoué' => false, 'msg' => 'mise à jour a échoué', 'errors' => $this->errorBag()), 422);
	}


	/**
	 * Remove the specified resource from storage.
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->tax->deleteById($id);
        Flash::success('Supression Réussite');
        return redirect('settings/tax');
	}

}
