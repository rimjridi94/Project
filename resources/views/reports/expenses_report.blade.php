<script type="text/javascript">
    $(function() {
        $('.date').datepicker( {autoclose: true, format: 'dd-mm-yyyy'} );
        $(".date").datepicker("setDate", new Date());
        $('.datatable').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            "bLengthChange": false,
            "bInfo" : false,
            "filter" : true,
            "oLanguage": { "sSearch": ""}
        });
        $('div.dataTables_filter input').addClass('form-control input-sm');
    });
</script>
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('category', 'Catégorie') !!}
        {!! Form::select('category',$categories,null, ['class' => 'form-control input-sm chosen', 'id' => 'category', 'required']) !!}
    </div>
</div>

<div class="col-md-3">
    <label>{{ 'De'}} : </label>
    <div class="form-group input-group date">
        <input class="form-control input-sm" size="16" type="text" name="from_date" readonly id="from_date"/>
        <span class="input-group-addon input-sm add-on"><i class="fa fa-calendar" style="display: inline"></i></span>
    </div>
</div>

<div class="col-md-3">
    <label>{{'à'}} : </label>
    <div class="form-group input-group date" style="margin-left:0;">
        <input class="form-control input-sm" size="16" type="text" name="to_date" readonly id="to_date"/>
        <span class="input-group-addon input-sm add-on"><i class="fa fa-calendar" style="display: inline"></i></span>
    </div>
</div>
<div class="col-md-3">
    <label> </label>
    <div class="form-group">
        <a href="javascript: void(0);" onclick="javascript: expenses_report();" class="btn btn-large btn-sm btn-success"  style="margin:6px"><i class="fa fa-check"></i> {{ 'Générer raport'}}</a>
    </div>
</div>

<div class="col-md-12">
    <table class="table datatable dataTable table-bordered">
        <thead>
        <tr class="table_header">
            <th>{{'Nom'}</th>
            <th>{{'Date'}}</th>
            <th>{{'Catégorie'}}</th>
            <th>{{'Montant'}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->name }} </td>
                <td>{{ $expense->expense_date }} </td>
                <td>{{ $expense->category }} </td>
                <td>{{ number_format($expense->amount, 2) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>