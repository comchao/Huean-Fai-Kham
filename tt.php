<?php

    include "connects.php";

 $SQL="select tblogin.*,product.*,orders.* from tblogin,product,orders where 1 and tblogin.login_id=product.pid and product.pid=orders.order_id and orders.order_id";

 $data= mysqli_query($SQL) or die ("Error Query [".$SQL."]");    

?>

 <table width="100%" >
   <tr>
     <td bgcolor="#FFFFFF" width="50" align="center">    Id     </td>
     <td bgcolor="#FFFFFF"  width="573" align="center">      Name      </td>
     <td bgcolor="#FFFFFF" width="100" align="center">     Salary    </td>
     <td bgcolor="#FFFFFF" width="100" align="center">     Status</td>
   </tr>


 <?php while($rs=mysql_fetch_array($data))  {      ?>


   <tr>
     <td  align="center">     <?=$rs['login_id'];  ?>      </td>
     <td  align="center">   <?=$rs['login_firstname'];?>  </td>
     <td  align="center">   <?=$rs['name'];?>         </td>
     <td  align="center">   <?=$rs['price'];?>         </td>
   </tr>

   <?  } ?>
 </table>    