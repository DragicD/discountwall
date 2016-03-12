/**
 * Created by ogi on 23.2.16.
 */

$(document).ready(function(){
    var root = location.protocol + '//' + location.host;

    //this method returns all countries, I dont need him but I will leave it just in case
    /*json_countries = (function () {
        var json_countries = null;
        jQuery.ajax({
            'async': false,
            'global': false,
            'url': root+"/countries",
            'dataType': "json",
            'success': function (data) {
                json_countries = data;
            }
        });
        return json_countries;
    })();//json_countries*/

    json_cities = (function () {
        var json_cities = null;
        jQuery.ajax({
            'async': false,
            'global': false,
            'url': root+"/countries_with_cities",
            'dataType': "json",
            'success': function (data) {
                json_cities = data;
            }
        });
        return json_cities;
    })();//json_countries


    $( ".address_div" ).on('click focus', ".city_input", function(){

        var cities = [];

        for( var j in json_cities){
            var country = json_cities[j]['country'];
            var city = json_cities[j]['city'];
            cities.push(city+', '+country);
        }

        $( ".city_input" ).autocomplete({
            source: cities
        });

    });

    $( ".form-horizontal" ).on('click focus', ".city_input", function(){

        console.log('click');
        var cities = [];

        for( var j in json_cities){
            var country = json_cities[j]['country'];
            var city = json_cities[j]['city'];
            cities.push(city+', '+country);
        }

        $( ".city_input" ).autocomplete({
            source: cities
        });

    });


});