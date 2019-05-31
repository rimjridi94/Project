<?php namespace App\Http\Controllers;

use App\Http\Requests\PaymentFormRequest;
use App\Invoicer\Repositories\Contracts\PaymentInterface as Payment;
use App\Invoicer\Repositories\Contracts\PaymentMethodInterface as PaymentMethod;
use App\Invoicer\Repositories\Contracts\InvoiceInterface as Invoice;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;


class PaymentsController extends Controller {

    protected $payment, $invoice,$paymentmethod;

    public function __construct(Payment $payment, PaymentMethod $paymentmethod, Invoice $invoice){
        $this->payment = $payment;
        $this->paymentmethod = $paymentmethod;
        $this->invoice = $invoice;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $payments = $this->payment->with('invoice')
            ->where( 'user_uuid' , \Auth::user()->uuid)
            ->all();
		return view('payments.index', compact('payments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $invoice_id = Input::get('invoice_id');
        if($invoice_id){
            $invoice = $this->invoice->with('client')->getById($invoice_id);
            $invoice->totals = $this->invoice->invoiceTotals($invoice_id);
        }
        else
            $invoice = null;
        $methods = $this->paymentmethod->paymentMethodSelect();
		return view('payments.create', compact('methods','invoice'));
	}

    /**
     * Store a newly created resource in storage.
     * @param PaymentFormRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(PaymentFormRequest $request)
	{
		$payment = [
            'invoice_id' => $request->get('invoice_id'),
            'payment_date' => date('Y-m-d', strtotime($request->get('payment_date'))),
            'amount' => $request->get('amount'),
            'method' => $request->get('method'),
            'user_uuid'     => \Auth::user()->uuid,
            'notes' => $request->get('notes')
        ];

        if($this->payment->create($payment)){
            $this->invoice->changeStatus($request->get('invoice_id'));
            Flash::success(trans('application.record_created'));
            return Response::json(array('Succès' => true, 'msg' => 'Creation Réussite.'), 200);
        }
        return Response::json(array('échoué' => false, 'msg' =>'Creation échoué.'), 400);
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $methods = $this->paymentmethod->paymentMethodSelect();
		$payment = $this->payment->with('invoice')->getById($id);
        return view('payments.edit', compact('payment','methods'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(PaymentFormRequest $request, $id)
	{
        $payment = [
            'payment_date' => date('Y-m-d', strtotime($request->get('payment_date'))),
            'amount' => $request->get('amount'),
            'method' => $request->get('method'),
            'user_uuid'     => \Auth::user()->uuid,
            'notes' => $request->get('notes')
        ];
        if($request->get('invoice_id') != ''){
            $payment['invoice_id'] = $request->get('invoice_id');
        }

        if($this->payment->updateById($id, $payment)){
            $payment = $this->payment->getById($id);
            $this->invoice->changeStatus($payment->invoice_id);
            Flash::success('mise a jour Réussite');
            return Response::json(array('Succès' => true, 'msg' => 'mise a jour Réussite'), 200);
        }
        return Response::json(array('échoué' => false, 'msg' =>  'Désolé, mise a jour échoué. Réessayez.'), 400);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $payment = $this->payment->getById($id);
        if($this->payment->deleteById($id)){
            Flash::success( 'Supression Réussite');
            $this->invoice->changeStatus($payment->invoice_id);
        }
        else {
            Flash::error('Désolé, suppression echoué. Réessayez.');
        }
        return redirect('payments');
	}

}
