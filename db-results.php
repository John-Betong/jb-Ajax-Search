<?php 
  /*
    CASE 1:  STANDALONE FILE: 
        if(Database Connection): 
          SHOW FIRST DOZEN FILE ROWS
        else:
          THROW ERROR
        endif;


    CASE 2: called from: _ajax-form.php 

 */

    $title = 'Standalone file that renders the last dozen table->rows';

  // Secure Database Access Details 
    $secureFiles = ['jokes','blogs','pinto', 'story-1', 'story-2','story-3'];
    $secureFile = '/_db-' .$secureFiles[0] .'.php';
    $aboveRoot  = dirname($_SERVER["DOCUMENT_ROOT"]); # NO TRAILING SLASH
    $aboveRoot .= $secureFile;

    if( file_exists($aboveRoot) ):
      require $aboveRoot;

    else:
      define('HOST',   'yourHost');
      define('uNAME',  'userName');
      define('pWORD',  'passWord');  
      define('dBASE',  'dataBase'); 
      define('dTABLE', 'tableName'); 
      define('dCOL001','column_1st'); 
      define('dCOL002', NULL);       // if NOT used otherwise column name
    endif;

// DEBUGGING
function vd ($val, $line=NULL) {echo '<pre>' .$line .': &nbsp;'; print_r($val); echo '</pre>';}
function vdd($val, $line=NULL) {echo '<pre>' .$line .': &nbsp;'; var_dump($val); echo '</pre>';}

//=================================
//
//  connect to database 
//    return connection Object (maybe FALSE)
//
//==============================      
function getDbConnection()
{      
  $result = @mysqli_connect(HOST, uNAME, pWORD, dBASE);

  if ( ! $result) :
    #die('Could not connect: ' . mysqli_error($con));
    echo '<h1>file: index-results.php</h1>' ;
    echo '<dl>';
      echo '<dt>This is a STANDALONE file to test your database connection </dt>';
     #echo '<dd><hr /></dd>';
      echo '<dt>Could not connect using: </dt>';
      echo '<dd>';
        echo 'mysqli_connect(<b> ' .HOST .', ' .uNAME.', ' .pWORD.', ' .dBASE .' </b>);';
      echo '</dd>';
      echo '<dd>&nbsp;</dd>';
      echo '<dd>A  Database Connection is ESSENTIAL! </dd>';  
    echo '</dl>';
  endif;

  return $result;
}        

//=================================
//
//  Validate and clean input text
//    
//=================================
function getParams($params=NULL)
{
  while (strpos($params, '  ') ) {
    $params = str_replace('  ',  ' ', $params);
  }
  $params = explode(' ', $params);
  if( empty($params) ):
    $params[] = $params;
  endif;

  return $params;
}//

//=================================
//
//  Generate $sql for all aParams
//    
//=================================
function getSql($aParams=NULL)
{
  $sql = 'SELECT * FROM `' .dTABLE .'` WHERE ';// .dCOLUMN; 

  foreach($aParams as $i2 => $param):
    if($i2 > 0):
      $sql = $sql .' AND ';
    endif;  
    #if('jokes'===dTABLE):
    if( defined('dCOL002') ):
      $sql = $sql .'CONCAT(' .dCOL001 .', '  .dCOL002 .') LIKE "%'. trim($param) .'%" ';
    else:
      $sql = $sql .dCOL001 .' LIKE "%'. trim($param) .'%" ';
    endif;
  endforeach;

  return $sql;
}//    

//=================================
//
//  Get mysql result
//    or echo $sql
//    
//=================================
function getResult($con, $sql)
{
  $result = mysqli_query($con, $sql);

  if( ! $result):
    echo '<h3>Problem:</h3>';    
    echo '<dl>';
      echo '<dt>File: <dt><dd> index-resulabellts.php <dd>'; 
      echo '<dt>Func: <dt><dd> getSql($aParams=NULL) </dd>';
      echo '<dt>$sql: <dt><dd>' .$sql .'<dd>';
      echo '<dd>&nbsp;</dd>';
      echo '<dt><b>Please rectify $sql problem ASAP</b></dt>';
    echo '<dl>';
  endif;

  return $result;
}//



//==========================================================
//
//          Display Search Results
//
//==========================================================

  $con = getDbConnection();
  if($con):
    $search  = isset($_GET['q']) ? $_GET['q'] : '';
    if( isset($_POST['submit']) ):
      $aParams = getParams( $_POST['search'] );
    else:
      $aParams = getParams($search);
    endif;
    $sql     = getSql($aParams);
    $result  = getResult($con, $sql);

    if($result):
      echo '<b class="ooo">Total Results: ' .$result->num_rows .'</b>';
        if(12 <= $result->num_rows):
          $sql .= " LIMIT 0,12";
          $result = mysqli_query($con, $sql);
          echo '&nbsp; <i>(but only showing the first  <b style="color:blue;">dozen </b> </i>)'; 
        endif;  
      echo '<hr />';

      echo '<dl class="dx w88 mga">';
        while($row = mysqli_fetch_array($result))
        {
          // SORRY - only for my table of jokes 
          if( isset($row['xrl']) ):  
            $link = '<a href="http://www.johns-jokes.com/' .$row['xrl'] .'">'
                  .   $row['title'] 
                  . '</a>';
            echo "<dt>" . $link ."</dt>";
          endif;

          $tmp = $row[dCOL002];// see KLUDGE above
          $tmp = substr( trim($tmp),0,42);
          $tmp = strip_tags($tmp);
          echo "<dd>" . $tmp ."</dd>";
        }
      echo '</dl>';
    endif;
  endif;# $conn  
  # mysqli_close($con); // Not required ???