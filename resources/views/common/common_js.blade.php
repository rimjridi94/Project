<script type="text/javascript">
    $(function(){
        /*-----------------------------------------------------------
         Delete Button clicked
         --------------------------------------------------------------*/
        $(document).on('click', '.btn-delete', function (e){e.preventDefault(); confirm_dialog($(this).parent('form')); });
        function confirm_dialog(form){
            BootstrapDialog.show({
                title: '{{ trans('application.deleting_record') }}',
                message: '{{ trans('application.delete_confirmation_msg') }}',
                buttons: [ {
                    icon: 'fa fa-check',
                    label: ' Yes',
                    cssClass: 'btn-success btn-sm',
                    action: function(){
                        form.submit();
                    }
                }, {
                    icon: 'fa fa-remove',
                    label: 'No',
                    cssClass: 'btn-danger btn-sm',
                    action: function(dialogItself){
                        dialogItself.close();
                    }
                }]
            });
            return false;
        }
    });
</script>