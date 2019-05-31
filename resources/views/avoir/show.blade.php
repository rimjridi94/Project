@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-quote-left"></i> {{'AFFICHER'}}</h1>
</div>
<section class="content">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="row">
                    <div class="col-md-6" style="width:1035px;margin-left:20px"><br/>
                        @if (Session::has('flash_notification.message'))
                            {!! message() !!}
                        @endif
                    <a href="{{ route('invoices.index') }}" class="btn btn-info btn-sm"> <i class="fa fa-chevron-left"></i> {{'Retour '}}</a>
                    <a href="{{ url('invoices/send', $invoice->uuid) }}" class="btn btn-success btn-sm pull-right" style="margin-left: 5px"> <i class="fa fa-share"></i> {{'Envoyer'}}</a>
                    <a href="{{ url('invoices/pdf', $invoice->uuid) }}" target="_blank" class="btn btn-primary btn-sm pull-right" style="margin-left: 5px"> <i class="fa fa-download"></i> {{'Télécherger'}}</a>
                    <a href="{{ route('invoices.edit', $invoice->uuid) }}" class="btn btn-warning btn-sm pull-right" > <i class="fa fa-pencil"></i> {{'Modifier'}}</a>
                </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="invoice">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel-body">
                                        @if($invoiceSettings && $invoiceSettings->logo != '')
                                        <img src="{{ asset('assets/img/'.$invoiceSettings->logo) }}" alt="logo" width="60%"/>
                                        @endif
                                     </div>
                                </div>
                                <div class="col-md-9 text-right">
                                    <div class="panel-body">
                                        <div class="col-xs-12 text-right"> <h1>{{'Avoir'}}</h1></div>
                                        <div class="col-xs-9 text-right invoice_title">{{'Référence'}}</div>
                                        <div class="col-xs-3 text-right">{{ $invoice->number }}</div>
                                        <div class="col-xs-9 text-right invoice_title">{{'Date'}}</div>
                                        <div class="col-xs-3 text-right">{{ $settings ? date($settings->date_format, strtotime($invoice->invoice_date)) : $invoice->invoice_date }}</div>
                                        <div class="col-xs-9 text-right invoice_title">{{'Date d ′ échéance'}}</div>
                                        <div class="col-xs-3 text-right">{{ $settings ? date($settings->date_format, strtotime($invoice->due_date)) : $invoice->due_date }}</div>
                                        @if($settings && $settings->vat != '')
                                        <div class="col-xs-9 text-right invoice_title">{{'M.F'}}</div>
                                        <div class="col-xs-3 text-right">{{ $settings ? $settings->vat : '' }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                        <div class="panel-body">
                                            <h4 class="invoice_title">{{'Nos informations'}}</h4><hr class="separator"/>
                                            @if($settings)
                                            <h4>{{ $settings->name }}</h4>
                                            {{ $settings->address1 ? $settings->address1.',' : '' }} {{ $settings->state ? $settings->state : '' }}<br/>
                                            {{ $settings->city ? $settings->city.',' : '' }} {{ $settings->postal_code ? $settings->postal_code.','  : ''  }}<br/>
                                            {{ $settings->country }}<br/>
                                            {{'Téléphone'}}: {{ $settings->phone }}<br/>
                                            {{'Email'}}: {{ $settings->email }}.
                                            @endif
                                        </div>
                                </div>
                                <div class="col-xs-6">
                                        <div class="panel-body">
                                            <h4 class="invoice_title">{{'Client'}} </h4><hr class="separator"/>
                                            <h4 style="color: #cb9b42">{{ $invoice->client->name }}</h4>
                                            {{ $invoice->client->address1 ? $invoice->client->address1.',' : '' }} {{ $invoice->client->state ? $invoice->client->state : '' }}<br/>
                                            {{ $invoice->client->city ? $invoice->client->city.',' : '' }} {{ $invoice->client->postal_code ? $invoice->client->postal_code.','  : ''  }}<br/>
                                            {{ $invoice->client->country }}<br/>
                                            {{'Téléphone'}}: {{ $invoice->client->phone }}<br/>
                                            {{'Email'}}: {{ $invoice->client->email }}.
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <table class="table">
                                <thead style="margin-bottom:30px;background: #2e3e4e;color: #fff;">
                                <tr>
                                    <th style="width:50%">{{'Produit'}}</th>
                                    <th style="width:10%" class="text-center">NB</th>
                                    <th style="width:15%" class="text-right">{{'Prix'}}</th>
                                    <th style="width:10%" class="text-center">{{'Taxe'}}</th>
                                    <th style="width:15%" class="text-right">{{'Total'}}</th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                @foreach($invoice->items as $item)
                                <tr>
                                    <td><b>{!! $item->item_name !!}</b><br/>{!! $item->item_description !!}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-right">{{ $item->price }}</td>
                                    <td class="text-center">{{ $item->tax ? $item->tax->value.'%' : '' }}</td>
                                    <td class="text-right">{{ $invoice->totals[$item->uuid]['itemTotal'] }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div><!-- /.col -->

                            <div class="col-md-6" style="padding: 7% 12% 0 15%; text-transform: uppercase">
                              <div class="{{ getStatus('label', 'paid') == $invoice->status ? 'invoice_status_paid' : 'invoice_status_cancelled' }}">
                                    {{ statuses()[$invoice->status]['label']  }}
                            </div>

                            </div><!-- /.col -->
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th style="width:50%">{{'Total partiel'}}</th>
                                            <td class="text-right">
                                                <span id="subTotal">{{ $invoice->currency.' '.$invoice->totals['subTotal'] }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{'Taxe'}}</th>
                                            <td class="text-right">
                                                <span id="taxTotal">{{ $invoice->currency.' '.$invoice->totals['taxTotal'] }}</span>
                                            </td>
                                        </tr>
                                        @if($invoice->totals['discount'] > 0)
                                        <tr>
                                            <th>{{'Remise'}}</th>
                                            <td class="text-right">
                                                <span id="taxTotal">{{ $invoice->currency.' '.$invoice->totals['discount'] }}</span>
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>{{'Total'}}</th>
                                            <td class="text-right">
                                                <span id="grandTotal">{{ $invoice->currency.' '.$invoice->totals['grandTotal'] }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{'Payé'}}</th>
                                            <td class="text-right">
                                                <span id="grandTotal">{{ $invoice->currency.' '.$invoice->totals['paidFormatted'] }}</span>
                                            </td>
                                        </tr>
                                        <tr class="amount_due">
                                            <th>{{'Montant depassé'}}:</th>
                                            <td class="text-right">
                                                <span id="grandTotal">{{ $invoice->currency.' '.$invoice->totals['amountDue'] }}</span>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div><!-- /.col -->

                            <div class="col-md-12">
                                @if($invoice->notes)
                                <h4 class="invoice_title">{{'Commentaires'}}</h4><hr class="separator"/>
                                {!! e($invoice->notes) !!} <br/><br/>
                                @endif
                                @if($invoice->terms)
                                <h4 class="invoice_title">{{'Terms'}}</h4><hr class="separator"/>
                                {!! $invoice->terms !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="cleafix"></div>
    </div>
</section>

@endsection


