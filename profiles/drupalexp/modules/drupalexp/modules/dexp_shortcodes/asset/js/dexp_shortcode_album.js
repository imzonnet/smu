jQuery(document).ready(function($){
    $('.dexp-album').each(function() {
        var thisEle = $(this), id= thisEle.attr('id'),
            photoItem = thisEle.find('.photo-item'),
            count = photoItem.length,
            firstPhoto = photoItem.first();
        if( count > 1 ) {
            $('.footer', thisEle).append('<i class="fa fa-image"></i>');
            $(firstPhoto).append('<div class="overlay"><span><i class="fa fa-search"></i>View Album</span></div>');
        }
    });
});