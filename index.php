<!DOCTYPE html>
<head>

<?php include 'header.php'; ?>



</head>

<body>

<div class="stage">

	
<!-- 	<div id="SLDR-ONE" class="sldr">
		<ul class="wrp animate">
			<li class="elmnt-one"><div class="skew"><div class="wrap"><img src="img/bangunan.jpg" width="1000" height="563"></div></div></li>
			<li class="elmnt-two"><div class="skew"><div class="wrap"><img src="img/kegiatan2.jpg" width="1000" height="563"></div></div></li>
			<li class="elmnt-three"><div class="skew"><div class="wrap"><img src="img/kegiatan3.jpg" width="1000" height="563"></div></div></li>
			
		</ul>
	</div> -->

	<div class="clear"></div>

	
	<ul class="selectors">
		<li class="focalPoint"><a href="">•</a></li><li><a href="">•</a></li><li><a href="">•</a></li><li><a href="">•</a></li>
	</ul>

	
	

</div>

<div class="container">
<div class="row">
<div class="col-md-12">

<h3>Berita / Informasi</h3>

<div class="col-md-12">

  <?php
                    ini_set("display_errors",0);
                      
                        $query = "SELECT * FROM berita order by id DESC";       
                        $records_per_page=3;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->berita($newquery);
                    
                     ?>
             
                   


</div>
</div>
<div class="col-md-12">
 					<center>
                        <div class="pagination-wrap">
                        <?php $crud->paginglink($query,$records_per_page); ?>
                        </div>
                    </center>
</div>
</div>





</body>
<?php include 'footer.php'?>







<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.sldr.js"></script>
<script>

$( window ).load( function() {

	$( '.sldr' ).each( function() {
		var th = $( this );
		th.sldr({
			focalClass    : 'focalPoint',
			offset        : th.width() / 2,
			sldrWidth     : 'responsive',
			nextSlide     : th.nextAll( '.sldr-nav.next:first' ),
			previousSlide : th.nextAll( '.sldr-nav.prev:first' ),
			selectors     : th.nextAll( '.selectors:first' ).find( 'li' ),
			toggle        : th.nextAll( '.captions:first' ).find( 'div' ),
			sldrInit      : sliderInit,
			sldrStart     : slideStart,
			sldrComplete  : slideComplete,
			sldrLoaded    : sliderLoaded,
			sldrAuto      : true,
			sldrTime      : 5000,
			hasChange     : true
		});
	});

});

/**
 * Sldr Callbacks
 */

/**
 * When the sldr is initiated, before the DOM is manipulated
 * @param {object} args the slides, callback, and config of the slider
 * @return null
 */
function sliderInit( args ) {

}

/**
 * When individual slides are loaded
 * @param {object} args the slides, callback, and config of the slider
 * @return null
 */
function slideLoaded( args ) {

}

/**
 * When the full slider is loaded, after the DOM is manipulated
 * @param {object} args the slides, callback, and config of the slider
 * @return null
 */
function sliderLoaded( args ) {

}

/**
 * Before the slides change focal points
 * @param {object} args the slides, callback, and config of the slider
 * @return null
 */
function slideStart( args ) {

}

/**
 * After the slides are done changing focal points
 * @param {object} args the slides, callback, and config of the slider
 * @return null
 */
function slideComplete( args ) {

}

</script>

