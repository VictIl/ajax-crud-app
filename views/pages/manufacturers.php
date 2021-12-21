<?php
include('views/manufacturers_header.php');

?>



  
<div class=searchdiv >
<label for="type"><b>Search me</b></label>
    <input id="search" type="text" placeholder="type" onclick="check()" onkeyup="search()" name="type">
     <span  id='typeError' class="error">
         <?php if (isset($errors['uname'])) {	echo $errors['uname'];}?>
	</span></div>
<br><br>
 <div  id="pagination"></div>
<div  id="demo">
    <div  id="demos">
       
    </div>
   
</div>


	<?php

include('views/footer.php');

