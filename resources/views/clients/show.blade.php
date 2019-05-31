@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-user"></i> CLIENT DETAILS</h1>
</div>

<section class="content">
    <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $client->name }}</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped">
                            <tr>
                                <td style="width:30%"><dt>Numéro client</dt></td>
                                <td>{{ $client->client_no }}</td>
                            </tr>
                            <tr>
                                <td style="width:30%"><dt>Matricule fiscale</dt></td>
                                <td>{{ $client->mat_fisc }}</td>
                            </tr>
                            <tr>
                                <td style="width:30%"><dt>Registre de Commerce</dt></td>
                                <td>{{ $client->reg_commerce }}</td>
                            </tr>

                            <tr>
                                <td><dt>Email</dt></td>
                                <td>{{ $client->email }}</td>
                            </tr>

                            <tr>
                                <td><dt>Téléphone</dt></td>
                                <td>{{ $client->phone }}</td>
                            </tr>

                            <tr>
                                <td><dt>Mobile</dt></td>
                                <td>{{ $client->mobile }}</td>
                            </tr>

                            <tr>
                                <td><dt>Addresse 1</dt></td>
                                <td>{{ $client->address1 }}</td>
                            </tr>

                            <tr>
                                <td><dt>Adresse de livraison</dt></td>
                                <td>{{ $client->address2 }}</td>
                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-body">
                        <table class="table table-striped">
                            <tr>
                                <td style="width:30%"><dt>Ville</dt></td>
                                <td>{{ $client->city }}</td>
                            </tr>

                            <tr>
                                <td><dt>Province</dt></td>
                                <td>{{ $client->state }}</td>
                            </tr>

                            <tr>
                                <td><dt>Code postale</dt></td>
                                <td>{{ $client->postal_code }}</td>
                            </tr>

                            <tr>
                                <td><dt>Pays</dt></td>
                                <td>{{ $client->Country }}</td>
                            </tr>

                            <tr>
                                <td><dt>Site web</dt></td>
                                <td>{{ $client->website }}</td>
                            </tr>

                            <tr>
                                <td><dt>commentaires</dt></td>
                                <td>{{ $client->notes }}</td>
                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
     </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Factures</h3>
                </div>
                <div class="box-body">
                        <table class="table table-bordered table-striped table-hover datatable">
                            <thead>
                            <tr>
                                <th width="10%"></th>
                                <th>Numéro de facture</th>
                                <th>Etat</th>
                                <th>Date</th>
                                <th>Date d'échéance</th>
                                <th>Montant</th>
                                <th width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($client->invoices as $invoice)
                            <tr>
                                <td></td>
                                <td><a href="{{ route('invoices.show', $invoice->uuid ) }}">{{ $invoice->number }}</a> </td>
                                <td><span class="label {{ statuses()[$invoice->status]['class'] }}">{{ ucwords(statuses()[$invoice->status]['label']) }} </span></td>
                                <td>{{ $invoice->invoice_date }} </td>
                                <td>{{ $invoice->due_date }} </td>
                                <td>{{ $invoice->currency.''.$invoice->totals['grandTotal'] }} </td>
                                <td>
                                    <a href="{!! route('invoices.show',$invoice->uuid) !!}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> {{ trans('application.view') }} </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Devis</h3>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                        <tr>
                            <th width="10%"></th>
                            <th>Numéro de devis</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($client->estimates as $count => $estimate)
                        <tr>
                            <td>{{ $count+1 }}</td>
                            <td><a href="{{ route('estimates.show', $estimate->uuid ) }}">{{ $estimate->estimate_no }}</a> </td>
                            <td>{{ $estimate->estimate_date }} </td>
                            <td>{{ $estimate->currency.''.$estimate->totals['grandTotal'] }} </td>
                            <td>
                                <a href="{!! route('estimates.show',$estimate->uuid) !!}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> {{ trans('application.View') }} </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection



