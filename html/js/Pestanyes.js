function canviarPestanya(pestanyes,pestanya) {
    pestanya = document.getElementById(pestanya.id);
    llistaPestanyes = document.getElementById(pestanyes.id);
    cpestanya = document.getElementById('c'+pestanya.id);
    llistacPestanyes = document.getElementById('contingut'+pestanyes.id);
    $(document).ready(function(){
	$('#contingutpestanyes>div').addClass('non-display');
	$("#llista-pestanyes>li").css({'background':'','padding-bottom':''});
        $(cpestanya).removeClass('non-display');
        $(pestanya).css({'background':'dimgray','padding-bottom':'2px'});
    });
}
