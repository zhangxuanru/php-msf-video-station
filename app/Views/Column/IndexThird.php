<?php
$rData = $modular[2]['video'];
?>
<div class="box">
    <div class="box-header">
        <h2><i class="fa fa-globe"></i> <a target="_blank" style="color: #fff" href="<?php echo $modular[2]['modhref'];?>"> <?php echo $modular[2]['nav_name'];?></a></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-md-6">
                <div class="wrap-vid">
                    <div class="zoom-container">
                        <div class="zoom-caption">
                            <span><?php echo $rData[0]['tag'];?></span>
                            <a  title="<?php echo $rData[0]['title'];?>" href="<?php echo $rData[0]['href'];?>">
                                <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                            </a>
                            <p><?php echo $rData[0]['title'];?></p>
                        </div>
                        <img alt="<?php echo $rData[0]['title'];?>" title="<?php echo $rData[0]['title'];?>" src="<?php echo $rData[0]['images_url'];?>" />
                    </div>
                    <h3 class="vid-name"><a  title="<?php echo $rData[0]['title'];?>" href="<?php echo $rData[0]['href'];?>"><?php echo $rData[0]['title'];?></a></h3>
                    <div class="info">
                        <h5>By <a href="<?php echo $rData[0]['catehref'];?>"><?php echo isset($rData[0]['author']) ? $rData[0]['author'] : '佚名';?></a></h5>
                        <span><i class="fa fa-calendar"></i><?php echo date('d/m/Y',$rData[0]['published_at']);?></span>
                        <span><i class="fa fa-heart"></i><?php echo $rData[0]['like_number'];?></span>
                    </div>
                </div>
                <p class="more moreContent"><?php echo $rData[0]['description'];?></p>
                <a    href="<?php echo $modular[2]['modhref'];?>" class="btn btn-1">Read More</a>
            </div>
            <div class="col-md-6 padLeft10">
                <?php foreach($rData as $index => $item){
                    if(empty($index)){
                         continue;
                    }
                    if( $index > 4 ){
                        break;
                    }
                    ?>
                   <div class="post wrap-vid">
                    <div class="zoom-container">
                        <div class="zoom-caption">
                            <span><?php echo $item['tag']; ?></span>
                            <a title="<?php echo $item['title']; ?>" href="<?php echo $item['href']; ?>">
                                <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                            </a>
                            <p><?php echo $item['title']; ?></p>
                        </div>
                        <img alt="<?php echo $item['title']; ?>" title="<?php echo $item['title']; ?>" src="<?php echo $item['images_url']; ?>" />
                    </div>
                    <div class="wrapper max50">
                        <h5 class="vid-name wrapperwholeText"><a title="<?php echo $item['title']; ?>" href="<?php echo $item['href']; ?>"><?php echo $item['title']; ?></a></h5>
                        <div class="info">
                            <h6>By <a target="_blank" href="<?php echo $item['catehref']; ?>"><?php echo isset($item['author']) ? $item['author']:'佚名'; ?></a></h6>
                            <span><i class="fa fa-calendar"></i><?php echo isset($item['published_at']) ? date('d/m/Y',$item['published_at']) : date('d/m/Y',time()); ?></span>
                            <span><i class="fa fa-heart"></i><?php echo isset($item['like_number']) ? $item['like_number']:'1,200'; ?></span>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="line"></div>
</div>