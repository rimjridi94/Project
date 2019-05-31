<?php namespace App\Http\Controllers;

use App\Http\Requests\EmailSettingsRequest;
use App\Invoicer\Repositories\Contracts\EmailSettingInterface as Setting;

use Laracasts\Flash\Flash;

class EmailSettingsController extends Controller {

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
		$setting = $this->setting->count() > 0 ?
            $this->setting
                ->where('user_uuid',\Auth::user()->uuid)
                ->get()
                ->first()
            : array();
		return view('settings.email.index', compact('setting'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EmailSettingsRequest $request)
	{
		$data =  array(
			'protocol'		=>$request->protocol,
			'smtp_host' 	=>$request->smtp_host,
			'smtp_username' =>$request->smtp_username,
			'smtp_password' =>$request->smtp_password,
			'smtp_port' 	=>$request->smtp_port,
            'user_uuid' => \Auth::user()->uuid
		);


		if($this->setting->create($data)){
			Flash::success('mise a jour Réussite');
		}
		else{
			Flash::error('mise a jour échoué');
		}
		return redirect('settings/email');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EmailSettingsRequest $request, $uuid)
	{
		$data =  array(
			'protocol'		=>$request->protocol,
			'smtp_host' 	=>$request->smtp_host,
			'smtp_username' =>$request->smtp_username,
			'smtp_password' =>$request->smtp_password,
			'smtp_port' 	=>$request->smtp_port,
            'user_uuid' => \Auth::user()->uuid
		);

		if($this->setting->updateById($uuid, $data)){
			Flash::success( 'mise a jour Réussite');
		}
		else{
			Flash::error( 'mise a jour échoué');
		}
		return redirect('settings/email');
	}

}
