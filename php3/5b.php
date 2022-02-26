<?php
if ($db->connect_error)
{
  die('Eroare la conectare: ' . $db->connect_error);
}
$query = "SELECT Contract_j.nr_pagini , Persoana.nume
FROM Contract_j
INNER JOIN Persoana
ON Contract_j.id_client=Persoana.id_p
WHERE nr_pagini IN (SELECT nr_pagini FROM Contract_j WHERE nr_pagini = 1)"; 
$result = mysqli_query($db, $query);
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error($db));
}
$num_results = mysqli_num_rows($result);
echo '<table>
  <tr>
    <th>Contract_j.nr_pagini</th>
    <th> &nbsp;&nbsp; Persoana.nume</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['nr_pagini']).'</td>';
  echo '<td> &nbsp;&nbsp;'.stripslashes($row['nume']).' </td></tr>';
}
echo '</table>';

?>