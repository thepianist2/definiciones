<script type="text/javascript">

//<![CDATA[


jQuery(document).ready(function () {

	//Append a div with hover class to all the LI
	jQuery('#navMenu li').append('<div class="hover"><\/div>');


	jQuery('#navMenu li').hover(
		
		//Mouseover, fadeIn the hidden hover class	
		function() {
			
			jQuery(this).children('div').stop(true, true).fadeIn('1000');	
		
		}, 
	
		//Mouseout, fadeOut the hover class
		function() {
		
			jQuery(this).children('div').stop(true, true).fadeOut('1000');	
		
	}).click (function () {
	
		//Add selected class if user clicked on it
		jQuery(this).addClass('selected');
		
	});

});

//]]>

</script>

<div style="text-align: center; float: left;">
<ul id="navMenu">
	<li><a href="<?php echo url_for('default/index') ?>">Home</a></li>
        <?php foreach ($contenidos as $contenido) { ?>
             <li><a href="<?php echo url_for('contenido/show?id='.$contenido->getId()) ?>"><?php echo ucfirst($contenido->getTitulo()); ?></a></li>
        <?php } ?>
             <li><a href="<?php echo url_for('sf_guard_signin') ?>">Conectarse</a></li>
</ul>
</div>
<br>
<?php if($sf_request->getParameter('action') != 'index' ){ ?>
<br></br><br></br><br></br>

<?php } ?>

