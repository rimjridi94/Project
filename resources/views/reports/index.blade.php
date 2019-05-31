@extends('app')


@section('content')

<div class="col-md-12 content-header" >

    <h1><i class="fa fa-line-chart"></i> {{'RAPPORT'}}</h1>

</div>

<link rel="stylesheet" href="{{ asset('assets/css/morris.min.css') }}">

<section class="content">

<div class="row">

    <div class="col-md-12">

        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-sm reports-button" onclick="javascript: general_summary();">{{'Resumé Générale'}}</button>
                        <button type="button" class="btn btn-primary btn-sm reports-button" onclick="javascript: payments_summary();">{{'Resumé des paiements'}}</button>
                        <button type="button" class="btn btn-info btn-sm reports-button" onclick="javascript: client_statement();">{{'Déclaration Client'}}</button>
                        <button type="button" class="btn btn-success btn-sm reports-button" onclick="javascript: invoices_report();">{{'Rapport Facture'}}</button>
                        <button type="button" class="btn btn-warning btn-sm reports-button" onclick="javascript: expenses_report();">{{'Rapport Dépense'}}</button>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row" id="report-body" style="height:700px"></div>
            </div><!-- ./box-body -->
        </div>
    </div>
</div>
</section>
@endsection
@section('scripts')
    @include('reports.partials.reports_js')

@endsection