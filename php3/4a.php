<?php
if ($db->connect_error)
{
  die('Eroare la conectare: ' . $db->connect_error);
}
$query = "SELECT Contract_m.functie, Contract_m.data , Persoana.nume 
FROM Contract_m
INNER JOIN Persoana ON Contract_m.id_angajat=Persoana.id_p
WHERE functie != 'avocat' AND  date_format(data , '%Y') = 2021"; 
$result = mysqli_query($db, $query);
// verifică dacă rezultatul este în regulă
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error($db));
}
$num_results = mysqli_num_rows($result);
echo '<table>
  <tr>
    <th>Contract_m.functie</th>
   	<th> &nbsp;&nbsp; Contract_m.data</th>
    <th> &nbsp;&nbsp; Persoana.nume</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['functie']).'</td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['data']).' </td> ';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['nume']).' </td></tr>';
}
echo '</table>';
?>