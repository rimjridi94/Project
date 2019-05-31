@extends('app')

@section('content')

<div class="col-md-12 content-header" >

    <h1><i class="fa fa-money"></i> {{'PAIMENTS'}}</h1>

</div>

<section class="content">

    <div class="row">

        <div class="col-md-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                        <div class="box-tools ">
                            <a href="{{ route('payments.create') }}" class="btn btn-primary btn-sm pull-right" data-toggle="ajax-modal"> <i class="fa fa-plus"></i> {{'Enregistrer paiement'}}</a>
                        </div>
                    </h3>
                </div>

                <div class="box-body">

                    <table class="table table-bordered table-striped table-hover datatable">

                        <thead>

                        <tr>

                            <th></th>

                            <th>{{'Numéro de facture'}}</th>

                            <th>{{'Client'}}</th>

                            <th>{{'Date'}}</th>

                            <th class="text-right">{{'Montant'}}</th>

                            <th>{{'Action'}} </th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($payments as $payment)

                        <tr>

                            <td></td>

                            <td><a href="{{ route('invoices.show', $payment->invoice_id) }}">{{ $payment->invoice->number }}</a> </td>

                            <td><a href="{{ route('clients.show', $payment->invoice->client_id ) }}">{{ $payment->invoice->client->name }}</a> </td>

                            <td>{{ $payment->payment_date }} </td>

                            <td class="text-right">{{ $payment->invoice->currency.$payment->amount }} </td>

                            <td>

                                {!! edit_btn('payments.edit', $payment->uuid) !!}

                                {!! delete_btn('payments.destroy', $payment->uuid) !!}

                            </td>

                        </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

