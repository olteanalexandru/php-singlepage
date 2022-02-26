<?php
if ($db->connect_error)
{
  die('Eroare la conectare: ' . $db->connect_error);
}
$query = "SELECT Persoana.nume, Contract_m.salar_baza , Contract_m.data,Contract_j.id_avocat 
FROM ((Persoana
INNER JOIN Contract_j ON Contract_j.id_avocat = Persoana.id_p)
INNER JOIN Contract_m ON Contract_m.id_angajat  = Contract_j.id_avocat)
WHERE  date_format(Contract_m.data , '%Y') = 2021"; 
$result = mysqli_query($db, $query);
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error($db));
}
$num_results = mysqli_num_rows($result);
echo '<table>
<tr>
<th>Persoana.nume</th>
<th> &nbsp;&nbsp;&nbsp;&nbsp; Contract_m.salar_baza</th>
<th> &nbsp;&nbsp;&nbsp;&nbsp; Contract_m.data</th>
<th> &nbsp;&nbsp;&nbsp;&nbsp; Contract_j.id_avocat</th>
</tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['nume']).'</td>';
  echo '<td> &nbsp;&nbsp;&nbsp;'.stripslashes($row['salar_baza']).' </td> ';
  echo '<td> &nbsp;&nbsp;&nbsp;'.stripslashes($row['data']).' </td> ';
  echo '<td> &nbsp;&nbsp;&nbsp;'.stripslashes($row['id_avocat']).' </td></tr>';
}
echo '</table>';

?>