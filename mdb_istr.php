<td colspan="3" valign="center" align="center" class="c1" width="60%">
        <select name="instrum">
        <?php
                global $instr_list;
                global $instr_des;
                        $res = mysql_query($req." AND b7=1", $conn);
                        $num_ph=mysql_num_rows($res);
                        $res = mysql_query($req." AND b7=2", $conn);
                        $num_ccd=mysql_num_rows($res);
                        printf("<option value='0'>%s (ph=%d,ccd=%d)</option>\n",$instr_des[0],$num_ph,$num_ccd);
                $cnt=100;
                for($i=1; $i<$cnt; $i++) if($instr_des[$i]) {
                        $res = mysql_query($req.sprintf(" AND b6=%d AND b7=1",$i), $conn);
                        $num_ph=mysql_num_rows($res);
                        $res = mysql_query($req.sprintf(" AND b6=%d AND b7=2",$i), $conn);
                        $num_ccd=mysql_num_rows($res);
                        if (($num_ph+$num_ccd) || INSTR0) printf("<option value='%d'>%s %s %s (ph=%d,ccd=%d)</option>\n",$i,$instr_list[$i],($i)?"-":"",$instr_des[$i],$num_ph,$num_ccd);
                        };
        ?>
        </select>
</td>
