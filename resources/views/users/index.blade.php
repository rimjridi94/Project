@extends('app')

@section('content')

<div class="col-md-12 content-header" >

    <h1><i class="fa fa-user"></i> {{'Utilisateurs systeme'}</h1>

</div>

<section class="content">

<div class="row">

    <div class="col-md-12">

        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title pull-right">
                    <div class="box-tools ">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm pull-right" data-toggle="ajax-modal"> <i class="fa fa-user-plus"></i>{{'Nouveau Utilisateur'}}</a>
                    </div>
                </h3>
            </div>

            <div class="box-body">

                    <table class="table table-bordered table-striped table-hover datatable">

                        <thead>

                        <tr>

                            <th></th>

                            <th>{{'Photo'}} </th>

                            <th>{{'Nom'}} </th>

                            <th>{{'Nom d'utilisateur'}} </th>

                            <th>{{'Email'}} </th>

                            <th>{{'Téléphone'}} </th>

                            <th>{{'Action'}} </th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($users as $user)

                        <tr>

                            <td></td>

                            <td><img src="{{ asset($user->photo != '' ? 'assets/img/uploads/'.$user->photo : 'assets/img/uploads/no-image.jpg' ) }}" class="listthumb img-circle" width="60px"/></td>

                            <td>{{ $user->name }} </td>

                            <td>{{ $user->username }} </td>

                            <td>{{ $user->email }} </td>

                            <td>{{ $user->phone }} </td>

                            <td>

                                {!! edit_btn('users.edit', $user->uuid) !!}

                                @if(Auth::user()->uuid != $user->uuid)

                                {!! delete_btn('users.destroy', $user->uuid) !!}

                                @endif

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

