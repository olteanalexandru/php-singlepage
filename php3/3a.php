<?php
if ($db->connect_error)
{
  die('Eroare la conectare: ' . $db->connect_error);
}
$query = "SELECT  * FROM Contract_j  WHERE obiect='actiune civila' AND  date_format(data , '%m') = 09
ORDER BY data ASC"; 
$result = mysqli_query($db, $query);
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error($db));
}
// se obţine numărul tuplelor returnate
$num_results = mysqli_num_rows($result);
// se afişează fiecare tuplă returnată
echo '<table>
  <tr>
    <th>id_cj</th>
   	<th> &nbsp;&nbsp; data</th>
 <th> &nbsp;&nbsp; obiect</th>
   <th> &nbsp;&nbsp; onorar</th>
 	<th> &nbsp;&nbsp; nr_pagini</th>
    <th> &nbsp;&nbsp; id_client</th>
    <th> &nbsp;&nbsp; id_avocat</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['ID_CJ']).'</td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['DATA']).' </td> ';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['OBIECT']).' </td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['ONORAR']).'   </td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['NR_PAGINI']). ' </td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['ID_CLIENT']).' </td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['ID_AVOCAT']).' </td></tr>';
}
echo '</table>';

?>