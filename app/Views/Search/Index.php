<?php
$defaultData['sidebarData']['sidebarNumber'] = 5;
$this->insert('Public/Header',$staticOption,$metaData); ?>
<style type="text/css">
    p {
        text-indent: 2em;
        position: relative;
        line-height: 1.4em;
        height: 8.4em;
        overflow: hidden;
    }
    p:after {
       /* content: '...';*/
        right: 0;
        padding: 5px;
        position: absolute;
        bottom: 0;
    }
</style>

<body>
<header>
     <?php  $this->insert('Public/Menu',$defaultData,$metaData); ?>
</header>
<!-- Header -->
<!-- /////////////////////////////////////////Content -->
<div id="page-content" class="archive-page">
	<div class="container">
		<div class="row ui-container-row">
			<div id="main-content" class="col-md-8 main-right-boder">
                <?php if(empty($videoData)){
                       $this->insert('Search/NoData',$terms);
                } ?>
              <?php foreach($videoData as $index => $item){
                 foreach($keyArr as $text){
                     $item['title'] = str_replace($text,"<font color='red'>$text</font>",$item['title']);
                 }
                  ?>
                  <article>
                      <a href="<?php echo $item['href']; ?>"><h2 class="vid-name"><?php echo $item['title']; ?></h2></a>
                      <div class="info">
                          <h5>By <a  title="<?php echo $item['title']; ?>" href="<?php echo $item['catehref']; ?>" ><?php echo isset($item['author']) ? $item['author']:'佚名'; ?></a></h5>
                          <?php if(isset($item['published_at'])){ ?>
                            <span><i class="fa fa-calendar"></i> <?php echo date('M',$item['published_at']).'  '.date('d',$item['published_at']).', '.date('Y',$item['published_at']) ?></span>
                          <?php } ?>
                          <span><i class="fa fa-comment"></i> <?php echo isset($item['reviews_number']) ? $item['reviews_number']:'1600'; ?></span>
                          <span><i class="fa fa-heart"></i><?php echo isset($item['like_number']) ? $item['like_number']: '1345'; ?></span>
                          <ul class="list-inline">
                              <li> - </li>
                              <li>
									<span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</span>
                              </li>
                          </ul>
                      </div>
                      <div class="wrap-vid">
                          <div class="zoom-container">
                              <div class="zoom-caption">
                                  <span><?php echo $item['tag']; ?></span>
                                  <a title="<?php echo $item['title']; ?>" href="<?php echo $item['href']; ?>">
                                      <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                  </a>
                                  <p><?php echo $item['title']; ?></p>
                              </div>
                              <img alt="<?php echo $item['title']; ?>" title="<?php echo $item['alt']; ?>"  src="<?php echo $item['images_url']; ?>"  />
                          </div>
                          <p> <?php echo $item['description']; ?></p>
                      </div>
                  </article>
                  <?php if($index < 4){ ?>
                  <div class="line"></div>
              <?php }} ?>
			 <?php if($pageNumber > 1){ ?>
				<center>
                 <ul class="pagination">
                     <?php if ($pageNumber >=4){ ?>
						<li>
							<a href="/tag/?tag=<?php echo $tag; ?>&page=<?php echo ($page-1 >=1) ? $page-1 : '1'; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
                     <?php } ?>
                     <?php for($i=1;$i<=$pageNumber;$i++){
                             if($i == 4){
                                 $nextPage = ($page+1 > $pageNumber) ? $pageNumber : $page+1;
                                 $html = sprintf("<li><a href='%s' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>",'/tag/?tag='.$tag.'&page='.$nextPage);
                                 echo $html;
                                 break;
                             }
                         $html = sprintf("<li><a href='%s'>%d</a></li>",'/tag/?tag='.$tag.'&page='.$i,$i);
                         echo $html;
                     } ?>
					</ul>
                </center>
             <?php } ?>
			</div>
			  <?php $this->insert('Public/Sidebar', $defaultData); ?>
		</div>
	</div>
</div>
	<?php $this->insert('Public/Footer',$staticOption ) ?>
</body>
</html>
