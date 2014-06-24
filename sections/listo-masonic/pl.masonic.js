
!function ($) {
	
	$(document).ready(function() {
		
		plMasonryLayout()
		$(window).resize( plMasonryLayout )
	
		//var filters = {};
        var filters = [];

		$('.masonic-nav-listo a').click(function(e){
			e.preventDefault()

			var $this = $(this);
		   	var $buttonGroup = $this.parents('.button-group');
  			var filterGroup = $buttonGroup.attr('data-filter-group');

            var inside =  jQuery.inArray( $this.attr('data-filter') ,filters );

            //filters[ filterGroup ] = $this.attr('data-filter');

            if (inside == -1 ){
                filters.push($this.attr('data-filter'));
            } else {
                filters.splice(inside,1);
            }

            $(this).toggleClass('is-checked');

/*			$('.masonic-nav-listo li').removeClass('pl-link active');
			$this.parent().addClass('pl-link active');*/	
			
			var clearIsoAnimation = null;
			clearTimeout(clearIsoAnimation);
		  	$('.isotope, .isotope .isotope-item').css('transition-duration','0.7s');
			clearIsoAnimation = setTimeout(function(){  $('.isotope, .isotope .isotope-item').css('transition-duration','0s'); },700);	 
			
/*			var selector = $(this).attr('data-filter')*/
			var	theIsotope = $(this).closest('.masonic-wrap').find('.isotope')

			var filterValue = '';
  			for ( var prop in filters ) {
  				if(filterValue == ''){ 					
  					filterValue += filters[ prop ];
  				}else{
  					filterValue += ", ";
    				filterValue += filters[ prop ];
  				}
  			}  			

  			theIsotope
  				.isotope({ filter: filterValue });

  			/*return false;*/
			
		})

        /*$('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'a', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).toggleClass('is-checked');
            });
        });*/

		$('a.sort-all').click(function(e){
			e.preventDefault()

			var $this = $(this);			

			var filter_all = $this.attr('data-filter');	

			$('.button-group li a.button-a.is-checked').removeClass('is-checked');
			
			var clearIsoAnimation = null;
			clearTimeout(clearIsoAnimation);
		  	$('.isotope, .isotope .isotope-item').css('transition-duration','0.7s');
			clearIsoAnimation = setTimeout(function(){  $('.isotope, .isotope .isotope-item').css('transition-duration','0s'); },700);	 
			
			var	theIsotope = $(this).closest('.masonic-wrap').find('.isotope') 			

  			theIsotope
  				.isotope({ filter: filter_all });
			
		})


		function plMasonryLayout( ){
			
				var element = $(this)
				, 	format = element.data('format')
				,	layoutMode = ( format == 'grid' ) ? 'cellsByRow' : 'masonry'
				,	scrollSpeed
				, 	easing
				, 	shown = element.data('shown') || 3
				,	scrollSpeed = element.data('scroll-speed') || 700
				,	easing = element.data('easing') || 'linear'
				,	numberCols = 3
			//	,	bodySize = getComputedStyle(document.body, ':after').getPropertyValue('content'); 
	
				$('.masonic-gallery-listo').each(function(  ){
			
						var theGallery = $(this)
						
						theGallery.imagesLoaded(  function(){
							
							var windowWidth = window.innerWidth
							,	galWidth = theGallery.width()
							,	masonrySetup = { }
							,	numCols

							if( windowWidth >= 1900 ){								
								numCols = 6
							} else if( windowWidth > 1600 ){								
								numCols = 5
							} else if ( windowWidth >= 1300 ){
								numCols = 4
							} else if ( windowWidth >= 990 ){
								numCols = 3
							} else if ( windowWidth >= 470 ){
								numCols = 2
							} else {
								numCols = 1
							}

							masonrySetup = {
								columnWidth: parseInt( galWidth / numCols )
								//columnWidth: 300, gutter: 20
							}


							theGallery.isotope({
								resizable: false, 
								itemSelector : 'li',
								filter: '*',
								layoutMode: layoutMode,
								masonry: masonrySetup
							}).isotope( 'reLayout' )


							plPrint('numcols'+numCols)
							
						})
						
				})
			
			
		}
		
		
	})
}(window.jQuery);

