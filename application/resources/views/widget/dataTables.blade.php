@push('styles')
<link rel="stylesheet" href="{{ plugins('datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ plugins('datatables/extensions/KeyTable/css/keyTable.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ plugins('datatables/extensions/Buttons/css/buttons.dataTables.min.css') }}">
@endpush

@push('styles')
<style type="text/css">
    .details, .hide-details{
        cursor:pointer;
    }
    .show-orders  thead .sorting:after{
        display:block !important;
    }
    .show-orders  thead .sorting_desc:after{
        display:block !important;
    }
    .show-orders  thead .sorting_asc:after{
        display:block !important;
    }

    .show-orders .row{
        margin:0px !important;
    }

    .show-orders .col-sm-12{
        padding:0px !important;
    }

    .error-state{
        background-color: #ff5a80 !important;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript" charset="utf-8" src="{{ plugins('datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ plugins('datatables/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ plugins('datatables/extensions/KeyTable/js/dataTables.keyTable.min.js') }}"></script>
{{--NOTE: This file has been modified do not change it --}}
<script type="text/javascript" src="{{ plugins('datatables/extensions/Buttons/js/dataTables.buttons.js') }}"></script>
{{--END OF NOTE--}}
<script type="text/javascript" src="{{ plugins('jszip/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ plugins('pdfmake/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ plugins('pdfmake/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ plugins('datatables/extensions/Buttons/js/buttons.flash.min.js') }}"></script>
<script type="text/javascript" src="{{ plugins('datatables/extensions/Buttons/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ plugins('datatables/extensions/Buttons/js/buttons.print.min.js') }}"></script>
<script type="text/javascript">
    jQuery.fn.dataTableExt.oSort['string-pre'] = function(a) {
        var special_letters = {
            "C": "ca", "c": "ca", "Ç": "cb", "ç": "cb",
            "G": "ga", "g": "ga", "Ğ": "gb", "ğ": "gb",
            "I": "ia", "ı": "ia", "İ": "ib", "i": "ib",
            "O": "oa", "o": "oa", "Ö": "ob", "ö": "ob",
            "S": "sa", "s": "sa", "Ş": "sb", "ş": "sb",
            "U": "ua", "u": "ua", "Ü": "ub", "ü": "ub"
        };
        for (var val in special_letters)
            a = a.split(val).join(special_letters[val]).toLowerCase();

        return a;
    };

    $.extend( true, $.fn.dataTable.defaults, {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tümü"]],
        "language": {
            "url": "{{ plugins('datatables/Turkish.json') }}"
        },
        stateSave: true,
        "scrollX":true
    } );

    $.fn.toDataTable = function(options){
        return $(this).addClass('datatables-initialized').DataTable(options);
    }

    //Row Child Functions

    $.fn.toggleDataTable = function(options, onShowData){
        var detailsHtml = '<i class="fa fa-plus-circle"></i>';

        var defaultOptions = {
            "columnDefs": [
                {
                    "className":      'details',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": detailsHtml,
                    "targets": 0
                }
            ]
        };

        $.extend(defaultOptions, options);

        var dataTable =  $(this).toDataTable(defaultOptions);

        dataTable.on('click', 'td.details', function () {
            var row = dataTable.row($(this).parent().get(0));

            if(!row.child() || !row.child().data('loaded')){
                onShowData.call(this, dataTable, row);
            }
            else{
                row.child().show();
                dataTable.toggleChild(this);
            }
        });


        dataTable.on('click', 'td.hide-details', function(){
            var row = dataTable.row($(this).parent().get(0));

            row.child().hide();
            dataTable.toggleChild(this);
        });
    }

    $.fn.dataTable.Api.register('toggleChild', function(element){
        var detailsHtml = '<i class="fa fa-plus-circle"></i>';
        var hideDetailsHtml = '<i class="fa fa-minus-circle"></i>';

        element = $(element);

        if(element.hasClass('details')){
            element.removeClass('details').addClass('hide-details').html(hideDetailsHtml);
        }
        else{
            element.removeClass('hide-details').addClass('details').html(detailsHtml);
        }
    });

    $.fn.dataTable.Api.register('setRowChildData', function(row, data, element){
        row.child(data).show();
        row.child().data('loaded', true);
        this.toggleChild(element);

        return row.child();
    });
</script>
@endpush