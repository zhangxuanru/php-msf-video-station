/**
 * Created by Administrator on 2018/1/23.
 */
function videoPlay(div,url,type,poster)
{
    var options = {
        controls: true,
        url: url,
        type: type,
        preload: true,
       // width:200,
        height:400,
        stretching:'fitwindow',
        poster:poster,
        autoplay: false // 如为 true，则视频将会自动播放
    };
    var player = new QiniuPlayer(div, options);
}

