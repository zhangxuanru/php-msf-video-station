<footer>
		<div class="top-footer">
			<ul class="footer-social list-inline">
				<li><a target="_blank" href="https://twitter.com/"><i class="fa fa-twitter"></i> <span>Twitter</span></a></li>
				<li><a target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i> <span>Facebook</span></a></li>
				<li><a target="_blank" href="https://www.google.com"><i class="fa fa-google-plus"></i> <span>Google+</span></a></li>
				<li><a target="_blank" href="https://stackoverflow.com/"><i class="fa fa-youtube"></i> <span>stackoverflow</span></a></li>
				<li><a target="_blank" href="https://www.wikipedia.org/"><i class="fa fa-vimeo-square"></i> <span>wikipedia</span></a></li>
				<li><a target="_blank" href="https://segmentfault.com"><i class="fa fa-pinterest"></i> <span>segmentfault</span></a></li>
				<li><a target="_blank" href="http://www.51cto.com/"><i class="fa fa-rss"></i> <span>51CTO</span></a></li>
			</ul>
		</div>
		<div class="wrap-footer">
			<div class="container">
				<div class="row">
					<aside class="col-footer col-md-3">
						<h2 class="footer-title">ABOUT I</h2>
						<div class="textwidget">Live for your dream, and even if you do not get there, you still have lived.</div>
					</aside>
					<aside class="col-footer col-md-3 widget_recent_entries">

					</aside>
					<aside class="col-footer col-md-3">

					</aside>
					<aside class="col-footer col-md-3 wptt_TwitterTweets">
					</aside>
				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 copyright">
						<span>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://www.13520v.com.com/">www.13520v.com</a></span>
					</div>
					<div class="col-md-6 col-sm-6 link">
						<div class="menu-footer-menu-container">

						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer -->
<?php foreach ($static['script'] as $key => $value) {
	$jsLink = $static_url.'/static/'.$value.'?version='.$static_version;
	echo sprintf('<script src="%s" type="text/javascript"></script>',$jsLink);
} ?>

  <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4]
      });

		function isMobile() {
			var userAgentInfo = navigator.userAgent;
			var mobileAgents = [ "Android", "iPhone", "SymbianOS", "Windows Phone", "iPad","iPod"];
			var mobile_flag = false;
			//根据userAgent判断是否是手机
			for (var v = 0; v < mobileAgents.length; v++) {
				if (userAgentInfo.indexOf(mobileAgents[v]) > 0) {
					mobile_flag = true;
					break;
				}
			}
			var screen_width = window.screen.width;
			var screen_height = window.screen.height;
			//根据屏幕分辨率判断是否是手机
			if(screen_width < 500 && screen_height < 800){
				mobile_flag = true;
			}
			return mobile_flag;
		}

		// 如果是手机端，单独设置样式
		function  setMobileStyle() {
			$('.ui_wrapper_top .wrapper_top_container span').hide();
			$('.ui_wrapper_top .wrapper_top_container div').css({'width': '100%'});
			$('.ui_wrapper_top .wrapper_top_container input').css({'width': '75% !important', 'min-width': '75% !important'});
		}
		if(isMobile() == false){
			// var height = document.getElementById('main-content').clientHeight;
			setTimeout(function() {
				var height = $('#main-content').height();
				if (height) {
					document.getElementById('sidebar').style.height = height + 'px';
					var wid_tags_height = $('#sidebar .wid-tags').height(),
						wid_post_height = $('#sidebar .wid-post').height(),
						wid_news_height = $('#sidebar .wid-news .heading').height();
					$('#sidebar .wid-news .content').height(height-wid_tags_height-wid_post_height-wid_news_height-80);
					var show_number = Math.floor(($('#sidebar .wid-news .content').height()-40) / 95);
					$('#sidebar .wid-news .wrap-vid').each(function(index, ele){
						if (index >= show_number) {
							$('#sidebar .wid-news .wrap-vid').eq(index).hide();
						}
					});
				}
			}, 100);
		}else{
			setMobileStyle();
		}
	});


	function checkKeyword()
	{
      var keyWord = $("#serarchKeywords").val();
          keyWord = $.trim(keyWord);
      if(keyWord.length == 0){
          window.location.href="/recommend";
          return false;
      }
		return true;
	}

console.log("技术交流：mailbox:strive965432@gmail.com, github:https://github.com/zhangxuanru");
 </script>
