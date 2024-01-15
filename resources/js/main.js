

$("#city_id").change(function () {
    // get the selected value
    var selectedValue = $(this).val();
    // make the ajax call
    $.ajax({
        url: '/admin/cities/'+selectedValue+'/regions/details',
        type: 'GET',
        success: function (data) {
            console.log(data);
            // clear the current content of the select
            $('#region_id').html('');
            // append default option
            $('#region_id').append('<option value=""> اختر منطقه</option>');
            // iterate over the data and append a select option
            $.each(data, function (key, val) {
                $('#region_id').append('<option value="' + val.id + '">' + val.name + '</option>');
            })
        }
    });
});


$(".datetimepicker").each(function () {
    $(this).datetimepicker();
});

$("#client_id").change(function () {
    // get the selected value
    var selectedValue = $(this).val();
    // make the ajax call
    $.ajax({
        url: '/admin/clients/'+selectedValue+'/city',
        type: 'GET',
        success: function (data) {
            console.log(data.city_id);
            $("#city_id").val(data.city_id).change();
            // delay 2 seconds
            setTimeout(function () {
                $("#region_id").val(data.region_id).change();
            }, 2000);
        }
    });
});
