@push('scripts')
<script type="text/javascript">
    function objectToString(obj, glue){
        var message = '';
        for(var prop in obj){
            if(typeof(obj[prop]) == 'string'){
                message += obj[prop] + glue;
            }
            else if(typeof(obj[prop]) == 'object'){
                message += objectToString(obj[prop], glue);
            }
        }

        return message;
    }

    function processAjaxErrorStatus(statusCode, data){
        switch(statusCode){
            case 401:
                swal({
                    title: "Hata",
                    text: 'Oturumunuzun süresi dolduğu için tekrardan giriş yapmalısınız.'
                }, function(isConfirm){
                    if(isConfirm){
                        window.location.reload(true);
                    }
                });
                break;
            case 403:
                swal('İşlem yapmak istediğiniz sayfaya erişim yetkiniz bulunmamaktadır.');
                break;
            case 404:
                swal('İşlem yapmak istediğiniz sayfa bulunmamaktadır.');
                break;
            case 422:
                var title = 'Hataları düzeltiniz.';
                var message =  objectToString(data, '\n');

                swal({title: title, text : message});
                break;
            case 500:
                swal('Serverda hata meydana geldiğinden dolayı işleminiz yapılamamaktadır.');
                break;
        }
    }
</script>
@endpush