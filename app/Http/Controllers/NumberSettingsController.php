<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Invoicer\Repositories\Contracts\NumberSettingInterface as Setting;
use Laracasts\Flash\Flash;

class NumberSettingsController extends Controller {
    private $setting;

    public function __construct(Setting $setting){
        $this->setting = $setting;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if($this->setting->count() > 0)
            $setting = $this->setting
                ->where('user_uuid', \Auth::user()->uuid)
                ->get()
                ->first()
            ;
        else
            $setting = array();

		return view('settings.number', compact('setting'));
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $data =  array(
            'invoice_number'  => \Input::get('invoice_number'),
            'client_number'   => \Input::get('client_number'),
            'estimate_number' => \Input::get('estimate_number'),
            'user_uuid' => \Auth::user()->uuid
        );

        if($this->setting->create($data)){
            Flash::success('mise a jour Réussite');
        }
        else{
            Flash::error('mise a jour échoué');
        }
        return redirect('settings/number');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $data =  array(
            'invoice_number'  => \Input::get('invoice_number'),
            'client_number'   => \Input::get('client_number'),
            'estimate_number' => \Input::get('estimate_number'),
            'user_uuid' => \Auth::user()->uuid
        );

        if($this->setting->updateById($id, $data)){
            Flash::success('mise a jour Réussite');
        }
        else{
            Flash::error('mise a jour échoué');
        }
        return redirect('settings/number');
	}


}
