<!doctype html>
<html>
<head>
    <title>index</title>
    <style>
        html,ul{
            margin:0;padding:0;
            font-size:16px;
            background-color: gainsboro;
        }
        .div_head{
            position: relative;
            width:75em;
            height:7.5em;
            margin: 0 auto;
        }
        .div_icon{
            display:inline-block;
            width: 4em;
            height: 4em;
        }
        .div_icon > div{
            width:0;
            height:0;
            float:left;
        }
        .div_icon > div:nth-child(1){
            border-top: 1em solid gainsboro;
            border-right: 1em solid gainsboro;
            border-bottom: 1em solid green;
            border-left: 1em solid green;
        }
        .div_icon > div:nth-child(2){
            border-top: 1em solid red;
            border-right: 1em solid gainsboro;
            border-bottom: 1em solid gainsboro;
            border-left: 1em solid red;
        }
        .div_icon > div:nth-child(4){
            border-top: 1em solid yellow;
            border-right: 1em solid yellow;
            border-bottom: 1em solid gainsboro;
            border-left: 1em solid gainsboro;
        }
        .div_icon > div:nth-child(3){
            border-top: 1em solid gainsboro;
            border-right: 1em solid deepskyblue;
            border-bottom: 1em solid deepskyblue;
            border-left: 1em solid gainsboro;
        }
        .div_head > .div_name{
            display:inline-block;
            width:4em;
            height:4em;
            background-color: #00AA88;
        }
        .ul_head{
            position:absolute;
            bottom: 0;
            list-style-type:none;
            width:inherit;
            overflow: hidden;
        }
        .ul_head > li{
            float:left;
            width:15em;
            height:2.5em;
            text-align: center;
            line-height: 2.5em;
            background: cadetblue;
            color:whitesmoke;
            cursor:pointer;
        }
        .ul_head > li:hover{
            transform:scale(1.2);
            background: lightseagreen;
        }
        .div_main{
            width:75em;
            min-height:62.5em;
            margin:0 auto;
            overflow:hidden;
        }
    </style>
</head>
<body>
    <div class="div_head">
        <div class="div_icon"><div></div><div></div><div></div><div></div></div>
        <ul class="ul_head">
            <li>首页</li>
            <li>动态</li>
            <li>相册</li>
            <li>留言</li>
            <li>关于我们</li>
        </ul>
    </div>
    <div class="div_main">
    </div>
    <script>
//        var i = 1;
//        function fly(){
//            var divs = document.getElementsByClassName('div_icon')[0];
//            divs.style.transform = "rotate("+ i +"deg)";
//            if(i==360){
//                i = 1;
//            }
//            i++;
//        }
//        setInterval(function(){
//            fly();
//            },40);
    </script>
</body>
</html>