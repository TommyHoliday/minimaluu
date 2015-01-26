jQuery.noConflict();
(function( $ ) {
	$(function() {

		// Site preloader
		$(window).load(function() { 
			$("#loader-inner").delay(400).fadeOut("fast", function(){
				$("#loader").delay(500).fadeOut("slow");
			});				
		});

		
		$(document).ready(function(){

			// Mobile Menu.
			$('#site-nav').hide();
			$('a#mobile-menu-btn').click(function () {
				$('#site-nav').slideToggle('fast');
				$('a#mobile-menu-btn').toggleClass('menu-btn-open');
			});

			// Ajax Loading Animation
			$("#load-animation").ajaxStart(function() {
				$(".nav-more").hide();
			    $(this).show();
			}).ajaxStop(function() {
				$(".nav-more").show();
			    $(this).hide();
			});


			// Ajax load more posts
			var loadMorePosts = function(e){
				e.preventDefault();
				var $container = $("#primary");
				var $loadMoreButton = $("#nav-ajax .nav-more");
				var $nextPageLink = $loadMoreButton.find("a").attr("href");
				
				// do the ajax magic
				$.post($nextPageLink, function(data){
					var $mainWrap = $("#main-wrap", data);
					var $content = $mainWrap.find("#primary article");

					// add the loaded posts
					$container.append($content);

					// grab the next PageLink
					var $nextLoadMoreButton = $mainWrap.find("#nav-ajax .nav-more");
					$loadMoreButton.replaceWith($nextLoadMoreButton);

					
				}, "html");				
			} // end loadMorePosts


			// Bind Functions
			$(document).on("click", "#nav-ajax .nav-more", loadMorePosts);



		}); // end document ready

	});
})(jQuery);















