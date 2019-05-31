@extends('modal')
@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title">{{trans('application.select_product')}}</h5>
        </div>
        <div class="modal-body">
                    <table class="table table-bordered table-striped table-hover datatable">
                        <thead class="item-table-header">
                        <tr>
                            <th></th>
                            <th>Nom du produit</th>
                            <th>Code</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td> {!! Form::checkbox('products_lookup_ids[]',$product->uuid) !!}</td>
                            <td>{{ $product->name }} </td>
                            <td>{{ $product->code }} </td>
                            <td>{{ $product->category }} </td>
                            <td>{{ $product->price }} </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
    </div>
        <div class="modal-footer">
            {!! Form::button('Add Product',['class'=>'btn btn-sm btn-success pull-left', 'id'=>'select-products-confirm'] ) !!}
            {!! Form::button('close',['class'=>'btn btn-sm btn-danger','data-dismiss'=>'modal'] ) !!}
        </div>
    </div>
</div>
@endsection

