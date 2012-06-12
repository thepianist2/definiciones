<script type="text/javascript">
jQuery(function(){
	jQuery('#carousel').infiniteCarousel({
		displayTime: 5000,
		textholderHeight : .20
	});
});
</script>
<style type="text/css">

#carousel {
	margin: 0 auto;
	width: 400px;
	height: 390px;
	padding: 0;
	overflow: scroll;
	border: 2px solid #999;
}
#carousel ul {
	list-style: none;
	width: 1500px;
	margin: 0;
	padding: 0;
	position: relative;
}
#carousel li {
	display: inline;
	float: left;
}
.textholder {
	text-align: left;
	font-size: small;
	padding: 6px;
	-moz-border-radius: 6px 6px 0 0;
	-webkit-border-top-left-radius: 6px;
	-webkit-border-top-right-radius: 6px;
}
</style>
    <?php  $fotos=$albums[0]->getImagen(); ?>
<br></br><br></br><br></br>
<div id="carousel" style="margin-left: 50px;">
	<ul>
            
            
            <?php foreach ($fotos as $foto) { ?>
            <li><img alt="" src="<?php echo '/uploads/'.$foto->getImagen(); ?>" width="720" height="450" /><p><?php echo $foto->getDescripcion(); ?></p>
		</li>
            <?php   } ?>
	</ul>
</div>
<br></br>