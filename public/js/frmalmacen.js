$("#cancelar").click(function(){
    //alert("cancelando");
    hrefLocal("articulos");
});


function hrefLocal(url = ""){
    url = window.location.href;
    urls = url.split("/");
    alert(urls[0]+'//'+urls[2]+'/'+url);
}
