/**
 * Created by ogi on 23.2.16.
 */

$(document).ready(function(){
    var root = location.protocol + '//' + location.host;

    json_countries = (function () {
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
    })();//json_countries

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

    //**************************************************
    var countries = [];

    for( var k in json_countries){
        var country = json_countries[k]['country'];
        countries.push(country);
    }

    $( "#country_input" ).autocomplete({
        source: countries
    });

    //**************************************************

    $( "#city_input" ).on('click focus', function(){

        var cities = [];
        var country_input = $('#country_input').val();
        for( var j in json_cities){
            if(!country_input){
                var city = json_cities[j]['city'];
                cities.push(city);
            }else{
                var city = json_cities[j]['city'];
                if(json_cities[j]['country'] === country_input){
                    cities.push(city);
                }
            }

        }

        $( "#city_input" ).autocomplete({
            source: cities
        });

    });


});