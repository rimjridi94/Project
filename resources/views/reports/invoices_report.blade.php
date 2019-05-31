<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('client_id', 'Client') !!}
        {!! Form::select('client',$clients,null, ['class' => 'form-control input-sm chosen', 'id' => 'client_id', 'required']) !!}
    </div>
</div>

<div class="col-md-3">
    <label> </label>
    <div class="form-group">
        <a href="javascript: void(0);" onclick="javascript: invoices_report();" class="btn btn-large btn-sm btn-success"  style="margin:6px"><i class="fa fa-check"></i> {{'Générer Rapport' }} </a>
    </div>
</div>
<div class="col-md-12">
<table class="table table-hover table-bordered ">
    <thead>
    <tr class="table_header">
        <th>{{ 'Etat'}}</th>
        <th>{{ 'Numéro de factures ' }}</th>
        <th>{{ 'Date' }} </th>
        <th>{{ 'Client'}}</th>
        <th class="text-right">{{'Montant'}}</th>
        <th class="text-right">{{'Payé'}}</th>
        <th class="text-right">{{'Montant depassé'}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td><span class="label {{ statuses()[$invoice->status]['class'] }}">{{ strtoupper(statuses()[$invoice->status]['label']) }}</span></td>
            <td><a href="{{ route('invoices.show', $invoice->uuid) }}">{{ $invoice->number }}</a></td>
            <td>{{ $invoice->invoice_date }}</td>
            <td><a href="{{ route('clients.show', $invoice->client_id ) }}">{{ $invoice->client->name }}</a></td>
            <td class="text-right">{{ $invoice->currency.''.$invoice->totals['grandTotal'] }} </td>
            <td class="text-right">{{ $invoice->currency.''.$invoice->totals['paidFormatted'] }} </td>
            <td class="text-right">{{ $invoice->currency.''.$invoice->totals['amountDue'] }} </td>
        </tr>


    @endforeach
    </tbody>
</table>
</div>