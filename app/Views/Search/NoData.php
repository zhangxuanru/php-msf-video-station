<div style="height: 310px;">
<p> I'm sorry I didn't find the relevant content! Please try another key word!!!
  <br/><br/><br/>
<span style="margin-left: 40px;">Do you want to find the following:&nbsp;&nbsp;&nbsp;&nbsp;</span>
           <?php
            foreach($terms as $text){
                echo sprintf("<a href='/search/?keywords=%s'>%s</a>",$text,$text."&nbsp;&nbsp;&nbsp;&nbsp;");
            }
           ?></p>
</div>