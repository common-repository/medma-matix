//script for tabs//
	jQuery(document).ready(function() {
		jQuery('.tabs .tab-links a').on('click', function(e)  {
			 var currentAttrValue = jQuery(this).attr('href');
			 jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
			jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
			e.preventDefault();
	 });
	 //script for fetch data//
	  var id= '20';
	  var version= '1.0';
	  var siteProtocol = "https";
	  //Ajax Call
	   $.ajax({
				//url:'http://192.168.0.19/ishaan/medma_extension/public/extension',
				url:siteProtocol+'://www.medma.in/apps/public/extension',
				type: 'POST',  
				data:{'id':id,'version':version} ,
				success: function (response) {
					 // console.log(response);
					   var i;
					   for(i=0;i<response.news.length;i++)
					   {
							  var newsId=response.news[i].id;
							  var newsLink=response.news[i].link; 
							  var news=response.news[i].news;
							  $('.header_box').append('<p class="news_cont'+i+'"><span id="news_id'+i+'" style="display:none;"></span><a href="" id="news_link'+i+'"><span id="news'+i+'"></span></a></p>');
							  $('#news_id'+i).text(newsId); 
							  $('#news'+i).html(news); 
							  $('#news_link'+i).attr('href',newsLink);
					   }
					   // console.log(response.data);
					   for(i=0;i<response.data.length;i++)
					   {
							   var company=response.data[i].company_name;
							   var logo=response.data[i].company_logo;
							   var new_version=response.data[i].new_version;
							   var ver_link=response.data[i].link;
							   var new_ver_name=response.data[i].name;
							   var version=response.data[i].version;
							 $('#support_tick_link').attr('href',response.data[i].support_link);
							  $('#knowl_link').attr('href',response.data[i].knowledgebase_link);
							  $('#demo_link').attr('href',response.data[i].demo_link);
							  $('#manual_link').attr('href',response.data[i].manual_link);
							  $('#video_demo_link').attr('href',response.data[i].video_demo_link);
							  $('#ext_logo').attr('src',response.data[i].extension_logo);
							  $('#ext_name').text(response.data[i].name);
							  $('#ver_text').text(response.data[i].version);
							  $('#ext_desc').text(response.data[i].description);
							  $('#company_url').attr('href',response.data[i].company_url);
							  
						}
						//alert($('#ver_text').text());alert(version);
						if($('#ver_text').text() != version)
						{
							$('#new_version').css('display','block');
							$('#new_vers').attr('href',ver_link);
							$('#new_ver_no').text(version);
						}
						//console.log(response.extensions.free);
						for(i=0;i<response.extensions.free.length;i++)
					   {
							var freeImg=response.extensions.free[i].image;
							var freeName=response.extensions.free[i].name;
							var freeRating=response.extensions.free[i].rating;
							var freeRatingElm = RatingElm(freeRating);
							var freePrice=response.extensions.free[i].price;
							var freeLink=response.extensions.free[i].link;
							//$('.free_text_row').append('<div class="col-md-3"><img id="freeext_img'+i+'" src=""/><p id="freeext_desc'+i+'"></p><p id="freeext_rating'+i+'"></p><p id="freeext_price'+i+'"></p><a href="" id="freeext_link'+i+'" class="BuyButton">Buy</a></div>');
							$('.free_text_row').append('<div class="col-md-3"><img id="freeext_img'+i+'" src=""/><p id="freeext_desc'+i+'"></p><p id="freeext_rating'+i+'"></p><a href="" id="freeext_link'+i+'" class="BuyButton">BUY</a></div>');
							$('#freeext_img'+i).attr('src',freeImg);
							$('#freeext_desc'+i).text(freeName);
							$('#freeext_rating'+i).html(freeRatingElm);
							$('#freeext_price'+i).text("$"+freePrice);
							$('#freeext_link'+i).attr('href',freeLink);
						 }
						for(i=0;i<response.extensions.paid.length;i++)
					   {
								var paidImg=response.extensions.paid[i].image;
								var paidDesc=response.extensions.paid[i].name;
								var paidRating=response.extensions.paid[i].rating;
								var paidRatingElm = RatingElm(paidRating);
								var paidPrice=response.extensions.paid[i].price;
								var paidLink=response.extensions.paid[i].link;
								$('.pay_text_row').append('<div class="col-md-3"><img id="payext_img'+i+'" src=""/><p id="payext_desc'+i+'"></p><p id="payext_rating'+i+'"></p><p id="payext_price'+i+'"></p><a href="" id="payext_link'+i+'" class="BuyButton">BUY</a></div>');
								$('#payext_img'+i).attr('src',paidImg);
								$('#payext_desc'+i).text(paidDesc);
								$('#payext_rating'+i).html(paidRatingElm);
								$('#payext_price'+i).text("$"+paidPrice);
								$('#payext_link'+i).attr('href',paidLink);
						}
						for(i=0;i<response.extensions.offers.length;i++)
					   {
								var offersImg=response.extensions.offers[i].image;
								var offersDesc=response.extensions.offers[i].name;
								var offersRating=response.extensions.offers[i].rating;
								var offersRatingElm = RatingElm(offersRating);
								var offersPrice=response.extensions.offers[i].price;
								var offersLink=response.extensions.offers[i].link;
								$('.offers_text_row').append('<div class="col-md-3"><img id="offerext_img'+i+'" src=""/><p id="offerext_desc'+i+'"></p><p id="offerext_rating'+i+'"></p><p id="offerext_price'+i+'"></p><a href="" id="offerext_link'+i+'" class="BuyButton">BUY</a></div>');
								$('#offerext_img'+i).attr('src',offersImg);
								$('#offerext_desc'+i).text(offersDesc);
								$('#offerext_rating'+i).html(offersRatingElm);
								$('#offerext_price'+i).text("$"+offersPrice);
								$('#offerext_link'+i).attr('href',offersLink);
								}
						},
				   
				});
		});
		function RatingElm(Rating) {
			var rateElm = '';
			for(var i=1;i<=5;i++) {
				if(i<=Rating)
					rateElm += '<i class="fa fa-star rating" aria-hidden="true"></i> ';
				else
					rateElm += '<i class="fa fa-star-o" aria-hidden="true"></i> ';
			}
			return rateElm;
		}
