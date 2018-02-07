<?php
$defaultData['sidebarData']['sidebarNumber'] = 6;
$this->insert('Public/Header',$staticOption,$metaData); ?>
<body>
<header>
     <?php  $this->insert('Public/Menu',$defaultData); ?>
	 <?php  $this->insert('Public/HeaderSlide',$defaultData); ?>
</header>
<!-- Header -->
<!-- /////////////////////////////////////////Content -->
<div id="page-content" class="single-page">
	<div class="container">
		<div class="row ui-container-row" >
			<div id="main-content" class="col-md-8 main-right-boder">
				<div class="wrap-vid" style="width: 100%; height:450px">
                    <video id="demo-video" class="video-js vjs-big-play-centered" style="width:100%;"></video>
 				</div>
                <div class="share">
				<div class="jiathis_style_32x32">
                    <ul class="list-inline center">
                        <li> <a class="jiathis_button_qzone"></a></li>
                        <li> <a class="jiathis_button_tsina"></a></li>
                        <li> <a class="jiathis_button_tqq"></a></li>
                        <li> <a class="jiathis_button_weixin"></a></li>
                        <li> <a class="jiathis_button_renren"></a></li>
                        <li> <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a></li>
                        <li> <a class="jiathis_counter_style"></a></li>
                </ul>
				</div>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                </div>

				<div class="line"></div>
				<h1 class="vid-name"><a href="javascript:;"><?php echo $data['title']; ?></a></h1>
				<div class="info">
					<h5>By <a title="<?php echo $data['title']; ?>" href="<?php echo $data['catehref']; ?>"><?php echo $data['author']; ?></a></h5>
					<span><i class="fa fa-calendar"></i><?php echo date('d/m/Y',$data['published_at']); ?></span>
					<span><i class="fa fa-heart"></i><?php echo $data['like_number']; ?></span>
				</div>
				<p style="margin-top: 10px;"> <?php echo $data['description']; ?> <br/> all rights reserved:<?php echo $data['type'] == '1'  ? 'https://www.youtube.com' : 'https://www.bilibili.com';?> </p>
				<div class="line"></div>
				<div class="comment">
					<h3>Comment</h3>
					<form name="form1" method="post" action="" id="comment-form">
                        <input type="hidden" value="<?php echo $csrfToken; ?>" id="token" name="token">
                        <input type="hidden" value="<?php echo $watch;?>" id="watch" name="watch">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
										<textarea name="content" maxlength="300" id="message" class="form-control" rows="5" cols="25" required="required"
												  placeholder="Message"></textarea>
								</div>
								<button  type="button" class="btn btn-4 btn-block" name="btnSend" id="btnSend" style="font-size:2rem; color:#000000;">Submit</button>
							</div>
						</div>
					</form>
				</div>
				<div class="line"></div>
					<div class="box">
					<div class="box-header">
						<h2><i class="fa fa-globe"></i>  <a target="_blank" style="color: #fff" href="/recommend">Recommended video </a></h2>
					</div>
					<div class="box-content">
						<div class="row">
                            <?php $num = 0; foreach($recommendVideo as $index => $item){
                                if(isset($item['id']) && $item['id'] == $video_id){
                                     continue;
                                }
                                if($num > 2){
                                    break;
                                }
                                $num++;
                                ?>
							  <div class="col-md-4">
								<div class="wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<span><?php echo isset($item['tag']) ? $item['tag'] : ''; ?></span>
											<a  title="<?php echo isset($item['title']) ?  $item['title']:''; ?>" href="<?php echo $item['href']; ?>">
												<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
											</a>
											<p><?php echo isset($item['title']) ? $item['title']: ''; ?></p>
										</div>
                                        <img alt="<?php echo isset($item['title']) ? $item['title'] : ''; ?>" title="<?php echo $item['alt']; ?>"  src="<?php echo $item['images_url']; ?>"  />
                                    </div>
                                    <div class="wrapper" style=" max-width: 100%">
									<h3 class="vid-name wrapperwholeText"><a  title="<?php echo $item['title']; ?>" href="<?php echo $item['href']; ?>" ><?php echo $item['title']; ?></a></h3>
									<div class="info">
										<h5>By <a title="<?php echo $item['title']; ?>" href="<?php echo $item['catehref']; ?>"><?php echo isset( $item['author']) ?  $item['author'] : 'nameless'; ?></a></h5>
										<span><i class="fa fa-calendar"></i><?php echo isset($item['published_at']) ? date('d/m/Y',$item['published_at']):date("d/m/Y"); ?></span>
										<span><i class="fa fa-heart"></i><?php echo isset($item['like_number']) ? $item['like_number'] : '1200'; ?></span>
									</div>
                                    </div>
								</div>
							</div>
						   <?php } ?>
						</div>
					</div>
				</div>
			</div>
            <?php $this->insert('Public/Sidebar', $defaultData); ?>
		</div>
	</div>
</div>
	<?php $this->insert('Public/Footer',$staticOption ) ?>
<script>
	videoPlay('demo-video',"<?php echo $data['videoUrl'] ?>","<?php echo $data['videoplayType']; ?>","<?php echo $data['images_url']; ?>");
</script>
</body>
</html>
