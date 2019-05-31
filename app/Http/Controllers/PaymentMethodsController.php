<?php namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodFromRequest;
use App\Invoicer\Repositories\Contracts\PaymentMethodInterface as Payment;

use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;


class PaymentMethodsController extends Controller {

    private $payment;

    public function __construct(Payment $payment){
        $this->payment = $payment;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $payment_methods = $this->payment
            ->where('user_uuid', \Auth::user()->uuid)
            ->get()
        ;
        return view('settings.payment.index', compact('payment_methods'));
	}
    /**
     * Store a newly created resource in storage.
     * @param PaymentMethodFromRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PaymentMethodFromRequest $request)
	{
		$data = array('name' => $request->name,'user_uuid' => \Auth::user()->uuid);
        if($this->payment->create($data))
            Flash::success('Creation Réussite.');
        else
            Flash::error( ' Creation échoué, essayez à nouveau');

        return redirect('settings/payment');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$payment = $this->payment->getById($id);
        return view('settings.payment.edit', compact('payment'));
	}

    /**
     * Update the specified resource in storage.
     * @param PaymentMethodFromRequest $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(PaymentMethodFromRequest $request, $id)
	{
		$data = array('name' => $request->name, 'selected' => $request->selected,'user_uuid' => \Auth::user()->uuid);

        if($request->selected)
            $this->payment->resetDefault();

        if($this->payment->updateById($id, $data)){
            Flash::success('mise a jour Réussite');
            return Response::json(array('Succès' => true, 'msg' => '
méthode de paiement mise à jour '), 200);
        }
        return Response::json(array('échoué' => false, 'msg' =>' désolé mise à jour a échoué. S’il vous plaît essayer de nouveau'), 422);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->payment->deleteById($id))
            Flash::success('Supression Réussite');
        else
            Flash::error('Désolé, suppression échoué. Réessayez.');
        return redirect('settings/payment');
	}

}
