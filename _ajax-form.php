<?php 
  /*
    required from: "index.php"
  */

?>
<form action="?" method="post">
  <div class="p42 tac">
    <?php 
      echo '<label>Live Search:</label>';
      $search = isset($_POST['search']) ? $_POST['search'] : '';
      echo '<input type="text" size="30" onkeyup="showResult(this.value)" name="search" value="' .$search .'" />';
      echo ' <a class="btn tdn" href="?reset"><b>Reset</b> </a>';
      echo '<br />';
      echo '<input type="submit" name="submit" value="Submit" />';
      echo '<label>No JavaScript</label>';
      echo '<br /><br />';
    ?>
  </div>    
</form>

<script type="text/javascript">
  function showResult(str)
  {
    if (str.length==0)
    {
      document.getElementById("livesearch").innerHTML="";
      // document.getElementById("livesearch").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest)
    {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }else{  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
        // document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    // xmlhttp.open("GET","db-results.php?q="+str,true);
    xmlhttp.open("POST","db-results.php?q="+str,true);
    xmlhttp.send();
  }
</script>