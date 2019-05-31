@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1 ><i class="fa fa-quote-left"></i> {{'Devis'}}</h1>
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
                        <a href="{{ route('estimates.index') }}" class="btn btn-info btn-sm"> <i class="fa fa-chevron-left"></i> {{'Retour'}}</a>
                        <a href="{{ url('estimates/send',$estimate->uuid) }}" class="btn btn-success btn-sm pull-right" style="margin-left: 5px"> <i class="fa fa-share"></i> {{'Envoyer'}}</a>
                        <a href="{{ url('estimates/pdf', $estimate->uuid) }}" class="btn btn-primary btn-sm pull-right" style="margin-left: 5px"> <i class="fa fa-download"></i> {{'Télécharger'}}</a>
                        <a href="{{ route('estimates.edit', $estimate->uuid) }}" class="btn btn-warning btn-sm pull-right" > <i class="fa fa-pencil"></i> {{'Modifier'}}</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="invoice">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel-body">
                                        @if($settings && $settings->logo != '')
                                            <img src="{{ asset('assets/img/'.$settings->logo) }}" NB width="60%"/>
                                        @endif
                                     </div>
                                </div>
                                <div class="col-md-9 text-right">
                                    <div class="panel-body">
                                        <div class="col-xs-12 text-right"> <h1 style="color: #cb9b42" >{{'Devis'}}</h1></div>
                                        <div class="col-xs-9 text-right invoice_title">{{'Référence'}}</div>
                                        <div class="col-xs-3 text-right">{{ $estimate->estimate_no }}</div>
                                        <div class="col-xs-9 text-right invoice_title">{{'Date'}}</div>
                                        <div class="col-xs-3 text-right">{{ $estimate->estimate_date }}</div>
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
                                                Phone: {{ $settings->phone }}<br/>
                                                Email: {{ $settings->email }}.
                                            @endif
                                        </div>
                                </div>
                                <div class="col-xs-6">
                                        <div class="panel-body">
                                            <h4 class="invoice_title">{{'Client'}} </h4><hr class="separator"/>
                                            <h4 style="color: #cb9b42">{{ $estimate->client->name }}</h4>
                                            {{ $estimate->client->address1 ? $estimate->client->address1.',' : '' }} {{ $estimate->client->state ? $estimate->client->state : '' }}<br/>
                                            {{ $estimate->client->city ? $estimate->client->city.',' : '' }} {{ $estimate->client->postal_code ? $estimate->client->postal_code.','  : ''  }}<br/>
                                            {{ $estimate->client->country }}<br/>
                                            Phone: {{ $estimate->client->phone }}<br/>
                                            Email: {{ $estimate->client->email }}.
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <table class="table">
                                <thead style="margin-bottom:30px;background: #2e3e4e;color: #fff;">
                                <tr style="background-color:#ccae62;">
                                    <th style="width:50%">{{'Produit'}}</th>
                                    <th style="width:10%" class="text-center">NB</th>
                                    <th style="width:15%" class="text-right">{{'Prix'}}</th>
                                    <th style="width:10%" class="text-center">{{'Taxe'}}</th>
                                    <th style="width:15%" class="text-right">{{'Nombre de jours'}}</th>
                                    <th style="width:15%" class="text-right">Total HT </th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                @foreach($estimate->items as $item)
                                <tr>
                                    <td><b>{!! $item->item_name !!}</b><br/>{!! $item->item_description !!}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-right">{{ $item->price }}</td>
                                    <td class="text-center">{{ $item->tax ? $item->tax->value.'%' : '' }}</td>
                                    <td class="text-right">{{ $item->nb_jours }}</td>
                                    <td class="text-right">{{ $estimate->totals[$item->uuid]['itemTotal'] }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div><!-- /.col -->


                            <div class="col-md-6"></div><!-- /.col -->
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th style="width:50%">{{'Total partiel'}}</th>
                                            <td class="text-right">
                                                <span id="subTotal">{{ $estimate->currency.' '.$estimate->totals['subTotal'] }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{'Taxe'}}</th>
                                            <td class="text-right">
                                                <span id="taxTotal">{{ $estimate->currency.' '.$estimate->totals['taxTotal'] }}</span>
                                            </td>
                                        </tr>

                                        <tr class="amount_due">
                                            <th>{{'Total'}}</th>
                                            <td class="text-right">
                                                <span id="grandTotal">{{ $estimate->currency.' '.$estimate->totals['grandTotal'] }}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>droit. timbre</th>
                                            <td class="text-right">
                                                <span id="taxTotal">{{ $estimate->currency.' 0.6' }}</span>
                                            </td>
                                        </tr>
                                        <tr class="amount_due">
                                            <th>Net à payer</th>
                                            <td class="text-right">
                                                <span id="grandTotal">{{ $estimate->currency.' '.$estimate->totals['grandTotal'] }}</span>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div><!-- /.col -->



                            <div class="col-md-12">
                                @if($estimate->notes)
                                <h4 class="invoice_title">{{'Commentaires'}}</h4><hr class="separator"/>
                                {!! e($estimate->notes) !!}  <br/><br/>
                                @endif
                                @if($estimate->terms)
                                <h4 class="invoice_title">{{'Terms'}}</h4><hr class="separator"/>
                                {!! $estimate->terms !!}
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

<style>
    .invoice_title{
        color: #2e3e4e;
        font-weight: bold;
    }
    hr.separator{
        border-color:  #2e3e4e;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    tbody#items > tr > td{
        border: 3px solid #fff !important;
        vertical-align: middle;
    }

    #items{
        background-color: #f1f1f1;
    }
</style>
@endsection





