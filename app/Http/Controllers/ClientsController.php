<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ClientFormRequest;
use App\Invoicer\Repositories\Contracts\ClientInterface as Client;
use App\Invoicer\Repositories\Contracts\InvoiceInterface as Invoice;
use App\Invoicer\Repositories\Contracts\EstimateInterface as Estimate;
use App\Invoicer\Repositories\Contracts\NumberSettingInterface as Number;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class ClientsController extends Controller {

    private $client, $invoice, $estimate, $number;


    public function __construct(Client $client, Invoice $invoice, Estimate $estimate, Number $number){
        $this->client = $client;
        $this->invoice = $invoice;
        $this->estimate = $estimate;
        $this->number = $number;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $clients = $this->client
            ->where('user_uuid',\Auth::user()->uuid)
            ->get()
        ;
		return view('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $client_num = $this->number->prefix('client_number', $this->client->generateClientNum());
		return view('clients.create', compact('client_num'));
	}

    /**
     * Store a newly created resource in storage.
     * @param ClientFormRequest $request
     * @return Response
     */
    public function store(ClientFormRequest $request)
	{
        if($this->client->create($request->all())){
            Flash::success('Création Réussite');
            return Response::json(array('Succès' => true, 'msg' => 'Creation Réussite'), 200);
        }
        return Response::json(array('echoué' => false, 'msg' => 'Creation echoué'), 422);
	}


    /**
     * Show the form for editing the specified resource.
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($uuid)
	{
		$client = $this->client->getById($uuid);
        if($client)
            return view('clients.edit',  compact('client'));
        else
            return redirect('clients');
	}

    /**
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */

    public function show($uuid){
        $client = $this->client->with('invoices', 'estimates')->getById($uuid);
        if($client){
            foreach($client->invoices as $count => $invoice){
                $client->invoices[$count]['totals'] = $this->invoice->invoiceTotals($invoice->uuid);
            }
            foreach($client->estimates as $count => $estimate){
                $client->estimates[$count]['totals'] = $this->estimate->estimateTotals($estimate->uuid);
            }
            return view('clients.show', compact('client'));
        }
        return redirect('clients');
    }

    /**
     * Update the specified resource in storage.
     * @param ClientFormRequest $request
     * @param $uuid
     * @return Response
     *
     */
    public function update(ClientFormRequest $request, $uuid)
	{
        if($this->client->updateById($uuid, $request->all())){
            Flash::success('Mise a jour Réussite');
            return Response::json(array('Succès'=>true, 'msg' => 'Mise a jour Réussite'), 200);
        }
        return Response::json(array('echoué' => false, 'msg' =>  ' désolé mise à jour a échoué S’il vous plaît essayer de nouveau' ), 422);
	}


    /**
     * Remove the specified resource from storage.
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($uuid)
	{
		$this->client->deleteById($uuid);
        Flash::success('Suppression Réussite');
        return redirect('clients');
	}

}
