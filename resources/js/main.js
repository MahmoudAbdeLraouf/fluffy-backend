

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

$("#add-form-avaliabity").click(function (){
    console.log("click");
   // append html to div
    $("#form-avaliabity").append('<div class="avaliabity-item">' +
        '<div class="form-group">' +
            '<select name="avaliabity_day[]" id="avaliabity-day-1" class="form-control" required>' +
                '<option value="">اخنر التوقيت</option>' +
                '<option>السبت</option>' +
                '<option>الاحد</option>' +
                '<option>الاثنين</option>' +
                '<option>الثلاثاء</option>' +
                '<option>الاربعاء</option>' +
                '<option>الخميس</option>' +
                '<option>الجمعه</option>' +
            '</select>' +
        '</div>' +
        '<div class="form-group col-md-6" style="display: inline-block; width: 49%">' +
            '<label for="exampleInputEmail1"> من </label>' +
            '<input type="time" name="avaliabity_from[]" class="form-control" id="avaliabity-from-1">' +
        '</div>' +
        '<div class="form-group col-md-6" style="display: inline-block; width: 49%">' +
            '<label for="exampleInputEmail1"> الي </label>' +
            '<input type="time" name="avaliabity_to[]" class="form-control" id="avaliabity-to-1">' +
        '</div>'+
        '</div>')
});
