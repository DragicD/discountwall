/**
 * Created by ogi on 24.2.16.
 */

$(document).ready(function(){

    function empty_value_and_remove_junk(){
        $('.address_input_class').val('');
        $('.address_input_class:not(.main_address_input_class)').parent().prev().remove();
        $('.address_input_class:not(.main_address_input_class)').parent().remove();
        $('.address_input_class:not(.main_address_input_class)').remove();
    }

    $( ".address_div").hide();

    $('#store_type').change(function(){
        if($(this).val() == 'online'){
            $( ".address_div").hide();
            $('#city_input').val('');
            empty_value_and_remove_junk();
        } else if($(this).val() == 'one_city'){
            $( ".address_div").show();
        } else {
            $( ".address_div").hide();
            $('#city_input').val('');
            empty_value_and_remove_junk();
        }
    });

    var i = 1;

    $( ".panel-body" ).on("click",".new_address_button", function(){
        var name = $(this).attr('name');
        var div_address = '<label class="col-md-4 control-label">Address name and number</label><div class="col-md-6 address_name_and_number'+i+'"> <input type="text" class="form-control address_input_class" name="city['+name+'][address][]" > <button class = "remove_address_button" type="button">-</button></div>';
        $(this).parent().prev().before(div_address);
        i++;
    });

    $( ".address_div" ).on("click",".remove_address_button", function(){
        $(this).parent().prev().remove();
        $(this).parent().remove();
    });

    // multiple cities page
    $( ".panel-body" ).on("click",".remove_address_button", function(){
        $(this).parent().prev().remove();
        $(this).parent().remove();
    });

    // multiple cities page
    $( ".panel-body" ).on("click",".delete_city_with_address", function(){
        $(this).parent().remove();
    });

    var j = 1;
    $( "#new_city_button" ).click(function(){

         var div_city ='<div class="multi_address_div"> <div class="form-group{{ $errors->has("city") ? " has-error" : "" }}"> <label class="col-md-4 control-label">City</label> <div class="col-md-6"> <input type="text" class="form-control city_input" name="city['+j+'][name]">';
         div_city += '<span class="help-block"> </span> </div> </div>';
         div_city += '<label class="col-md-4 control-label">Address name and number</label> <div class="col-md-6 address_name_and_number'+j+'">';
         div_city += '<input type="text" class="form-control" name="city['+j+'][address][0]"> </div>';
         div_city += '<label class="col-md-4 control-label">Add new address</label>  <div class="col-md-6">';
         div_city += '<button name="'+j+'" class = "new_address_button" type="button">+</button></div>';
         div_city += '<button  class = "delete_city_with_address" type="button">Delete address for this city</button> </div>';

        $("#new_city_button").parent().before(div_city);
        j++;
        i++;
    });
});
