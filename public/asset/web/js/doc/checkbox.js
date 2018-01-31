$(function(){
    var demo=$("#form").Validform({
        tiptype:3,
        label:".label",
        showAllError:true,
        ajaxPost:false,
        dataType:{
            'positive':/^[1-9]\d*$/,
        },
    });

    $('#editor1').on('blur',function()
    {
        demo.check(false,'#discription-edit');
    });
});
