@extends('app')

@section('content')

<div class="col-md-12 content-header" >

    <h1><i class="fa fa-users"></i> CLIENTS</h1>

</div>

<section class="content">

<div class="row">

    <div class="col-md-12">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">
                <div class="box-tools">
                    <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm" data-toggle="ajax-modal"> <i class="fa fa-user-plus"></i> Nouveau client</a>
                </div>
                </h3>
            </div>

            <div class="box-body">

                <table class="table table-hover table-bordered table-striped datatable">

                    <thead>

                    <tr>

                        <th></th>

                        <th>Référence</th>

                        <th>Nom de l'entreprise</th>

                        <th>Email</th>

                        <th>Téléphone</th>

                        <th>Pays</th>

                        <th>Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($clients as $client)

                    <tr>

                        <td></td>

                        <td>{{ $client->client_no }}</td>

                        <td>{{ $client->name }} </td>

                        <td>{{ $client->email }} </td>

                        <td>{{ $client->phone }} </td>

                        <td>{{ $client->country }} </td>

                        <td>
                            {!! show_btn('clients.show', $client->uuid) !!}

                            {!! edit_btn('clients.edit', $client->uuid) !!}

                            {!! delete_btn('clients.destroy', $client->uuid) !!}


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

