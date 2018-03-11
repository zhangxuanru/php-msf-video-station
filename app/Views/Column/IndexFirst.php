<div class="box">
    <div class="box-header">
        <h2><i class="fa fa-globe"></i> <a target="_blank" style="color: #fff" href="<?php echo $modular[0]['modhref'];?>"> <?php echo $modular[0]['nav_name'];?></a></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <?php foreach($modular[0]['video']['slideData'] as $index => $item){?>
                <div class="col-md-6 padLeft10">
                    <div class="wrap-vid">
                        <div class="zoom-container">
                            <div class="zoom-caption">
                                <span><?php echo $item['tag']; ?></span>
                                <a title="<?php echo $item['title'] ?>" href="<?php echo $item['href'];?>">
                                    <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                </a>
                                <p><?php echo $item['alt']; ?></p>
                            </div>
                            <img title="<?php echo $item['alt']; ?>" alt="<?php echo $item['alt']; ?>"  src="<?php echo $item['images_url']; ?>" />
                        </div>
                        <h3 class="vid-name vid-nameText"><a title="<?php echo $item['title'] ?>" href="<?php echo $item['href'];?>"><?php echo $item['title'] ?></a></h3>
                        <div class="info">
                            <h5>By <a title="<?php echo $item['title'] ?>" href="<?php echo $item['catehref'] ?>"><?php echo $item['author']; ?></a></h5>
                            <span><i class="fa fa-calendar"></i><?php echo date('d/m/Y',$item['published_at']); ?></span>
                            <span><i class="fa fa-heart"></i><?php echo $item['like_number']; ?></span>
                        </div>
                    </div>
                    <p class="more moreText"><?php echo $item['description']; ?></p>
                    <a title="<?php echo $item['title'] ?>" href="<?php echo $item['catehref'] ?>" class="btn btn-1">Read More</a>
                    <div class="line"></div>
                      <?php foreach($modular[0]['video']['contentData'][$index] as $key => $val){ ?>
                        <div class="post wrap-vid">
                        <div class="zoom-container max50">
                            <div class="zoom-caption">
                                <span><?php echo $val['tag']; ?></span>
                                <a title="<?php echo $val['alt']; ?>" href="<?php echo $val['href']; ?>">
                                    <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                </a>
                                <p><?php echo $val['alt']; ?></p>
                            </div>
                            <img title="<?php echo $val['alt']; ?>" alt="<?php echo $val['alt']; ?>" src="<?php echo $val['images_url']; ?>" />
                        </div>
                        <div class="wrapper wrapperText">
                            <h5 class="vid-name vid-nameText"><a title="<?php echo  $val['title']; ?>" href="<?php echo $val['href'] ?>"><?php echo $val['title']; ?></a></h5>
                            <div class="info">
                                <h6>By <a title="<?php echo $val['title']; ?>" href="<?php echo $val['catehref'] ?>"><?php echo isset($val['author']) ? $val['author']:'佚名'; ?></a></h6>
                                <span><i class="fa fa-calendar"></i><?php echo isset($val['published_at']) ? date('d/m/Y',$val['published_at']) : date('d/m/Y'); ?></span>
                                <span><i class="fa fa-heart"></i><?php echo isset($val['like_number']) ? $val['like_number']:'2,200'; ?></span>
                            </div>
                        </div>
                    </div>
                 <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="line"></div>
</div>
