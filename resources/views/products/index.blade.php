@extends('app')

@section('content')

<div class="col-md-12 content-header" >

    <h1><i class="fa fa-puzzle-piece"></i> PRODUITS</h1>

</div>

<section class="content">

    <div class="row">

        <div class="col-md-12">

            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                        <div class="box-tools ">
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm pull-right" data-toggle="ajax-modal"> <i class="fa fa-plus"></i> Nouveau Produit</a>
                        </div>
                    </h3>
                </div>

                <div class="box-body">

                    <table class="table table-bordered table-striped table-hover datatable">

                        <thead>

                        <tr>

                            <th></th>

                            <th>Nom du produit</th>

                            <th>Code</th>

                            <th>Catégorie</th>

                            <th>Prix</th>

                            <th>Action </th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($products as $product)

                        <tr>

                            <td></td>

                            <td>{{ $product->name }} </td>

                            <td>{{ $product->code }} </td>

                            <td>{{ $product->category }} </td>

                            <td>{{ $product->price }} </td>

                            <td>

                                {!! edit_btn('products.edit', $product->uuid) !!}

                                {!! delete_btn('products.destroy', $product->uuid) !!}

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

