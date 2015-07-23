jQuery(document).ready(function($) {
  $('.dexp-container').find('.block-big-title').wrap('<div class="container">');
	//display search form and cart
  $(document).click(function () {
		$(".region-search, #block-search-form").removeClass("open");
		$(".region-cart, #block-commerce-cart-cart").removeClass("open");
   }),
  $(".region-search").click(function(e){e.stopPropagation();})
  $(".search-icon").click(function (e) {
	  e.stopPropagation();
	  $(".region-cart, #block-commerce-cart-cart").removeClass("open");
	  $(".region-search, #block-search-form").addClass("open").find('input[type=text]').focus();
  });
  $(".region-cart, #block-commerce-cart-cart").click(function (e) {
     e.stopPropagation();
	  $(".region-search, #block-search-form").removeClass("open");
	  $(this).addClass("open");
   })
	/* product detail*/
	var quantity = $(".commerce-add-to-cart .form-item-quantity, .views-field-edit-quantity .form-type-textfield");
	$(quantity).append('<span class="btn btn-info qty-plus"><i class="fa fa-plus"></i></span>');
	$(quantity).prepend('<span class="btn btn-info qty-minus"><i class="fa fa-minus"></i></span>');
	$('.qty-plus', $(quantity)).click(function(){$('#edit-quantity', $(quantity)).val( parseInt($('#edit-quantity', $(quantity)).val()) + 1 );
	});
	$('.qty-minus', $(quantity)).click(function(){
		if( parseInt($('#edit-quantity', $(quantity)).val()) > 1) {
			$('#edit-quantity', $(quantity)).val( parseInt($('#edit-quantity', $(quantity)).val()) - 1 );
		}
	});
	//Checkout
	$('.views-field-edit-quantity .qty-minus').click(function(){
		var id = '#'+$(this).parent().find('input').attr('id');
		if( parseInt($(id).val()) > 1) {
			$(id).val( parseInt($(id).val()) - 1 );
		}
	});
	$('.views-field-edit-quantity .qty-plus').click(function(){
		var id = '#'+$(this).parent().find('input').attr('id');
			$(id).val( parseInt($(id).val()) + 1 );
	});
  // Auto clear default value field
  $('.form-text,.form-textarea').cleardefault();
  // Tooltips 
  $('.bs-example-tooltips').tooltip({
    selector: "[data-toggle=tooltip]",
    container: "body"
  });
  $('.dtooltip').tooltip({
    container: 'body'
  });
  $("#bs-example a").popover();
  $('.product-bxslider').bxSlider({
		minSlides: 1,
		maxSlides: 3,
		slideWidth: 140,
		slideMargin: 5,
		moveSlides: 1,
		pager: false
  });
  $(".stat-count").each(function() {
    //alert('ok');
    $(this).data('count', parseInt($(this).html(), 10));
    $(this).html('0');
    count($(this));
  });
  //Go to top
  $(window).scroll(function(){
    if($(this).scrollTop() > 100) {
      $('#go-to-top').css({
        bottom:"25px"
      });
    } else {
      $('#go-to-top').css({
        bottom:"-100px"
      });
    }
  });
  
  $('#go-to-top').click(function(){
    $('html, body').animate({
      scrollTop: '0px'
    }, 800);
    return false;
  });
	
	$('.collapse','#section-top').click(function(e){
		e.stopPropagation();
		$('#section-top').toggleClass('open');
	});
 
});

function count($this) {
  var current = parseInt($this.html(), 10);
  current = current + 1; /* Where 50 is increment */

  $this.html(++current);
  if (current > $this.data('count')) {
    $this.html($this.data('count'));
  } else {
    setTimeout(function() {
      count($this)
    }, 50);
  }
}
jQuery.fn.cleardefault = function() {
  return this.focus(function() {
    if (this.value == this.defaultValue) {
      this.value = "";
    }
  }).blur(function() {
    if (!this.value.length) {
      this.value = this.defaultValue;
    }
  });
};