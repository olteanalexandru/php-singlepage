<?php
if ($db->connect_error)
{
  die('Eroare la conectare: ' . $db->connect_error);
}
$query = "SELECT SUM(suma) , date_format(data , '%m')
FROM rata
GROUP BY date_format(data , '%m')"; 
$result = mysqli_query($db, $query);
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error($db));
}
$num_results = mysqli_num_rows($result);
echo '<table>
  <tr>
    <th>SUM(suma) GROUP BY date_format</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['SUM(suma)']).' </td></tr>';
}
echo '</table>';

?>