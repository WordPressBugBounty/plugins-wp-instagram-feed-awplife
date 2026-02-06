<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$igp_hover_icon = sanitize_text_field(IFGP_PLUGIN_URL."/img/instagram-gallery-premium.png");
?>
<style>
.instagram-lightbox-modal .instagram-media {
    max-width: 85% !important;
    max-height: 85vh !important;
    width: auto !important;
    height: auto !important;
    object-fit: contain;
    margin: 0 auto;
    display: block;
}

.instagram-lightbox-modal .instagram-image-section {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

@media (max-width: 768px) {
    .instagram-lightbox-modal .instagram-media {
        max-width: 95% !important;
        max-height: 70vh !important;
    }
}
</style>
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery(function($) {
			var scrollTo = 0;
			var updateArrows = function(){
				$('.carouselGallery-right').removeClass('disabled');
				$('.carouselGallery-left').removeClass('disabled');
				var curIndex = $('.carouselGallery-carousel.active').data('index');
				updateArrows.nbrOfItems = updateArrows.nbrOfItems || $('.carouselGallery-carousel').length -1;

				curIndex === updateArrows.nbrOfItems && $('.carouselGallery-right').addClass('disabled');
				curIndex === 0 && $('.carouselGallery-left').addClass('disabled');
			}
			$('.carouselGallery-carousel').on('click', function(e){
				scrollTo = $('body').scrollTop();
			$('body').addClass('noscroll');
			$('body').css('position', 'fixed');
				$('.carouselGallery-carousel').removeClass('active');
				$(this).addClass('active');
				showModal($(this));
				updateArrows();
			});

			$('body').on('click', '.carouselGallery-right, .carouselGallery-left', function(e){
				if($(this).hasClass('disabled')) return;
				var curIndex = $('.carouselGallery-carousel.active').data('index');
				var nextItemIndex = parseInt(curIndex+1);
				if($(this).hasClass('carouselGallery-left')){
					nextItemIndex-=2;
				}
				var nextItem = $('.carouselGallery-carousel[data-index='+nextItemIndex+']');


				if(nextItem.length > 0){
					$('.carouselGallery-carousel').removeClass('active');


					$('.carouselGallery-wrapper').addClass('transitioning');
					$('.instagram-lightbox-modal, .carouselGallery-modal').addClass('closing');

					setTimeout(function(){
						$('body').find('.carouselGallery-wrapper').remove();
						showModal(nextItem);
						nextItem.addClass('active');
					}, 250);
				}
				updateArrows();
			});
			var modalHtml = '';
			showModal = function(that){

				var rawData = {
					username: that.data('username'),
					imagedate: that.data('imgdate'),
					imagetext: that.data('imagetext'),
					imagepath: that.data('imagepath'),
					url: that.data('url'),
					posturl: that.data('posturl')
				};



				var username = (rawData.username && rawData.username !== 'undefined' && rawData.username !== '') ? rawData.username : 'Unknown User';
				var imagedate = (rawData.imagedate && rawData.imagedate !== 'undefined' && rawData.imagedate !== '') ? rawData.imagedate : 'Recently';
				var imagetext = (rawData.imagetext && rawData.imagetext !== 'undefined' && rawData.imagetext !== '') ? rawData.imagetext : 'No caption available';
				var imagepath = (rawData.imagepath && rawData.imagepath !== 'undefined' && rawData.imagepath !== '') ? rawData.imagepath : '';
				var carouselGalleryUrl = (rawData.url && rawData.url !== 'undefined' && rawData.url !== '') ? rawData.url : '#';
				var postURL = (rawData.posturl && rawData.posturl !== 'undefined' && rawData.posturl !== '') ? rawData.posturl : '#';

				maxHeight = $(window).height()-100;
				var tags = (imagetext && imagetext !== 'No caption available') ? imagetext.split('#') : ['No caption available'];
				
				if (jQuery('.carouselGallery-wrapper').length === 0) {
						if(typeof imagepath !== 'undefined' && imagepath !== '' && imagepath !== null) {
							modalHtml = "<div class='carouselGallery-wrapper instagram-lightbox-overlay'>";
							modalHtml += "<div class='carouselGallery-modal instagram-lightbox-modal'>";
							modalHtml += "<span class='carouselGallery-left instagram-nav-arrow' title='Previous'><svg width='20' height='20' viewBox='0 0 24 24' fill='none'><path d='M15 18l-6-6 6-6' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg></span>";
							modalHtml += "<span class='carouselGallery-right instagram-nav-arrow' title='Next'><svg width='20' height='20' viewBox='0 0 24 24' fill='none'><path d='M9 18l6-6-6-6' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg></span>";
							modalHtml += "<span class='instagram-close-btn' title='Close'>&times;</span>";
							modalHtml += "<div class='instagram-modal-container'>";
							modalHtml += "<div class='instagram-content-wrapper'>";
							modalHtml += "<div class='instagram-image-section'>";
							if(that[0].attributes[1].value == 'VIDEO') {
								modalHtml += "<video class='instagram-media' controls>";
								modalHtml += "<source src='"+imagepath+"'>";
								modalHtml += "</video>";
							} else {
								modalHtml += "<img class='instagram-media' src='"+imagepath+"' alt='Instagram Image'>";
							}
							modalHtml += "</div>";
							modalHtml += "<div class='instagram-sidebar'>";
							modalHtml += "<div class='instagram-header'>";
							modalHtml += "<div class='instagram-user-info'>";
							modalHtml += "<div class='instagram-avatar'>";
							modalHtml += "<img src='<?php echo esc_attr( IFGP_PLUGIN_URL . "img/insta-icon.png" ); ?>' alt='User Avatar'>";
							modalHtml += "</div>";
							modalHtml += "<div class='instagram-username'>";
							modalHtml += "<a href='"+postURL+"' target='_blank'>"+username+"</a>";
							modalHtml += "</div>";
							modalHtml += "</div>";
							modalHtml += "<div class='instagram-follow-btn'>";
							modalHtml += "<a href='https://www.instagram.com/"+username+"' target='_blank' class='instagram-follow-link'>Follow</a>";
							modalHtml += "</div>";
							modalHtml += "</div>";
							modalHtml += "<div class='instagram-content'>";
							modalHtml += "<div class='instagram-caption'>";
							modalHtml += "<span class='instagram-username-caption'><a href='"+postURL+"' target='_blank'>"+username+"</a></span>";
							modalHtml += "<span class='instagram-text'>";
									if(tags && tags.length > 0) {
										for(key in tags) {
											if(tags.hasOwnProperty(key)) {
												if (key != 0 && tags[key] && tags[key].trim() !== ''){
													var value = tags[key].trim();
													modalHtml += "<a href='https://www.instagram.com/explore/tags/"+value+"' target='_blank' class='instagram-hashtag'>#"+value+"</a> ";
												}
												else if(key == 0 && tags[key] && tags[key].trim() !== ''){
													var value = tags[key].trim();
													modalHtml += value + " ";
												}
											}
										}
									}
							modalHtml += "</span>";
							modalHtml += "</div>";
							modalHtml += "</div>";
							modalHtml += "<div class='instagram-actions'>";
							modalHtml += "<div class='instagram-action-buttons'>";
							modalHtml += "<a href='"+postURL+"' target='_blank' class='instagram-action-btn'>";
							modalHtml += "<svg width='24' height='24' viewBox='0 0 24 24' fill='none'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>";
							modalHtml += "</a>";
							modalHtml += "<a href='"+postURL+"' target='_blank' class='instagram-action-btn'>";
							modalHtml += "<svg width='24' height='24' viewBox='0 0 24 24' fill='none'><path d='M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>";
							modalHtml += "</a>";
							modalHtml += "<a href='"+postURL+"' target='_blank' class='instagram-action-btn'>";
							modalHtml += "<svg width='24' height='24' viewBox='0 0 24 24' fill='none'><path d='M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/><polyline points='16,6 12,2 8,6' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/><line x1='12' y1='2' x2='12' y2='15' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>";
							modalHtml += "</a>";
							modalHtml += "</div>";
							modalHtml += "<div class='instagram-date'>"+imagedate+"</div>";
							modalHtml += "</div>";
							modalHtml += "</div></div></div></div>";
							$('body').append(modalHtml).addClass('instagram-lightbox-open');
						}
						
					}
					

					var insta_lightbox_content_data = jQuery('.insta_lightbox_content_data').height();
					//console.log(insta_lightbox_content_data);
					if (insta_lightbox_content_data > 400) {
						jQuery('.carouselGallery-modal-text').css('overflow-y','scroll');
					}
				};
				
			  
				

				jQuery('body').on('click', '.instagram-lightbox-overlay, .carouselGallery-wrapper', function(e) {
					if(jQuery(e.target).hasClass('instagram-lightbox-overlay') || jQuery(e.target).hasClass('carouselGallery-wrapper')){
						removeModal();
					}
				});


				jQuery('body').on('click', '.instagram-close-btn', function(e){
					e.preventDefault();
					e.stopPropagation();
					removeModal();
				});


				jQuery('body').on('click', '.carouselGallery-modal .iconscircle-cross', function(e){
					e.preventDefault();
					e.stopPropagation();
					removeModal();
				});


				jQuery('body').on('click', '.instagram-lightbox-modal, .carouselGallery-modal', function(e){
					e.stopPropagation();
				});


				jQuery('body').on('dblclick', '.instagram-media', function(e){
					e.preventDefault();
					removeModal();
				});

				 var removeModal = function(){

					jQuery('.instagram-lightbox-modal, .carouselGallery-modal').addClass('closing');


					setTimeout(function() {
						jQuery('body').find('.carouselGallery-wrapper').fadeOut(200, function() {
							jQuery(this).remove();
						});
					}, 200);

					jQuery('body').removeClass('noscroll instagram-lightbox-open');
					jQuery('body').css('position', 'static');
					jQuery('body').animate({scrollTop: scrollTo}, 0);
				};


				var carouselGalleryScrollMaxHeight = function() {
					if (jQuery('.carouselGallery-scrollbox').length) {
						maxHeight = $(window).height()-100;
						jQuery('.carouselGallery-scrollbox').css('max-height',maxHeight+'px');
					}
				}
				jQuery(window).resize(function() {
					clearTimeout(this.id);
					this.id = setTimeout(carouselGalleryScrollMaxHeight, 100);
				});
				document.onkeydown = function(evt) {
					evt = evt || window.event;
					if (evt.keyCode == 27) {
						removeModal();
					}
				};
		});
});
</script>