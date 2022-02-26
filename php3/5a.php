<?php
if ($db->connect_error)
{
  die('Eroare la conectare: ' . $db->connect_error);
}
$query = "SELECT a1.salar_baza, a1.comision
FROM Contract_m a1, Contract_m a2
WHERE a1.comision = a2.comision AND
 a1.salar_baza = a2.salar_baza AND
 a1.id_cm = 123 "; 
$result = mysqli_query($db, $query);
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error($db));
}
$num_results = mysqli_num_rows($result);
echo '<table>
  <tr>
    <th>a1.salar_baza</th>
    <th> &nbsp;&nbsp; a1.comision</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['salar_baza']).'</td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['comision']).' </td></tr>';
}
echo '</table>';

?>