function addcart(id){
    // alert("ID:"+id);
    $.post("addcart.php", {"pro_id": id},function(data){
        namePro = $("#pro_name_"+id).text();
        pricePro = $("#pro_price_"+id).text();
        imgPro = $("#pro_image_"+id).attr("src");
        // alert(namePro + imgPro);
        $("#cartShow").attr("src",imgPro);
        $("#cartname").text(namePro);
        $("#cartprice").text(pricePro);
        $('#addCart').modal('show');
        $("#quanlitycart").text("("+data+")");
    });
}