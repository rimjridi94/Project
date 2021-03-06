@extends('app')

@section('content')

<div class="col-md-12 content-header" >

    <h1><i class="fa fa-quote-left"></i> {{'Devis'}}</h1>

</div>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-md-6" style="width:1035px;margin-left:20px"><br/>
                        <a href="{{ route('estimates.index') }}" class="btn btn-info btn-sm"> <i class="fa fa-chevron-left"></i> {{'Retour'}}</a>
                        <a href="{{ route('estimates.show', $estimate->uuid) }}" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-search"></i> {{'Aperçu'}}</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="invoice">
                            {!! Form::model($estimate, ['route' => ['estimates.update', $estimate->uuid],  'method' => 'PATCH', 'id' => 'estimate_form', 'data-toggle'=>"validator", 'role' =>"form"]) !!}
                            <div class="col-md-12">
                                <div class="text-right"><h1>{{'Devis'}}</h1></div>
                                <div class="col-md-7" style="padding: 0px">
                                    <div class="contact to">
                                        <div class="form-group">
                                            {!! Form::label('client', 'Client') !!}
                                            <div class="input-group col-md-7">
                                                {!! Form::select('client',$clients,$estimate->client_id, ['class' => 'form-control chosen input-sm', 'id' => 'client', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('currency', 'Devis') !!}
                                            <div class="input-group col-md-7">
                                                {!! Form::select('currency',$currencies,null, ['class' => 'form-control chosen input-sm', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="padding: 0px">
                                    <div class="form-group">
                                        {!! Form::label('estimate_no', 'Devis Num') !!}
                                        {!! Form::text('estimate_no',null, ['class' => 'form-control input-sm', 'id' => 'estimate_no', 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('estimate_date', ' Date Devis') !!}
                                        {!! Form::text('estimate_date',null, ['class' => 'form-control datepicker input-sm' , 'id' => 'estimate_date', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped" id="item_table">
                                    <thead style="background: #2e3e4e;color: #fff;">
                                    <tr>
                                        <th></th>
                                        <th width="20%">{{ 'Produit' }}</th>
                                        <th width="35%">{{ 'Description'}}</th>
                                        <th width="10%">{{ 'Quantité' }}</th>
                                        <th width="15%">{{'Prix'}}</th>
                                        <th width="15%">{{'Nombre jours '}}</th>
                                        <th width="15%">{{'Taxe'}}</th>
                                        <th width="15%"class="text-right">{{'Montant'}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($estimate->items as $item)
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
                                            <div class="form-group">{!! Form::input('number','price',$item->price, ['class' => 'form-control calcEvent price input-sm', 'id'=>"price", 'required', 'step' => 'any', 'min' => '1']) !!}</div>
                                        </td>
                                        <td class="text-right">
                                            <div class="form-group">{!! Form::input('number','nb_jours',$item->nb_jours, ['class' => 'form-control calcEvent price input-sm', 'id'=>"nb_jours", 'required', 'step' => 'any', 'min' => '1']) !!}</div>
                                        </td>
                                        <td>
                                            <div class="form-group">{!! Form::customSelect('tax',$taxes,$item->tax_id, ['class' => 'form-control calcEvent tax input-sm', 'id'=>"tax"]) !!}</div>
                                         </td>
                                        <td class="text-right"><span class="itemTotal">{{ $estimate->totals[$item->uuid]['itemTotal'] }}</span></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.col -->
                            <div class="col-md-6">
                                <span id="btn_add_row" class="btn btn-sm btn-info "><i class="fa fa-plus"></i> {{'Ajouter'}}</span>
                                <span id="btn_product_list_modal" class="btn btn-sm btn-primary "><i class="fa fa-plus"></i> {{ 'Ajouter un produit' }}</span>
                            </div><!-- /.col -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th style="width:50%">{{'Total partiel'}}</th>
                                        <td class="text-right">
                                            <span class="currencySymbol">{{ $estimate->currency }}</span>
                                            <span id="subTotal">{{ $estimate->totals['subTotal'] }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tax</th>
                                        <td class="text-right">
                                            <span class="currencySymbol">{{ $estimate->currency }}</span>
                                            <span id="taxTotal">{{ $estimate->totals['taxTotal'] }}</span>
                                        </td>
                                    </tr>
                                    <tr class="amount_due">
                                        <th>Total:</th>
                                        <td class="text-right">
                                            <span class="currencySymbol">{{ $estimate->currency }}</span>
                                            <span id="grandTotal">{{ $estimate->totals['grandTotal'] }}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.col -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('notes', 'Commentaires') !!}
                                    {!! Form::textarea('notes',$estimate->notes, ['class' => 'form-control input-sm','rows' =>  '2']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('terms', 'Terms') !!}
                                    {!! Form::textarea('terms',$estimate->terms, ['class' => 'form-control input-sm', 'rows' =>  '2']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success pull-right" id="saveEstimate"><i class="fa fa-save"></i> {{'Enregistrer'}}</button>
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
    @include('estimates.partials._estimatesjs')
@endsection