<div class="header-slide">
    <div id="owl-demo" class="owl-carousel">
      <?php foreach($videoList as $key => $val){ ?>
        <div class="item">
            <div class="zoom-container">
                <div class="zoom-caption">
                    <span><?php echo $val['tag']; ?></span>
                    <a  target="_blank" title="<?php echo $val['alt']; ?>" href="<?php echo $val['href'];?>">
                        <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                    </a>
                    <p><?php echo $val['alt']; ?></p>
                </div>
                <img alt="<?php echo $val['alt']; ?>" title="<?php echo $val['alt']; ?>" src="<?php echo $val['images_url'] ?>" />
            </div>
        </div>
        <?php } ?>
    </div>
</div>
