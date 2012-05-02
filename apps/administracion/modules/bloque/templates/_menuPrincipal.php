    <style type="text/css" media="screen">
    <!--

        h1 { 
            margin-bottom: 2px; 
        }

        /* slider specific CSS */
        .sliderGallery {
            background: url(http://static.jqueryfordesigners.com/demo/images/productbrowser_background_20070622.jpg) no-repeat;
            overflow: hidden;
            position: relative;
            padding: 10px;
            height: 160px;
            width: 560px;
        }
        
        .sliderGallery UL {
            position: absolute;
            list-style: none;
            overflow: none;
            white-space: nowrap;
            padding: 0;
            margin: 0;
        }
        
        .sliderGallery UL LI {
            display: inline;
        }
        
        .slider {
            width: 542px;
            height: 17px;
            margin-top: 140px;
            margin-left: 5px;
            padding: 1px;
            position: relative;
            background: url(http://static.jqueryfordesigners.com/demo/images/productbrowser_scrollbar_20070622.png) no-repeat;
        }
        
        .handle {
            position: absolute;
            cursor: move;
            height: 17px;
            width: 181px;
            top: 0;
            background: url(http://static.jqueryfordesigners.com/demo/images/productbrowser_scroller_20080115.png) no-repeat;
            z-index: 100;
        }
        
        .slider span {
            color: #bbb;
            font-size: 80%;
            cursor: pointer;
            position: absolute;
            z-index: 110;
            top: 3px;
        }
        
        .slider .slider-lbl1 {
            left: 50px;
        }
        
        .slider .slider-lbl2 {
            left: 107px;
        }
        
        .slider .slider-lbl3 {
            left: 156px;
        }

        .slider .slider-lbl4 {
            left: 280px;
        }

        .slider .slider-lbl5 {
            left: 455px;
        }
    -->
    </style>
    <script type="text/javascript" charset="utf-8">
        window.onload = function () {
            var container = $('div.sliderGallery');
            var ul = $('ul', container);
            
            var itemsWidth = ul.innerWidth() - container.outerWidth();
            
            $('.slider', container).slider({
                min: 0,
                max: itemsWidth,
                handle: '.handle',
                stop: function (event, ui) {
                    ul.animate({'left' : ui.value * -1}, 500);
                },
                slide: function (event, ui) {
                    ul.css('left', ui.value * -1);
                }
            });
        };
    </script>
    <div class="sliderGallery" style="margin-left: 100px;">
            <ul style="left: 0px;">
                <li><a href="<?php echo url_for('usuario/index'); ?>"><img style=" padding: 50px; width: 60px; height: 60px; margin-bottom: -20px;" title="Usuarios" src="/images/iconos/usuario.png"></a></li>  
                <li><a href="<?php echo url_for('contenido/index'); ?>"><img style=" padding: 50px; width: 60px; height: 60px; margin-bottom: -20px;" title="Contenido" src="/images/iconos/contenido.png"></a></li> 
                <li><a href="<?php echo url_for('default/index'); ?>"><img style=" padding: 50px; width: 60px; height: 60px; margin-bottom: -20px;" title="Palabras" src="/images/iconos/mundo.png"></a></li>
            </ul>
            <div class="slider ui-slider">
                <a href="javascript:void(0)" style="outline: medium none; border: medium none;"><div style="left: 0pt;" class="handle"></div></a>
<!--                <span class="slider-lbl1">Usuarios</span>
                <span class="slider-lbl3">Contenido</span>
                <span class="slider-lbl4">Palabras</span>-->
<!--                <span class="slider-lbl5">Servers</span>-->
            </div>
        </div>


