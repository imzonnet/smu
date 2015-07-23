jQuery(document).ready(function($){
  $('.dexp-dropdown a.active').each(function(){
    $(this).parents('li.expanded').addClass('active');
  });
	$('.dexp-dropdown li.expanded').each(function(){
		var $this = $(this), $toggle = $('<span class="menu-toggler fa fa-caret-down"></span>');
		$toggle.click(function(){
			$(this).toggleClass('fa-angle-right fa-angle-down');
			$this.find('>ul').toggleClass('menu-open');
		});
		$this.find('> a, > .nolink').append($toggle);
	})
	$('.dexp-menu-toggler').click(function(){
		var $menu = $($(this).data('target'));
		if($menu != null){
			$menu.toggleClass('mobile-open');
		}
		return false;
	})
})