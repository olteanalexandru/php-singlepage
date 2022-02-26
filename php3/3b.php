<?php
if ($db->connect_error)
{
  die('Eroare la conectare: ' . $db->connect_error);
}
$query = "SELECT * FROM Contract_m WHERE comision='18' ORDER BY salar_baza DESC"; 
$result = mysqli_query($db, $query);
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error($db));
}
$num_results = mysqli_num_rows($result);
echo '<table>
  <tr>
    <th>Id_cm</th>
   	<th> &nbsp;&nbsp; Data</th>
 <th> &nbsp;&nbsp; Functie</th>
   <th> &nbsp;&nbsp; Salar Baza</th>
 	<th> &nbsp;&nbsp; Comision</th>
    <th> &nbsp;&nbsp; id_angajat</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['id_cm']).'</td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['data']).' </td> ';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['functie']).' </td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['salar_baza']).'   </td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['comision']). ' </td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['id_angajat']).' </td></tr>';
}
echo '</table>';

?>