@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-file-pdf-o"></i> {{ 'Facture' }}</h1>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-md-6" style="width:1035px;margin-left:20px"><br/>
                        <a href="{{ route('invoices.index') }}" class="btn btn-info btn-sm"> <i class="fa fa-chevron-left"></i> {{ 'Retour' }}</a>
                        <a href="{{ route('invoices.show', $invoice->uuid) }}" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-search"></i>  {{'Aperçu'}}</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="invoice">
                            {!! Form::model($invoice, ['route' => ['invoices.update', $invoice->uuid],  'method' => 'PATCH', 'id' => 'invoice_form', 'data-toggle'=>"validator", 'role' =>"form"]) !!}
                            <div class="col-md-12">
                                <div class="text-right"><h1>{{ 'Facture'}}</h1></div>
                                <div class="col-md-7" style="padding: 0px">
                                    <div class="contact to">
                                        <div class="form-group">
                                            {!! Form::label('client', 'Client') !!}
                                            <div class="input-group col-md-7">
                                                {!! Form::select('client',$clients,$invoice->client_id, ['class' => 'form-control chosen', 'id' => 'client', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('currency', 'Devis') !!}
                                            <div class="input-group col-md-7">
                                                {!! Form::select('currency',$currencies,null, ['class' => 'form-control chosen', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('number', 'Numéro de facture') !!}
                                            <div class="input-group col-md-7">
                                            {!! Form::text('number',null, ['class' => 'form-control', 'id' => 'invoice_no', 'required']) !!}
                                        </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="padding: 0px">

                                    <div class="form-group">
                                        {!! Form::label('invoice_date', 'Date') !!}
                                        {!! Form::text('invoice_date',null, ['class' => 'form-control datepicker' , 'id' => 'invoice_date', 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('due_date', 'Date d ′ échéance') !!}
                                        {!! Form::text('due_date',null, ['class' => 'form-control datepicker' , 'id' => 'due_date', 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('status', 'Etat') !!}
                                        <select class="form-control chosen required" name="status" id="status">
                                            @foreach($statuses as $key => $status)
                                            <option value="{{ $key }}" {{ $key == $invoice->status ?  'selected' : '' }}> {{ strtoupper($status['label']) }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped" id="item_table">
                                    <thead style="background: #2e3e4e;color: #fff;">
                                    <tr>
                                        <th width="5%"></th>
                                        <th width="20%">{{ 'Produit' }}</th>
                                        <th width="35%">{{ 'Description' }}</th>
                                        <th width="10%">{{ 'Quantité' }}</th>
                                        <th width="10%">{{ 'Prix'}}</th>
                                        <th width="10%">{{'Nombre de jours'}}</th>
                                        <th width="15%">{{ 'Taxe' }}</th>
                                        <th width="15%"class="text-right">{{'Montant' }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoice->items as $item)
                                    <tr class="item">
                                        <td>
                                            <span class="btn btn-danger btn-xs deleteItem" data-id="{{ $item->uuid }}"><i class="fa fa-trash"></i></span>
                                            {!! Form::hidden('itemId',$item->uuid, ['id'=>'itemId', 'required']) !!}
                                        </td>
                                        <td>
                                            <div class="form-group">{!! Form::text('item_name',$item->item_name,['class' => 'form-control input-sm item_name', 'id'=>"item_name", 'required' ]) !!}</div>
                                        </td>
                                        <td>
                                            <div class="form-group">{!! Form::text('item_description',$item->item_description,['class' => 'form-control input-sm item_description', 'id'=>"item_description", 'required' ]) !!}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                {!! Form::input('number', 'quantity',$item->quantity, ['class' => 'form-control calcEvent input-sm quantity', 'id'=>"quantity" , 'required', 'step' => 'any', 'min' => '1']) !!}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="form-group">{!! Form::input('number','price',$item->price, ['class' => 'form-control input-sm calcEvent rate', 'id'=>"price", 'required', 'step' => 'any', 'min' => '1']) !!}</div>
                                        </td>
                                        <td class="text-right">
                                            <div class="form-group">{!! Form::input('number','nb_jours',$item->nb_jours, ['class' => 'form-control input-sm calcEvent rate', 'required', 'step' => 'any', 'min' => '1']) !!}</div>
                                        </td>
                                        <td>
                                            <div class="form-group">{!! Form::customSelect('tax',$taxes,$item->tax_id, ['class' => 'form-control input-sm calcEvent tax', 'id'=>"tax"]) !!}</div>
                                         </td>
                                        <td class="text-right"><span class="itemTotal">{{ $invoice->totals[$item->uuid]['itemTotal'] }}</span></td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div><!-- /.col -->
                            <div class="col-md-6">
                                <span id="btn_add_row" class="btn btn-sm btn-info "><i class="fa fa-plus"></i> {{ 'Ajouter' }}</span>
                                <span id="btn_product_list_modal" class="btn btn-sm btn-primary "><i class="fa fa-plus"></i> {{ 'Ajouter un produit' }}</span>
                            </div><!-- /.col -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th style="width:50%">{{ 'Total partiel' }}:</th>
                                        <td class="text-right">
                                            <span class="currencySymbol">{{ $invoice->currency }}</span>
                                            <span id="subTotal">{{ $invoice->totals['subTotal'] }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ 'Taxe' }}:</th>
                                        <td class="text-right">
                                            <span class="currencySymbol">{{ $invoice->currency }}</span>
                                            <span id="taxTotal">{{ $invoice->totals['taxTotal'] }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle">{{ 'Remise' }}:</th>
                                        <td class="text-right">
                                            <div class="form-group">
                                                {!! Form::input('number','discount', null,['class' => 'form-control text-right input-sm calcEvent', 'id' => 'discount', 'step'=>'any', 'min'=>'0']) !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{'Payé' }}:</th>
                                        <td class="text-right">
                                            <span class="currencySymbol">{{ $invoice->currency }}</span>
                                            <span id="paidTotal">{{ $invoice->totals['paidFormatted'] }}</span>
                                            {!! Form::hidden('paid',$invoice->totals['paid'], ['id' => 'paidAmount']) !!}
                                        </td>
                                    </tr>
                                    <tr class="amount_due">
                                        <th>{{'Total' }}:</th>
                                        <td class="text-right">
                                            <span class="currencySymbol">{{ $invoice->currency }}</span>
                                            <span id="amountDue">{{ $invoice->totals['grandTotal'] }}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.col -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('notes', 'Commentaires') !!}
                                    {!! Form::textarea('notes',null, ['class' => 'form-control','rows' =>  '2']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('terms', 'Terms') !!}
                                    {!! Form::textarea('terms',null, ['class' => 'form-control', 'rows' =>  '2', 'id' => 'invoice_terms']) !!}
                                </div>
                            </div>

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-sm btn-success pull-right" id="saveInvoice"><i class="fa fa-save"></i> {{'Enregistrere la facture'}}</button>
                            </div>
                            {!!  Form::close() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>>
        </div>
</section>
@endsection
@section('scripts')
    @include('invoices.partials._invoices_js')
@endsection