$(function () {
    $('#dropdown-kabupaten').change(function () {
        var idKabupaten = $(this).val();

        $.get('get-propinsi', {idKabupaten: idKabupaten}, function (data) {
            
            console.log(data);
            
            var data = $.parseJSON(data);
            $('#dropdown-propinsi').val(data);
            $('#hidden-propinsi').val(data);
        });
    });

//    $('#dropdown-kabupaten').each(user_handler).on('change', user_handler);

//    $('#modalButton').click(function () {
//        $('#modal').modal('show')
//                .find('#modalContent')
//                .load($(this).attr('value'));
//    });
});

//var user_handler = function () {
//    console.log("kabupaten loaded");
//};