<style type="text/css">
    .ui-row {
        padding: 0px;
        margin: 0px;
    }

    .row-wrapper {
        max-width: 90%;
        margin: 0 auto;
        padding: 10px;
        text-align: center;
        min-width: 60%;
        position: relative;
    }

    .row-wrapper span {
        font-weight: bold;
        display: inline-block;
        float: left;
        line-height: 40px;
        position: absolute;
        left: 10px;
    }

    .row-wrapper div.row-search{
        display: inline-block;
        width: 100%;
        text-align: center;
    }

    .row-wrapper div.row-search input[type='text']{
        height: 40px;
        line-height: 40px;
        padding-left: 10px;
        border-radius: 5px;
        min-width: 45%;
    }

    .row-wrapper div.row-search input[type='button']{
        height: 40px;
        border-radius: 5px;
        line-height: 40px;
        padding: 0px 10px;
    }
</style>
<!--Top-->
	<nav id="top">
		<div class="container">
			<div class="row col-sm-12 col-md-12 col-lg-12 ui-row">
				<div class="row-wrapper">
					<span>Welcome to 13520v!</span>
					<div class="row-search">
						<input type="text" placeholder="请输入搜索内容">
						<input type="button" value="搜索">
					</div>
				</div>
			</div>

		</div>
	</nav>
	
	<!--Navigation-->
    <nav id="menu" class="navbar">
		<div class="container">
			<div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
			  <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
                   <?php foreach ($navData as $key => $value) { 
                            if(empty($value['subData'])){ ?>
                                <li><a href="<?php echo $value['url']; ?>"><i class="fa <?php echo $value['class']; ?>"></i> <?php echo $value['nav_name']; ?></a></li>
                      <?php }else{ ?>
                           	<li class="dropdown"><a href="<?php echo $value['url']; ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa <?php echo $value['class']; ?>"></i> <?php echo $value['nav_name']; ?></a> 
						 <div class="dropdown-menu">
							<div class="dropdown-inner">
								<ul class="list-unstyled">
                                   <?php foreach ($value['subData'] as $k => $v) { ?>
                                          <li><a href="<?php echo $v['url']; ?>"><?php echo $v['nav_name']; ?></a></li>
                                   <?php } ?> 
								</ul>
							</div>
						</div>
					</li>     
                 <?php  } } ?> 
				</ul>
			</div>
		</div>
	</nav>
 