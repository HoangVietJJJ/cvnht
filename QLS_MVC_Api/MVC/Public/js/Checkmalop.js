$(document).ready(function(){
    $("#mymalop").keyup(function(){
        var malop=$(this).val();
        $.post("./Lophoc/Checkmalop",{ml:malop},function(data){
            $("#thongbao").html(data);
        });
    });
});
