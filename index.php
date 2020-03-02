<?php
$title = 'Random vėlikas';
//$class_remas = rand(1, 3);
$class_ratai = rand(1, 3);
//$class_sedyne = rand(1, 3);
//$class_vairas = rand(1, 3);
//?>





<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?php print $title ?></title>
        <style>
            div {
                position: absolute;
                background-size: cover;
            }
            .remas_pos {
                top: 25%;
                left: 30%;
            }
            .galinis_ratas_pos_1 {
                top: 45%;
                right: 69%;
            }
            .priekinis_ratas_pos_1 {
                top: 49%;
                left: 75%;
            }
            .galinis_ratas_pos_2 {
                top: 45%;
                left: 27%;
            }
            .priekinis_ratas_pos_2 {
                top: 53%;
                left: 58.5%;
            }
            .galinis_ratas_pos_3 {
                top: 56%;
                left: 26%;
            }
            .priekinis_ratas_pos_3 {
                top: 64%;
                left: 53%;
            }
            .sedyne_pos_1 {
                bottom: 75%;
                left: 20%;
            }
            .sedyne_pos_2 {
                top: 22%;
                left: 39%;
            }
            .sedyne_pos_3 {
                top: 45%;
                left: 37%;
            }
            .vairas_pos_1 {
                top: 2%;
                left: 63%;
            }
            .vairas_pos_2 {
                top: 21%;
                left: 54%;
            }
            .vairas_pos_3 {
                top: 32%;
                left: 49%;
            }
            .remas_1 {
                background-image: url("https://lh3.googleusercontent.com/proxy/bmMzilFR6X4bHUjbWiK6DCACMtBQUNh63kQVknb3NU1WZ2tJeeD3UjeLm-_MpBGLL4f9lF_keJ4T1d1-OsWr2sLGVyOFjHbTLRhGLNku_CQeAcxikXYkLfXZQmhifw");
                height: 300px;
                width: 420px;
            }
            .remas_2 {
                background-image: url("https://us.ritcheylogic.com/media/wysiwyg/road-logic-blue-us-1.png");
                height: 300px;
                width: 500px;
            }
            .remas_3 {
                background-image: url("https://cdn.shopify.com/s/files/1/0017/3791/6514/products/2019_SE_FLOVAL-FLYER-FRAMESET_SIDE_1024x.png?v=1544212540");
                height: 370px;
                width: 450px;
            }
            .ratai_1 {
                background-image: url("https://pluspng.com/img-png/bike-tire-png-please-note-400.png");
                height: 200px;
                width: 200px;
            }
            .ratai_2 {
                background-image: url("https://i.dlpng.com/static/png/6323587_preview.png");
                height: 200px;
                width: 200px;
            }
            .ratai_3 {
                background-image: url("https://pngimage.net/wp-content/uploads/2018/05/bicycle-wheel-png-1.png");
                height: 200px;
                width: 200px;
            }
            .sedyne_1 {
                background-image: url("https://www.derriereitalia.com/wp-content/uploads/2016/09/DSL_H_2_S_600x600_foto1_.png");
                height: 100px;
                width: 110px;
            }
            .sedyne_2 {
                background-image: url("https://i.ya-webdesign.com/images/bike-clip-leather-7.png");
                height: 100px;
                width: 110px;
            }
            .vairas_1 {
                background-image: url("https://www.ribblecycles.co.uk/media/catalog/product/cache/1/image/1120x840/9df78eab33525d08d6e5fb8d27136e95/i/m/img_8086.png");
                height: 130px;
                width: 200px;
            }
        </style>
    </head>
    <body>
        <div class="remas_pos remas_1">
            <div class="galinis_ratas_pos_1 ratai_<?php print $class_ratai?>"></div>
            <div class="priekinis_ratas_pos_1 ratai_<?php print $class_ratai?>"></div>
            <div class="sedyne_pos_1 sedyne_1"></div>
            <div class="vairas_pos_1 vairas_1"></div>
        </div>
    </body>
</html>
