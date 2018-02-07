<?php  $this->insert('Public/Header',$staticOption ); ?>
<body>
<header>
     <?php  $this->insert('Public/Menu',$defaultData); ?>
	 <?php  $this->insert('Public/HeaderSlide',$defaultData); ?>
</header>
<!-- Header -->
<!-- /////////////////////////////////////////Content -->
	<div class="copyrights">Collect from <a href="http://www.13520v.com/" >我的站点</a></div>
    <div id="page-content" class="index-page">
		<div class="container">
			<div class="row ui-container-row">
				<div id="main-content" class="col-md-8 main-right-boder">
					<?php  if(isset($modular['modular'][0]) && !empty($modular['modular'][0])){
						 $this->insert('Column/IndexFirst',$modular);
					 }
                      if(isset($modular['modular'][1]) && !empty($modular['modular'][1])){
                         $this->insert('Column/IndexSecond',$modular);
                     }
                     if(isset($modular['modular'][2]) && !empty($modular['modular'][2])) {
                         $this->insert('Column/IndexThird', $modular);
                     }
                    if(isset($modular['modular'][3]) && !empty($modular['modular'][3])) {
                         $this->insert('Column/IndexFourth', $modular);
                    }
                    ?>
				</div>
				 <?php $this->insert('Public/Sidebar', $defaultData); ?>
			</div>
		</div> 
	</div> 
	<?php $this->insert('Public/Footer',$staticOption ) ?> 
</body>
</html>
