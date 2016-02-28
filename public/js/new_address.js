/**
 * Created by ogi on 24.2.16.
 */

$(document).ready(function(){

    $( ".address_div").hide();

    $('#store_type').change(function(){
        if($(this).val() == 'online'){
            $( ".address_div").hide();
        } else if($(this).val() == 'one_city'){
            $( ".address_div").show();
        } else {
            $( ".address_div").hide();
        }
    });

    var i = 1;
    $( "#new_address_button" ).click(function(){
        var div_address = '<label class="col-md-4 control-label">Address name and number</label><div class="col-md-6 address_name_and_number'+i+'"> <input type="text" class="form-control" name="address'+i+'" > <button class = "remove_address_button" type="button">-</button></div>';
        $("#new_address_button").parent().prev().before(div_address);
        i++;
    });

    $( ".address_div" ).on("click",".remove_address_button", function(){
        $(this).parent().prev().remove();
        $(this).parent().remove();
    });
});
