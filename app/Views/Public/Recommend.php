
<div class="row">
    <div class="featured">
        <div class="main-vid">
            <div class="col-md-6">
                <div class="zoom-container">
                    <div class="zoom-caption">
                        <span><?php echo $slideData['tag'];?></span>
                        <a  target="_blank" title="<?php echo $slideData['alt']; ?>"  href="<?php echo $slideData['href'];?>">
                            <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                        </a>
                        <p><?php echo $slideData['alt'];?></p>
                    </div>
                    <img alt="<?php echo $slideData['alt'];?>" title="<?php echo $slideData['alt'];?>"  src="<?php echo $slideData['images_url'] ?>"  />
                </div>
            </div>
        </div>

        <div class="sub-vid">
           <?php foreach($recommend as $key => $val){ ?>
            <div class="col-md-3">
                <?php  foreach($val as $index => $item){ ?>
                <div class="zoom-container">
                    <div class="zoom-caption">
                        <span><?php echo $item['tag']; ?></span>
                        <a target="_blank" title="<?php echo $item['alt']; ?>" href="<?php echo $item['href']; ?>">
                            <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                        </a>
                        <p><?php echo $item['alt']; ?></p>
                    </div>
                    <img alt="<?php echo $item['alt']; ?>" title="<?php echo $item['alt']; ?>"  src="<?php echo $item['images_url']; ?>"  />
                </div>
                <?php } ?>
            </div>
         <?php } ?>

        </div>
        <div class="clear"></div>
    </div>
</div>