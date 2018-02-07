<div class="box">
    <div class="box-header">
        <h2><i class="fa fa-play-circle-o"></i> <a target="_blank" style="color: #fff" href="<?php echo $modular[1]['modhref'];?>"> <?php echo $modular[1]['nav_name'];?></a> </h2>
    </div>
    <div class="box-content">
        <div class="row">
            <?php foreach($modular[1]['video'] as $index => $item){ ?>
            <div class="col-md-4">
                <?php foreach($item as $index => $val){ ?>
                  <div class="wrap-vid">
                    <div class="zoom-container">
                        <div class="zoom-caption">
                            <span><?php echo $val['tag']; ?></span>
                            <a title="<?php echo $val['title']; ?>" href="<?php echo $val['href']; ?>">
                                <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                            </a>
                            <p><?php echo $val['title']; ?></p>
                        </div>
                        <img alt="<?php echo $val['title']; ?>" title="<?php echo $val['title']; ?>" src="<?php echo $val['images_url']; ?>" />
                    </div>
                    <h3 class="vid-name vid-nameOneLine"><a title="<?php echo $val['title']; ?>" href="<?php echo $val['href']; ?>"><?php echo $val['title']; ?></a></h3>
                    <div class="info">
                        <h5>By <a title="<?php echo $val['title']; ?>" href="<?php echo $val['catehref']; ?>"><?php echo isset($val['author']) ? $val['author'] : '佚名'; ?></a></h5>
                        <span><i class="fa fa-calendar"></i><?php echo isset($val['published_at']) ? date('d/m/Y',$val['published_at']):date('d/m/Y'); ?></span>
                        <span><i class="fa fa-heart"></i><?php echo isset($val['like_number']) ? $val['like_number']:'1,500'; ?></span>
                    </div>
                </div>
                <?php  } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="line"></div>
</div>