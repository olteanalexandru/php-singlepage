<?php
if ($db->connect_error)
{
  die('Eroare la conectare: ' . $db->connect_error);
}
$query = "SELECT A.id_cj AS id_cj1, B.id_cj AS id_cj2
FROM Contract_j  A JOIN Contract_j  B ON (A.id_client=B.id_client)
WHERE  A.id_client = B.id_client  AND A.id_avocat <> B.id_avocat"; 
$result = mysqli_query($db, $query);
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error($db));
}
$num_results = mysqli_num_rows($result);
echo '<table>
  <tr>
    <th>id_cj1</th>
    <th> &nbsp;&nbsp; id_cj2</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['id_cj1']).'</td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['id_cj2']).' </td></tr>';
}
echo '</table>';

?>