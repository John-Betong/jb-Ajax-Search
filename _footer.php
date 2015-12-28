<?php 
  #$srcFiles = ['install.md', 'index.php', '_header.php', '_ajax-form.php', '_footer.php', 'db-results.php',];
  #$aLinks   = ['instructions.html', 'db-results.php', 'jb-ajax-search.zip',];
?>  

  <h2 class="ooo">Web-pages:</h2>
  <ul class="dib tac">
    <?php 
      $aLinks = ['instructions.html', 'db-results.php', 'jb-ajax-search.zip'];
      foreach($aLinks as $srcFile):
        echo '<li><a class="btn" href="' .$srcFile .'#footer">' .$srcFile .'</a></li>';
      endforeach;
    ?>  
  </ul>
  <hr class="cls" />

  <h2 class="ooo">Source Files:</h2>
  <ul class="dib tac">
    <?php 
      $srcFiles = ['index.php', '_ajax-form.php', 'db-results.php', '_footer.php'];
      foreach($srcFiles as $srcFile):
        echo '<li><a class="btn" href="?src=' .$srcFile .'#footer">' .$srcFile .'</a></li>';
      endforeach;
    ?>  
  </ul>

  <?php
    #$srcFiles = ['index.php', '_ajax-form.php', 'db-results.php', '_footer.php'];
    $srcFile = isset($_GET['src']) ? $_GET['src'] : NULL; 
    if($srcFile && in_array($srcFile, $srcFiles) ) :
      echo '<br class="clb" /><br />';
      echo '<hr class="clb" />';
      echo '<b> Source Code: &nbsp;</b>' .$srcFile;
      echo '<hr />';
      echo '<div class="mga bgg p42 wrp">';
        highlight_file( $srcFile );
      echo '</div>';
    endif;