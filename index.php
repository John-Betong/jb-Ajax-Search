<?php 
  error_reporting(-1); ini_set('display_errors',1);
  define('LOCALHOST','localhost'===$_SERVER['SERVER_NAME']);

  $title = 'Ajax Dynamic Search Demo';
  $sp    = 'https://www.sitepoint.com/community/t/search-when-iconv-fails/209863';
  $live  = 'http://www.johns-jokes.com/downloads/sp-e/jb-ajax-search/index.php';

  #require '_header.php';
?><!doctype html>
<html lang="en-GB">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?=$title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style-ajax-demo.css" rel="stylesheet" />
</head>
<body>

  <div class='hdg'>
    <img class="fll" src='/afiles/gif/jb_in_shorts.gif' width="42" alt="jb_in_shorts.gif" />
    <?php 
      echo '<a class="flr btx" href="'. $sp .'">SitePoint Forum</a>';
      echo '<br />';
      echo '<h2 class="tac cls ooo">' .$title .'</h2>';
      echo LOCALHOST ? '<a class="flr" href="' .$live .'">Online</a>' : NULL;
      echo '<h5 class="tac cls ooo">by John_Betong</h5>';
    ?>
  </div>



  <div id="content" class="w88 bgs p42 lh2">
      <?php // ====== LIVE SEARCH START ========= ?>
        <?php require '_ajax-form.php';?>

        <?php // ====== LIVE SEARCH START =========  toggled with javascript ?>
          <div id="livesearch">
            <?php
              if( isset($_POST['submit']) ):
                require 'db-results.php';
                $_POST['submit'] = NULL;
              else:  
              #elseif(! isset($_GET) ):
            ?>  
              <hr />
              <h3>Demo Search Tutorial:</h3>
              <ol class="lh2">
                <li><a class="btn" href="jb-ajax-search.zip"><b>download</b></a> 
                  and unzip into <b><i>"your browser accessible directory"</i></b>
                </li>
                <li>use a text-editor to set 6 constants in <b>"db-result.php"</b></li>
                <li>browse to <b><i>"your browser accessible directory"</i></b> </li>
              </ol>
              <hr />

              <h3>Live Installation:</h3>
              <ol class="lh2">
                <li>  copy &amp; paste to your web-page:  <b>&lt;?php require "ajax-form.php";?&gt;</b>  </li>
                <li>  copy &amp; paste to same web-page:  <b>&lt;div id="livesearch"&gt;&lt;/div&gt;</b> </li>
                <li>  set path to <b>"db-results.php"</b>  in your <b>"ajax-form.php"</b> </li>
              </ol>
            <?php endif; // if( ! isset($_POST['submit']) ):?>  

          </div>
      <?php // ====== LIVE SEARCH FINISH ========= ?>
  </div><?php # id="content" ?>

  <div id="footer" ><!-- rapid jump-to --> </div>

  <div class="w88 mga bgs p42 bdr">
    <?php require '_footer.php';?>
  </div>

</body>
</html>