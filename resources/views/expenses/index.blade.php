@extends('app')

@section('content')

<div class="col-md-12 content-header" >

    <h1><i class="fa fa-credit-card"></i> {{'EXPENCES'}}</h1>

</div>


<section class="content">

    <div class="row">

        <div class="col-md-12">

            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                        <div class="box-tools ">
                            <a href="{{ route('expenses.create') }}" class="btn btn-primary btn-sm pull-right" data-toggle="ajax-modal"> <i class="fa fa-plus"></i> Nouvelle Expence</a>
                        </div>
                    </h3>
                </div>

                <div class="box-body">

                    <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{'Nom'}}</th>
                            <th>{{'Date'}}</th>
                            <th>{{'Catégorie'}}</th>
                            <th>{{'Montant'}}</th>
                            <th>{{'Action'}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <td></td>
                            <td>{{ $expense->name }} </td>
                            <td>{{ $expense->expense_date }} </td>
                            <td>{{ $expense->category }} </td>
                            <td>{{ $expense->amount }} </td>
                            <td>
                                {!! edit_btn('expenses.edit', $expense->uuid) !!}
                                {!! delete_btn('expenses.destroy', $expense->uuid) !!}
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

