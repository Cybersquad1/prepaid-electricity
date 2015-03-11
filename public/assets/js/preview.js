function calc_total(){
    var sum = 0;
    $('.input-amount').each(function(){
        sum += parseFloat($(this).text());
    });
    $(".preview-total").text(sum);    
}
$(document).on('click', '.input-remove-row', function(){ 
    var tr = $(this).closest('tr');
    tr.fadeOut(200, function(){
        tr.remove();
        calc_total()
    });
});

$(document).ready(function(){
    $("#amount").keyup(function(){
        $("#credit").val(Number(parseFloat($('.payment-form input[name="amount"]').val())/1.1406).toFixed(2)) 

    });

});

$(function(){
    $('.preview-add-button').click(function(){
        var form_data = {};
        form_data["unit"] = $('.payment-form #unit option:selected').text();
        form_data["amount"] = parseFloat($('.payment-form input[name="amount"]').val()).toFixed(2);
        form_data["credit"] = parseFloat($('.payment-form input[name="credit"]').val())
        //form_data["credit"] = $('.payment-form input[name="credit"]').val();
        form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';
        var row = $('<tr></tr>');
        $.each(form_data, function( type, value ) {
            $('<td class="input-'+type+'"></td>').html(value).appendTo(row);
        });
        $('.preview-table > tbody:last').append(row); 
        calc_total();
    });  
});


