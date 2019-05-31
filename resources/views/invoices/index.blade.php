@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-file-pdf-o"></i> {{'Facture'}}</h1>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                    <div class="box-tools ">
                        <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> {{ 'nouveau facture'}}</a>
                    </div>
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{'Numéro de  facture'}}</th>
                            <th>{{'Etat'}}</th>
                            <th>{{'Client'}}</th>
                            <th>{{'Date échéance'}}</th>
                            <th class="text-right">{{'Montant'}}</th>
                            <th class="text-right">{{'Payé'}}</th>
                            <th class="text-right">{{'Montant depassé'}}</th>
                            <th>{{'Action'}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                        <tr>
                            <td></td>
                            <td>{{ $invoice->number }} </td>
                            <td ><span class="label {{ statuses()[$invoice->status]['class'] }}">{{ ucwords(statuses()[$invoice->status]['label']) }} </span></td>
                            <td><a href="{{ route('clients.show', $invoice->client_id ) }}">{{ $invoice->client->name }}</a> </td>
                            <td>{{ $invoice->due_date }} </td>
                            <td class="text-right">{{ $invoice->currency.''.$invoice->totals['grandTotal'] }} </td>
                            <td class="text-right">{{ $invoice->currency.''.$invoice->totals['paid'] }} </td>
                            <td class="text-right">{{ $invoice->currency.''.$invoice->totals['amountDue'] }} </td>
                            <td>
                                <a href="{!! route('invoices.show',$invoice->uuid) !!}" data-rel="tooltip" data-placement="top" title="View invoice" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>  </a>
                                <a href="{!! url('invoices/send',$invoice->uuid) !!}" data-rel="tooltip" data-placement="top" title="Send invoice" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i> </a>
                                <a href="{!! route('payments.create','invoice_id='.$invoice->uuid) !!}" data-rel="tooltip" data-toggle="ajax-modal" data-placement="top" title="Add Payment" class="btn btn-sm btn-warning"><i class="fa fa-money"></i> </a>
                                <a href="{!! route('invoices.edit',$invoice->uuid) !!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> {{'Modifier'}} </a>
                                <a href="{!! route('invoices.edit',[$invoice->uuid,'avoir=1']) !!}" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> {{'Afficher'}} </a>
                                {!! delete_btn('invoices.destroy', $invoice->uuid) !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End  Hover Rows  -->
        </div>
    </div>
</section>
@endsection

