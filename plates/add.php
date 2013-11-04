<?
#   error_reporting(E_ALL);
#   global $id, $table, $error_msg, $aff_rows, $login;

$_POST['obs_time'] =   ereg_replace("\r",          "",    $_POST['obs_time']);
$_POST['obs_time'] =   ereg_replace("(\n *)+\n",   "\n",  $_POST['obs_time']);
$_POST['obs_time'] =   ereg_replace(" +",          " ",   $_POST['obs_time']);
$_POST['obs_time'] =   ereg_replace("(\n *)+$",    "",    $_POST['obs_time']);
$_POST['obs_time'] =   ereg_replace(" *\n *",      "\n",  $_POST['obs_time']);

$_POST['c0'] = ereg_replace("\r",      "",    $_POST['c0']);
$_POST['c0'] = ereg_replace(" *\n *",  "\n",  $_POST['c0']);
$num = (int)trim(ereg_replace("[^0-9]", "",  $_POST['num']));
$_POST['obs_date'] = ereg_replace(" +", " ",   $_POST['obs_date']);

if ($_POST['del']) $_POST['instr']='+';

#   echo "<pre>{$_POST['obs_time']}</pre>";
#   echo "<pre>{$_POST['obs_date']}</pre>";
#   echo "<pre>{$_POST['c0']}</pre>";
#   echo "<pre>{$num}</pre>";

   if (!ereg("^ *[0-9]{4} +[0-9]{2} +[0-9]{2} *$", $_POST['obs_date']))    $error_msg .= "<li> Date has wrong format ";
   if (!ereg("^( *[0-9]{1,2} +[0-9]{1,2} +[0-9]{1,2}\.?[0-9]* *\n)*( *[0-9]{1,2} +[0-9]{1,2} +[0-9]{1,2}\.?[0-9]* *)\n? *$", $_POST['obs_time']))               $error_msg .= "<li> Time has wrong format ";
   if (!check_pwd())               $error_msg .= "<li> Wrong user name or password ";
   if ( strlen(trim($_POST['num']))!=5 ) $error_msg .= "<li> Plate number must be 5 signs long ";
   if ($error_msg) { include "edit.php"; exit; }

   $n = sql1("select count(*) from plates_$table where id='$id'+0");
   $ed = sql1(" select full_name from users where login='$login' ")."   ".date('j-m-Y H:i:s');
   if ($n)
      {
      $q  = " update plates_$table set ";
      $q .= " instr    = trim('{$_POST['instr'   ]}'), ";
      $q .= " num_bak  = trim('{$_POST['num'     ]}'), ";
      $q .= " num      = trim('$num'), ";
      $q .= " obj      = trim('{$_POST['obj'     ]}'), ";
      $q .= " obs_date = trim('{$_POST['obs_date']}'), ";
      $q .= " ra1      = trim('{$_POST['ra1'     ]}'), ";
      $q .= " ra2      = trim('{$_POST['ra2'     ]}'), ";
      $q .= " dec1     = trim('{$_POST['dec1'    ]}'), ";
      $q .= " dec2     = trim('{$_POST['dec2'    ]}'), ";
      $q .= " obs_time = trim('{$_POST['obs_time']}'), ";
      $q .= " u        = trim('{$_POST['u'       ]}'), ";
      $q .= " n_exp    = trim('{$_POST['n_exp'   ]}'), ";
      $q .= " exp      = trim('{$_POST['exp'     ]}'), ";
      $q .= " size     = trim('{$_POST['size'    ]}'), ";
      $q .= " emu      = trim('{$_POST['emu'     ]}'), ";
      $q .= " filter   = trim('{$_POST['filter'  ]}'), ";
      $q .= " ph       = trim('{$_POST['ph'      ]}'), ";
      $q .= " t        = trim('{$_POST['t'       ]}'), ";
      $q .= " b        = trim('{$_POST['b'       ]}'), ";
      $q .= " f        = trim('{$_POST['f'       ]}'), ";
      $q .= " c0       = trim('{$_POST['c0'      ]}'), ";
      $q .= " observer = trim('{$_POST['observer']}'), ";
      $q .= " meas     = trim('{$_POST['meas'    ]}'), ";
#      $q .= "          = trim('{$_POST['        ']}'), ";
      $q .= " ed=trim('$ed') ";
      $q .= " where id='$id'+0 ";
      }
   else
      {
      $q  = " insert into plates_$table ( ";

      $q .= " instr,    ";
      $q .= " num_bak,  ";
      $q .= " num,      ";
      $q .= " obj,      ";
      $q .= " obs_date, ";
      $q .= " ra1     , ";
      $q .= " ra2     , ";
      $q .= " dec1    , ";
      $q .= " dec2    , ";
      $q .= " obs_time, ";
      $q .= " u       , ";
      $q .= " n_exp   , ";
      $q .= " exp     , ";
      $q .= " size    , ";
      $q .= " emu     , ";
      $q .= " filter  , ";
      $q .= " ph      , ";
      $q .= " t       , ";
      $q .= " b       , ";
      $q .= " f       , ";
      $q .= " c0      , ";
      $q .= " observer, ";
      $q .= " meas    , ";
      $q .= " ed         ";

      $q .= " ) values ( ";

      $q .= " trim('{$_POST['instr'   ]}'), ";
      $q .= " trim('{$_POST['num'     ]}'), ";
      $q .= " trim('$num'), ";
      $q .= " trim('{$_POST['obj'     ]}'), ";
      $q .= " trim('{$_POST['obs_date']}'), ";
      $q .= " trim('{$_POST['ra1'     ]}'), ";
      $q .= " trim('{$_POST['ra2'     ]}'), ";
      $q .= " trim('{$_POST['dec1'    ]}'), ";
      $q .= " trim('{$_POST['dec2'    ]}'), ";
      $q .= " trim('{$_POST['obs_time']}'), ";
      $q .= " trim('{$_POST['u'       ]}'), ";
      $q .= " trim('{$_POST['n_exp'   ]}'), ";
      $q .= " trim('{$_POST['exp'     ]}'), ";
      $q .= " trim('{$_POST['size'    ]}'), ";
      $q .= " trim('{$_POST['emu'     ]}'), ";
      $q .= " trim('{$_POST['filter'  ]}'), ";
      $q .= " trim('{$_POST['ph'      ]}'), ";
      $q .= " trim('{$_POST['t'       ]}'), ";
      $q .= " trim('{$_POST['b'       ]}'), ";
      $q .= " trim('{$_POST['f'       ]}'), ";
      $q .= " trim('{$_POST['c0'      ]}'), ";
      $q .= " trim('{$_POST['observer']}'), ";
      $q .= " trim('{$_POST['meas'    ]}'), ";
      $q .= " trim('$ed') ";

      $q .= " ) ";
      }
   sql($q);
#   echo "\n<br> $error  $aff_rows\n";
   echo "<br> \nPassword OK. Record was updated. <br> \n";
?>
