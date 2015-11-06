$(document).ready(function () {
    $("a[rel=vdisplay]").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'titlePosition': 'outside',
        'speedIn': 600,
        'speedOut': 600,'hideOnContentClick': false,'autoDimensions':false,'width': 700,'height':500,
        'overlayShow': true,
        'overlayColor': '#000',
        'overlayOpacity': 0.9
    });
	
	$("a[rel=gallery_group]").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'titlePosition': 'outside',
        'speedIn': 600,
        'speedOut': 600,
        'overlayShow': true,
        'overlayColor': '#000',
        'overlayOpacity': 0.9
    });
});