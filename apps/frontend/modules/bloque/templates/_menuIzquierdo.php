<style type="text/css">/* BySlideMenu CSS rules */
ul {
    position: relative;
    overflow: hidden;
}
#byslidemenu_vertical{
        position: relative;
    overflow: hidden;
}

li {
    position: absolute;
    width: 300px;
    height: 225px;
}

#imagenMenu{
    position: absolute;
    width: 150px;
    height: 225px;
}





</style>
<script type="text/javascript">
jQuery.noConflict();
window.addEvent('load', function(){

//	/* Default options */
//	new BySlideMenu();
//
//	/* Using autoSlide */
//	new BySlideMenu({
//		'container' : 'byslidemenu_autoslide',
//		'autoSlide' : true,
//		'autoSlideDelay' : 1000,
//		'autoRestore' : false
//	});
//
//	/* Using skip class */
//	new BySlideMenu({
//		'container' : 'byslidemenu_skip',
//		'skipClass' : 'skip' // "skip" is the default value
//	});
//
//	/* Using triggers and selector */
//	new BySlideMenu({
//		'container' : 'byslidemenu_trigger',
//		'selector' : 'li',
//		'triggerSelector' : '.trigger' // ".trigger" is the default value
//	});
//
//	/* Fx */
//	new BySlideMenu({
//		'container' : 'byslidemenu_fx',
//		'fxOptions' : { 'duration' : 350, 'transition' : 'bounce:out' }
//	});

	/* Menu in vertical mode */
	new BySlideMenu({
		'container' : 'byslidemenu_vertical',
		'vertical' : true,
		'fxOptions' : { 'duration' : 800, 'transition' : 'bounce:out' }
	});
});

/*
To set options :

new BySlideMenu({key: value, key: value, ...})

Available options :

name            | type     | default          | description
=====================================================================================================================
container       | string   | byslidemenu      | Container ID or element
---------------------------------------------------------------------------------------------------------------------
selector        | string   | li               | The CSS selector of the slides, inside the container
---------------------------------------------------------------------------------------------------------------------
compressSize    | integer  | 50               | Size (in pixels) of the closed elements
---------------------------------------------------------------------------------------------------------------------
vertical        | boolean  | false            | Is the menu vertical ?
---------------------------------------------------------------------------------------------------------------------
skipClass       | string   | skip             | Class name of the slides to skip
---------------------------------------------------------------------------------------------------------------------
defaultClass    | string   | default          | Class name of the default slide to show on load. If no default slide
                |          |                  | is defined in HTML, then all slide will be equally spaced
---------------------------------------------------------------------------------------------------------------------
triggerSelector | string   | .trigger         | Trigger selector inside the slide,
                |          |                  | if no trigger is found whole slide is used
---------------------------------------------------------------------------------------------------------------------
eventType       | string   | mouseenter       | Define which event run animation (probably mousenter or click)
---------------------------------------------------------------------------------------------------------------------
autoSlide       | boolean  | false            | If true, the slides switch automatically every X seconds (see below) 
---------------------------------------------------------------------------------------------------------------------
autoSlideDelay  | integer  | 3000             | Delay between each slide when autoSlide is true.
---------------------------------------------------------------------------------------------------------------------
autoRestore     | boolean  | true             | If true, restore to the default slide when the mouse leave the menu
---------------------------------------------------------------------------------------------------------------------
onStart         | function | $empty           | Function to run when a slide starts to open. Arguments passed are
                |          |                  | the slide element and the index of the slide which starts to open
---------------------------------------------------------------------------------------------------------------------
onComplete      | function | $empty           | Function to run when a slide opening is complete. Arguments passed
                |          |                  | are the slide element and the index of the slide which is open
---------------------------------------------------------------------------------------------------------------------
onRestore       | function | $empty           | Function to run when a slide starts to close. Arguments passed are
                |          |                  | the slide element and the index of the slide which starts to close
---------------------------------------------------------------------------------------------------------------------
fxOptions       | object   | { duration: 300,        | Duration of the animation
                |          | transition: 'linear' }  | Mootools transition to use for the animation
---------------------------------------------------------------------------------------------------------------------
*/



</script>

<h1>Menu</h1>
<div id="byslidemenu_vertical">
    <a href="<?php echo url_for('default/index') ?>"><img id="imagenMenu" src="/images/Definicionesff.png" alt="" /></a>
    <a href="<?php echo url_for('estudiar/index') ?>"><img id="imagenMenu" src="/images/estudiarff.png" alt="" /></a>
    <a href="<?php echo url_for('usuario/index') ?>"><img id="imagenMenu" src="/images/usuarioff.png" alt="" /></a>
    <a href="<?php echo url_for('documento/index') ?>"><img id="imagenMenu" src="/images/usuarioff.png" alt="" /></a>

</div>