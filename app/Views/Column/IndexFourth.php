<?php
$rData = $modular[3]['video'];
?>
<div class="box">
    <div class="box-header">
        <h2><i class="fa fa-vimeo-square"></i> <a target="_blank" style="color: #fff" href="<?php echo $modular[3]['modhref'];?>"> <?php echo $modular[3]['nav_name'];?></a></h2>
    </div>
    <div class="box-content">
        <div class="row">
           <?php foreach($rData as $index => $item){
                if($index > 2){
                    break;
                }
               ?>
               <div class="col-md-4">
                <div class="wrap-vid">
                    <div class="zoom-container">
                        <div class="zoom-caption">
                            <span><?php echo $item['tag']; ?></span>
                            <a  title="<?php echo $item['title']; ?>" href="<?php echo $item['href']; ?>">
                                <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                            </a>
                            <p><?php echo $item['title']; ?></p>
                        </div>
                        <img alt="<?php echo $item['title']; ?>" title="<?php echo $item['title']; ?>" src="<?php echo $item['images_url']; ?>" />
                    </div>
                    <h3 class="vid-name wrapperwholeText"><a title="<?php echo $item['title']; ?>" href="<?php echo $item['href']; ?>"><?php echo $item['title']; ?></a></h3>
                    <div class="info">
                        <h5>By <a target="_blank" href="<?php echo $item['catehref']; ?>"><?php echo isset($item['author']) ? $item['author'] : '佚名'; ?></a></h5>
                        <span><i class="fa fa-calendar"></i><?php echo date('d/m/Y',$item['published_at']); ?></span>
                        <span><i class="fa fa-heart"></i><?php echo isset($item['like_number']) ? $item['like_number']: '1,800'; ?></span>
                    </div>
                </div>
            </div>
           <?php } ?>
        </div>
    </div>
</div>