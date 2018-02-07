/**
 * Created by Administrator on 2018/1/24.
 */

$("#btnSend").click(function()
{
    var content = $("#message").val();
    var token   = $('#token').val();
    if(content.length == 0){
        alert('评论内容为空');
        return false;
    }
    if(token.length == 0 ){
        alert('非法请求');
        return false;
    }
    if(content.length < 10){
        alert('评论内容过少');
        return false;
    }
    $.ajax({
        type: 'POST',
        url: '/comment/subcomment',
        dataType: 'json',
        data: $("#comment-form").serialize(),
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function (data) {
             alert(data.msg);
        },
        error: function (data) {
            alert('网络不给力！请稍后重试');
        },
    });

})



