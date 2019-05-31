@extends('app')

@section('content')

<div class="col-md-12 content-header" >
    <h1><i class="fa fa-quote-left"></i> {{'DEVIS'}}</h1>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                    <div class="box-tools">
                        <a href="{{ route('estimates.create') }}" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-plus"></i> {{'Nouveau Devis'}}</a>
                    </div>
                    </h3>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{'Devis num'}}</th>
                            <th>{{'Client'}}</th>
                            <th>{{'Date'}}</th>
                            <th class="text-right">{{'Montant'}}</th>
                            <th>{{'Action'}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estimates as $estimate)
                        <tr>
                            <td></td>
                            <td>{{ $estimate->estimate_no }} </td>
                            <td><a href="{{ route('clients.show', $estimate->client_id ) }}">{{ $estimate->client->name }}</a> </td>
                            <td>{{ $estimate->estimate_date }} </td>
                            <td class="text-right">{{ $estimate->currency.''.$estimate->totals['grandTotal'] }} </td>
                            <td>
                                <a href="{!! route('estimates.show',$estimate->uuid) !!}" data-rel="tooltip" data-placement="top" title="View estimate" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> {{'Afficher'}} </a>
                                <a href="{!! url('estimates/pdf',$estimate->uuid) !!}" data-rel="tooltip" data-placement="top" title="Download estimate" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i> {{'Envoyer'}}</a>
                                <a href="{!! route('estimates.edit',$estimate->uuid) !!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> {{'Modifier'}} </a>
                                {!! delete_btn('estimates.destroy', $estimate->uuid) !!}
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

