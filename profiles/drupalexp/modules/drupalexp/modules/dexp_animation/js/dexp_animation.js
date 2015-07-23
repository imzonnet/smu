jQuery(document).ready(function($){
  $(".dexp-animate").each(function(){
    var $this = $(this);
    var animate_class = $this.data('animate'),delay=$this.data('animate-delay')||10;
    $this.appear(function(){
      setTimeout(function(){
        $this.addClass(animate_class + ' animated');
        $this.addClass('dexp-animate-visible');
      },delay);
    },{
      accX: 0,
      accY: 0,
      one:false
    });
  });
})
