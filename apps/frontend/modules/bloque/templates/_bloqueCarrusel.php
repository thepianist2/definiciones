<style type="text/css">
/*
Skin Name: Nivo Slider Default Theme
Skin URI: http://nivo.dev7studios.com
Skin Type: flexible
Description: The default skin for the Nivo Slider.
Version: 1.2
Author: Gilbert Pellegrom
Author URI: http://dev7studios.com
*/

.theme-default .nivoSlider {
	position:relative;
	background:#fff url(/images/loading.gif) no-repeat 50% 50%;
    margin-bottom:50px;
    -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
    box-shadow: 0px 1px 5px 0px #4a4a4a;
}
.theme-default .nivoSlider img {
	position:absolute;
	top:0px;
	left:0px;
	display:none;
}
.theme-default .nivoSlider a {
	border:0;
	display:block;
}

.theme-default .nivo-controlNav {
	text-align: center;
	padding: 20px 0;
}
.theme-default .nivo-controlNav a {
	display:inline-block;
	width:22px;
	height:22px;
	background:url(/images/bullets.png) no-repeat;
	text-indent:-9999px;
	border:0;
	margin: 0 2px;
}
.theme-default .nivo-controlNav a.active {
	background-position:0 -22px;
}

.theme-default .nivo-directionNav a {
	display:block;
	width:30px;
	height:30px;
	background:url(/images/arrows.png) no-repeat;
	text-indent:-9999px;
	border:0;
}
.theme-default a.nivo-nextNav {
	background-position:-30px 0;
	right:15px;
}
.theme-default a.nivo-prevNav {
	left:15px;
}

.theme-default .nivo-caption {
    font-family: Helvetica, Arial, sans-serif;
}
.theme-default .nivo-caption a {
    color:#fff;
    border-bottom:1px dotted #fff;
}
.theme-default .nivo-caption a:hover {
    color:#fff;
}

.theme-default .nivo-controlNav.nivo-thumbs-enabled {
	width: 100%;
}
.theme-default .nivo-controlNav.nivo-thumbs-enabled a {
	width: auto;
	height: auto;
	background: none;
	margin-bottom: 5px;
}
.theme-default .nivo-controlNav.nivo-thumbs-enabled img {
	display: block;
	width: 120px;
	height: auto;
}

/*
 * jQuery Nivo Slider v3.0.1
 * http://nivo.dev7studios.com
 *
 * Copyright 2012, Dev7studios
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */
 
/* The Nivo Slider styles */
.nivoSlider {
	position:relative;
	width:100%;
	height:auto;
	overflow: hidden;
}
.nivoSlider img {
	position:absolute;
	top:0px;
	left:0px;
}
.nivo-main-image {
	display: block !important;
	position: relative !important; 
	width: 100% !important;
}

/* If an image is wrapped in a link */
.nivoSlider a.nivo-imageLink {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	border:0;
	padding:0;
	margin:0;
	z-index:6;
	display:none;
}
/* The slices and boxes in the Slider */
.nivo-slice {
	display:block;
	position:absolute;
	z-index:5;
	height:100%;
	top:0;
}
.nivo-box {
	display:block;
	position:absolute;
	z-index:5;
	overflow:hidden;
}
.nivo-box img { display:block; }

/* Caption styles */
.nivo-caption {
	position:absolute;
	left:0px;
	bottom:0px;
	background:#000;
	color:#fff;
	width:100%;
	z-index:8;
	padding: 5px 10px;
	opacity: 0.8;
	overflow: hidden;
	display: none;
	-moz-opacity: 0.8;
	filter:alpha(opacity=8);
	-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
	-moz-box-sizing: border-box;    /* Firefox, other Gecko */
	box-sizing: border-box;         /* Opera/IE 8+ */
}
.nivo-caption p {
	padding:5px;
	margin:0;
}
.nivo-caption a {
	display:inline !important;
}
.nivo-html-caption {
    display:none;
}
/* Direction nav styles (e.g. Next & Prev) */
.nivo-directionNav a {
	position:absolute;
	top:45%;
	z-index:9;
	cursor:pointer;
}
.nivo-prevNav {
	left:0px;
}
.nivo-nextNav {
	right:0px;
}
/* Control nav styles (e.g. 1,2,3...) */
.nivo-controlNav {
	text-align:center;
	padding: 15px 0;
}
.nivo-controlNav a {
	cursor:pointer;
}
.nivo-controlNav a.active {
	font-weight:bold;
}

/*=================================*/
/* Nivo Slider Demo
/* November 2010
/* By: Gilbert Pellegrom
/* http://dev7studios.com
/*=================================*/

/*====================*/
/*=== Reset Styles ===*/
/*====================*/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin:0;
	padding:0;
	border:0;
	outline:0;
	font-weight:inherit;
	font-style:inherit;
	font-size:100%;
	font-family:inherit;
	vertical-align:baseline;
}

table {
	border-collapse:separate;
	border-spacing:0;
}
caption, th, td {
	text-align:left;
	font-weight:normal;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content:"";
}
blockquote, q {
	quotes:"" "";
}
/* HTML5 tags */
header, section, footer,
aside, nav, article, figure {
	display: block;
}

/*===================*/
/*=== Main Styles ===*/
/*===================*/


a, a:visited {
	color:blue;
	text-decoration:none;
}
a:hover, a:active {
	color:#000;
	text-decoration:none;
}

#dev7link {
    position:absolute;
    top:0;
    left:50px;
    background:url(/images/dev7logo.png) no-repeat;
    width:60px;
    height:67px;
    border:0;
    display:block;
    text-indent:-9999px;
}

.slider-wrapper { 
	width: 105%; 
	margin: 20px auto;
}

.theme-default #slider {
    margin:100px auto 0 auto;
}
.theme-pascal.slider-wrapper,
.theme-orman.slider-wrapper {
    margin-top:150px;
}


</style>


    
    <?php  $fotos=$albums[0]->getImagen(); ?>
<div id="wrapper" style="margin-top: 60px;">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                
                <?php foreach ($fotos as $foto) { ?>
                <img src="<?php echo '/uploads/'.$foto->getImagen(); ?>" data-thumb="<?php echo '/uploads/'.$foto->getImagen(); ?>" alt="" title="<?php echo $foto->getDescripcion(); ?>" />
                
             <?php   } ?>
            </div>

        </div>

    </div>

    <script type="text/javascript">
    jQuery(window).load(function() {
        jQuery('#slider').nivoSlider();
    });
    </script>