<br>
<!--<br>
<form name="form1" method="post" action="save_checkout.php">
<table width="821" height="138" border="1">
<tr> 
	<td width="249">วันที่จอง</td>
    
    					    <script type="text/javascript">

                            $(function(){
                              $("#dateInput").datepicker({
                                dateFormat: 'dd-mm-yy', 
                                numberOfMonths: 2,
                              });
                            });

                            </script> 
    <td width="556"><input type="text" name="dateInput" id="dateInput" value="" /> </td>
</tr>


<tr> 
	<td>ชื่อผู้จอง</td>
    <td>               
        <input type="text" name="text1" disabled="disabled" value="<?php echo $_SESSION['name'] ?> " /></td>
</tr>
<tr> 
	<td> จำนวนท่านที่มา</td>
    <td> <select name="rev_ppl" id="rev_ppl" validate="required:true">
                            <option value="" selected="selected">จำนวนท่าน</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">15</option>
                            <option value="11">20</option>
                          </select></td>
                          
</tr>
<tr> 
	<td>เวลา </td>
    <td><select name="time_hour" id="time_hour" tabindex="7">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                          </select>
                            :
                            <select name="time_min" id="time_min" tabindex="8">
                              <option value="00">00</option>
                              <option value="10">10</option>
                              <option value="20">20</option>
                              <option value="30">30</option>
                              <option value="40">40</option>
                              <option value="50">50</option>
                            </select>
                            น.  </td>
</tr>
<tr> 
	<td>โซนที่นั่ง </td>
    <td>   <select name="tbzonetable">
                            <option value=""> -- กรุณาเลือกโซน -- </option>
                            <?php
                              $sql_tbzonetable = "SELECT * FROM tbzonetable";
                              $res_tbzonetable = mysqli_query($dbcon,$sql_tbzonetable);
                              while ($row_tbzonetable = mysqli_fetch_assoc($res_tbzonetable)) {
                                  echo '<option value="'.$row_tbzonetable['zone_id'].'">'.$row_tbzonetable['zone_name'].'</option>';
                              }
                            ?>
                            </select> </td>
</tr>
<tr> 
	<td>โต๊ะ</td>
    <td> <select name="tbtable">
                            <option value=""> -- กรุณาเลือกโต๊ะ -- </option>
                            <?php
                              $sql_tbtable = "SELECT * FROM tbtable";
                              $res_tbtable = mysqli_query($dbcon,$sql_tbtable);
                              while ($row_tbtable = mysqli_fetch_assoc($res_tbtable)) {
                                  echo '<option value="'.$row_tbtable['tb_id'].'">'.$row_tbtable['tb_number'].'</option>';
                              }
                            ?>
                            </select> </td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="ยืนยันการสั่งจอง"></td>
</tr>


</table>
</form>

<?php /*?><form name="form1" method="post" action="save_checkout.php">
  <table width="304" border="1">
    <tr>
      <td width="71">Name</td>
      <td width="217"><input type="text" name="txtName"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txtAddress"></textarea></td>
    </tr>
    <tr>
      <td>Tel</td>
      <td><input type="text" name="txtTel"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="txtEmail"></td>
    </tr>
  </table>
    <input type="submit" name="Submit" value="Submit">
</form><?php */?>
<?php
mysql_close();
?> -->