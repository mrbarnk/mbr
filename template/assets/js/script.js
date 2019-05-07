/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
    //alert("ok");
        $.getJSON('https://api.coinmarketcap.com/v1/ticker/',
            function (json) {
                var tr;
                var mr;

                for (var i = 0; i < json.length; i++) {
                    if((i+1)<= 8){
                    if (json[i].percent_change_24h > 0)
                    {
                        tr = $('<tr><td>'+ (i+1) +'</td><td><img src="https://s2.coinmarketcap.com/static/img/coins/32x32/' + json[i].rank + '.png" alt="" class="img-fluid" /></td><td> ' + json[i].name + '</td><td>' + json[i].price_usd + '</td><td><i class=""></i> ' + json[i].percent_change_24h + '</td></tr>');
                    }else
                    {
                        tr = $('<tr><td>'+ (i+1) +'</td><td><img src="https://s2.coinmarketcap.com/static/img/coins/32x32/' + json[i].rank + '.png" alt="" class="img-fluid" /></td><td> ' + json[i].name + '</td><td>' + json[i].price_usd + '</td><td><i class=""></i> ' + json[i].percent_change_24h + '</td></tr>');
                    }
                }
                    $('#tablebody').append(tr);
                   // $('.marquee-with-options .marquee').append(mr);
                }

                $('.marquee').marquee({
                    duration: 30000,
                    gap: 50,
                    delayBeforeStart: 0,
                    direction: 'left',
                    duplicated: true
                });

            });

});