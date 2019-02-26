<?php
	class slider_mod
	{
		public function code()
		{
		addDiv("slider");
			echo "
				<script src='content/pages/home/mod/slider/swipe.js'></script>
				<style>
				.swipe {
				  overflow: hidden;
				  visibility: hidden;
				  position: relative;
				}
				.swipe-wrap {
				  overflow: hidden;
				  position: relative;
				}
				.swipe-wrap > div {
				  float:left;
				  width:100%;
				  position: relative;
				}
				</style>
				<div id='mySwipe' style='max-width:500px;margin:0 auto' class='swipe'>
				  <div class='swipe-wrap'>
				  <div class='sliderhover' onhover onclick=\"window.location='https://nectrium.com'\"><img src=\"content/pages/home/mod/slider/img/0.png\" alt=\"WebTrustIn - Advanced Web Vulnerability Scanner\" /></div>
					<div class='sliderhover' onclick=\"window.location='?p=app'\"><img src=\"content/pages/home/mod/slider/img/2.jpg\" alt=\"\" /></div>
				  </div>
				</div>
				<div style='text-align:center;padding-top:20px;'>  
				<button type='button' onclick='mySwipe.prev()'><img src=\"content/pages/home/mod/slider/img/left.gif\" alt=\"left\"/></button> 
				<button type='button' onclick='mySwipe.next()'><img src=\"content/pages/home/mod/slider/img/right.gif\" alt=\"right\"/></button>
				</div>
				<script>
				var elem = document.getElementById('mySwipe');
				window.mySwipe = Swipe(elem, {
				   startSlide: 0,
				   speed: 5000,
				   auto: 5000,
				  continuous: true,
				  // disableScroll: true,
				  // stopPropagation: true,
				  // callback: function(index, element) {},
				  // transitionEnd: function(index, element) {}
				});</script>";
			endDiv();
		}
	}
?>