
/*---------- last 5 items Start ---------*/
ctx1 = $("#last_item_chart");

// console.log($('#last_item').attr('data-attr'));
// console.log($.parseJSON($('#last_item').attr('data-attr')));

var last_item_data = $.parseJSON($('#last_item').attr('data-attr'));
    var last_item_count = $('#last_item').attr('data-count');
    var date_ar = [];
    var name_ar = [];
    var price_ar = [];
    var x_arr = [];
    for(var i = 0; i <= last_item_count; i++){
        var testArray = i in last_item_data;
        if(testArray == true && last_item_data[i]['order_item_name'] != 'Flat rate'){
            {
                date_ar.push(last_item_data[i]['post_date']);
                var t = last_item_data[i]['order_item_name'] + "(" + last_item_data[i]['post_date'] + ")";
                x_arr.push(t)
                name_ar.push(last_item_data[i]['order_item_name']);
                price_ar.push(last_item_data[i]['meta_value']);
            }
        }
    }

var myChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: x_arr,
        datasets: [{
            label: 'Total Price',
            data: price_ar,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
/*===============last 5 items End ===================*/



/*-------------  Star Product Start -----------------------*/

ctx2 = $("#star_product_chart");

    var star_prd_data = $.parseJSON($('#star_product').attr('data-attr'));
    var star_prd_count = $('#star_product').attr('data-count');
    var views = [];
    var sold = [];
    var title = [];
    var series = [];
    var bg_color = [];

    for(var i = 0; i <= star_prd_count; i++){
        var testArray = i in star_prd_data;
        if(testArray == true){
            views.push(star_prd_data[i]['views']);
            sold.push(parseFloat(star_prd_data[i]['total_sales']));
            title.push(star_prd_data[i]['title']);
            series.push(star_prd_data[i]['title']+' (Total Views: '+star_prd_data[i]['views']+')');
            bg_color.push(getRandomColor());

        }
    }

    var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: series,
        datasets: [{
            label: 'Number of Times Sold',
            data: sold,
            backgroundColor: bg_color,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

/*================ Star product end =======================*/



/*------------------ reprice products starts -----------------*/
var ctx5 = $("#reprice_product_chart");
var reprice_prd_data = $.parseJSON($('#reprice_product').attr('data-attr'));
var reprice_prd_count = $('#reprice_product').attr('data-count');
var views_reprice = [];
var sold_reprice = [];
var title_reprice = [];
var series = [];
var bg_color = [];
for(var i = 0; i <= reprice_prd_count; i++){
    var testArray = i in reprice_prd_data;
    if(testArray == true){
        views_reprice.push(parseInt(reprice_prd_data[i]['views']));
        sold_reprice.push(parseInt(reprice_prd_data[i]['total_sales']));
        title_reprice.push(reprice_prd_data[i]['title']);
        series.push(reprice_prd_data[i]['title'] + ' (Views: '+parseFloat(reprice_prd_data[i]['views']) + ')');
            bg_color.push(getRandomColor());
    }
}



    // console.log(series);
    var myChart5 = new Chart(ctx5, {
    type: 'bar',
    data: {
        labels: series,
        datasets: [{
            label: 'Number of Times Sold',
            data: sold_reprice,
            backgroundColor: bg_color,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
         title: {
            display: true
        }
    }
});


/*------------------ reprice products ends -----------------*/

/*--------------------------  rethink products start -------------------*/

// console.log($('#rethink_product').attr('data-attr'));

var ctx3 = $("#rethink_product_chart");

 var rethink_prd_data = $.parseJSON($('#rethink_product').attr('data-attr'));
    var rethink_prd_count = $('#rethink_product').attr('data-count');
    var views_rethink = [];
    var sold_rethink = [];
    var title_rethink = [];
    var series = [];
    var bg_color = [];
    for(var i = 0; i <= rethink_prd_count; i++){
        var testArray = i in rethink_prd_data;
        if(testArray == true){
            views_rethink.push(parseFloat(rethink_prd_data[i]['views']));
            sold_rethink.push(parseFloat(rethink_prd_data[i]['total_sales']));
            title_rethink.push(rethink_prd_data[i]['title']);
            series.push(rethink_prd_data[i]['title'] + ' (Views: '+parseFloat(rethink_prd_data[i]['views']) + ')');
            bg_color.push(getRandomColor());
        }
    }

    // console.log(series);
    var myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: series,
        datasets: [{
            label: 'Number of Times Sold',
            data: sold_rethink,
            backgroundColor: bg_color,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
/*=========================   rethink products ends ====================*/



/*------------------------- Potential Products starts -------------------------*/
    var ctx4 = $("#potential_product_chart");

    var potential_prd_data = $.parseJSON($('#potential_product').attr('data-attr'));
    var potential_prd_count = $('#potential_product').attr('data-count');
    var views_potential = [];
    var sold_potential = [];
    var title_potential = [];
    var series = [];
    for(var i = 0; i <= potential_prd_count; i++){
        var testArray = i in potential_prd_data;
        if(testArray == true){
            views_potential.push(parseFloat(potential_prd_data[i]['views']));
            sold_potential.push(parseFloat(potential_prd_data[i]['total_sales']));
            title_potential.push(potential_prd_data[i]['title']);
            series.push(potential_prd_data[i]['title']+' (Views: '+potential_prd_data[i]['views']+')');
        }
    }

    var myChart4 = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: series,
        datasets: [{
            label: 'Number of Times Sold',
            data: sold_rethink,
            backgroundColor: bg_color,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
    
/*========================  Potential Products ends ===========================*/



/*=========================================================================*/

function medma_mtx_dynamicChart(total_sales, items_sold, total_revenue, text, categories){
    $('.container-wrapper').html('');
    $('.container-wrapper').html('<canvas id="container"></canvas>');
    var dyn_ctx = document.getElementById("container");
    
    var dynamicChart = new Chart(dyn_ctx, {
    type: 'bar',
    data: {
        labels: categories,
        datasets: [{
            label: text,
            data: total_revenue,
            backgroundColor: '#333',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

    
}

(function ($) {
    $(document).on('click','.analytic-btn',function(){
        $('.analytic-btn').removeClass('btn-primary');
        $('#search-analytics').removeClass('btn-primary');
        $(this).addClass('btn-primary');
        var ajaxurl = $('#ajaxUrl').val();
        if(ajaxurl == ''){
            var ajaxurl = $('#ajax_url').attr('data-value');
        }
        var type = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: ajaxurl,
            data: {
                'action':'medma_mtx_get_analytics',
                'type':type
            },
            success:function(data) {
                var result = JSON.parse(data);
                // console.log(result);
                medma_mtx_dynamicChart(result.total_sales, result.items_sold, result.total_revenue, result.text, result.days);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    });
}(jQuery));

(function ($) {
    $( document ).ready(function() {
        var ajaxurl = $('#ajaxUrl').val();
        if(ajaxurl == ''){
            var ajaxurl = $('#ajax_url').attr('data-value');
        }
        var type = 'today-analytics';
        $.ajax({
            method: "POST",
            url: ajaxurl,
            data: {
                'action':'medma_mtx_get_analytics',
                'type':type
            },
            success:function(data) {
                var result = JSON.parse(data);
                medma_mtx_dynamicChart(result.total_sales, result.items_sold, result.total_revenue, result.text, result.days);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    });
}(jQuery));

(function ($) {
  $(document).on('click','#search-analytics',function(){
        $('.analytic-btn').removeClass('btn-primary');
        $(this).addClass('btn-primary');
        var ajaxurl = $('#ajaxUrl').val();
        if(ajaxurl == ''){
            var ajaxurl = $('#ajax_url').attr('data-value');
        }
        var from_date = $("input[name=entry_from_date]").val();
        var to_date = $("input[name=entry_to_date]").val();
        //alert(from_date+"******"+to_date);
        if(from_date == ''){
            $("input[name=entry_from_date]").css('border','1px solid #ff0000');
        }
        
        if(to_date == ''){
            $("input[name=entry_to_date]").css('border','1px solid #ff0000');
        }
        
        if(from_date !== '' && to_date !== ''){
            //alert(ajaxurl);
            $.ajax({
                method: "GET",
                url: ajaxurl,
                data: {
                    'action':'popup_analytics',
                    'from_date':from_date,
                    'to_date':to_date
                },
                success:function(data) {
                    var result = JSON.parse(data);
                    // console.log(result);
                    $('#popup-view').text(result.countPopupView);
                    $('#popup-click').text(result.countPopupClick);
                    $('#strip-click').text(result.countStripClick);
                    $('#total-order').text(result.total_sales);
                    $('#total-items-sold').text(result.items_sold);
                    $('#total-revenue').find('span').text(result.total_revenue);
                    if(result.average_order_value) {
                        $('#average-order-value').find('span').text(result.average_order_value);
                    }else {
                        $('#average-order-value').find('span').text(0);
                    }
                    medma_mtx_dynamicChart(result.graph.total_sales, result.graph.items_sold, result.graph.total_revenue, result.graph.text, result.graph.days);
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        }
        
  });
}(jQuery));

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}