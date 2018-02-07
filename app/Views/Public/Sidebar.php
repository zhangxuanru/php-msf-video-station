<?php
$sidebarNumber  = isset($sidebarData['sidebarNumber']) ? $sidebarData['sidebarNumber'] : 8;
?>
<div id="sidebar" class="col-md-4" style="overflow: hidden" >
    <div class="widget wid-tags">
        <div class="heading"><h4><i class="fa fa-tags"></i> Tag</h4></div>
        <div class="content">
            <ul class="list-inline">
                <?php
                $count = count($getTagsRanking);
                foreach($getTagsRanking as $index => $item){
                    $ext=',';
                    if($index == $count-1){
                        $ext = '';
                    }
                    ?>
                   <li><a title="<?php echo $item['tag'];?>" href="<?php echo $item['href'];?>"><?php echo $item['tag'].$ext;?> </a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="line"></div>
    </div>


    <!---- Start Widget ---->
    <div class="widget wid-post">
        <div class="heading"><h4><i class="fa fa-globe"></i> <a   style="color: #fff" href="<?php echo $sidebarData[0]['modhref'];?>"> <?php echo $sidebarData[0]['nav_name']; ?> </a></h4></div>
        <div class="content">
            <?php foreach($sidebarData[0]['video'] as $index => $item){
                if($index > $sidebarNumber){
                    break;
                }
                ?>
            <div class="post wrap-vid">
                <div class="zoom-container">
                    <div class="zoom-caption">
                        <span><?php echo $item['tag']?></span>
                        <a  title="<?php echo $item['title'] ?>" href="<?php echo $item['href'];?>">
                            <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                        </a>
                        <p><?php echo $item['alt']; ?></p>
                    </div>
                    <img title="<?php echo $item['alt']; ?>" alt="<?php echo $item['alt']; ?>"  src="<?php echo $item['images_url']; ?>" />
                </div>
                <div class="wrapper wrapperText">
                    <h5 class="vid-name vid-nameText"><a title="<?php echo  $item['title']; ?>" href="<?php echo $item['href'] ?>"><?php echo $item['title']; ?></a></h5>
                    <div class="info">
                        <h6>By  <a title="<?php echo $item['title'] ?>" href="<?php echo $item['catehref'] ?>"><?php echo $item['author']; ?></a></h6>
                        <span><i class="fa fa-calendar"></i><?php echo date('d/m/Y',$item['published_at']); ?></span>
                        <span><i class="fa fa-heart"></i><?php echo $item['like_number']; ?></span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="line"></div>
    </div>

    <!---- Start Widget ---->
    <div class="widget wid-news">
        <div class="heading"><h4><i class="fa fa-clock-o"></i>  <a  style="color: #fff" href="<?php echo $sidebarData[1]['modhref'];?>"> <?php echo $sidebarData[1]['nav_name']; ?> </a></h4></div>
        <div class="content">
            <?php foreach($sidebarData[1]['video'] as $index => $item){
                if($index > $sidebarNumber){
                    break;
                }
                ?>
                <div class="post wrap-vid">
                    <div class="zoom-container">
                        <div class="zoom-caption">
                            <span><?php echo $item['tag']?></span>
                            <a  title="<?php echo $item['title'] ?>" href="<?php echo $item['href'];?>">
                                <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                            </a>
                            <p><?php echo $item['alt']; ?></p>
                        </div>
                        <img title="<?php echo $item['alt']; ?>" alt="<?php echo $item['alt']; ?>"  src="<?php echo $item['images_url']; ?>" />
                    </div>
                    <div class="wrapper wrapperText">
                        <h5 class="vid-name vid-nameText"><a title="<?php echo  $item['title']; ?>" href="<?php echo $item['href'] ?>"><?php echo $item['title']; ?></a></h5>
                        <div class="info">
                            <h6>By  <a title="<?php echo $item['title'] ?>" href="<?php echo $item['catehref'] ?>"><?php echo $item['author']; ?></a></h6>
                            <span><i class="fa fa-calendar"></i><?php echo date('d/m/Y',$item['published_at']); ?></span>
                            <span><i class="fa fa-heart"></i><?php echo $item['like_number']; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>

