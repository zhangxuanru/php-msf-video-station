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
    /**/
    .ui_wrapper_top .wrapper_top_container div.ui-model {
        position: relative;
    }
    .ui_wrapper_top .wrapper_top_container div.ui-model div.model-wrapper {
        display: none;
        position: absolute;
        top: 42px;
        left: 0px; 
        z-index: 100;
        width: 100%;
    }
    .ui_wrapper_top .wrapper_top_container div.ui-model div.model-wrapper ul  {
        border-left: 1px solid #CCC;
        border-right: 1px solid #CCC;
        background-color: #ffffff;
        padding: 0px;
        margin: 0px;
    }
     .ui_wrapper_top .wrapper_top_container div.ui-model div.model-wrapper ul li {
        display: block;
        padding: 0px;
        margin: 0px;
        line-height: normal;
        color: #000;
        text-align: left;
     }
    .ui_wrapper_top .wrapper_top_container div.ui-model div.model-wrapper ul li:hover {
        background-color: #CCC;
        cursor:default;
    }

    .ui_wrapper_top .wrapper_top_container div.ui-model input {
        width: 100% !important;
    }
</style>
<!--Top-->
<!--Top-->
<div class="ui_wrapper_top">
    <form method="get" action="/search/">
    <div class="wrapper_top_container">
        <div>
            <div class="ui-model">
                <input id="serarchKeywords"  autocomplete="off" name="keywords" value="<?php echo isset($title) ? $title : ''; ?>" type="text" placeholder="Please enter the search content" style="border-right:1px solid" onkeydown=''>
                <input type="hidden" name="type" value="0" id="searchType">
                <div class="model-wrapper">
                    <ul class="wrapper-list">
                    </ul>
                </div>
            </div>
            <button type="submit" id="vsearch" value="search" onclick="return checkKeyword()">search</button>
        </div>
    </div>
    </form>
</div>
	
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

<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
    
</script> 
