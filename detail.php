<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>

<?php
if(!empty($tab_v)){
    echo '<table border=\'3\'>
    <th colspan="3">Detail de l\'utilisateur </th>
    <tr><td>login</td><td>nom</td><td>prenom</td></tr>';
foreach ($tab_v as $v)
    $vlogin=htmlspecialchars($v->get('login'));
    $vnom=htmlspecialchars($v->get('nom'));
    $vprenom=htmlspecialchars($v->get('prenom'));
    echo '<tr><td>' . $vlogin .
        ' </td><td>'.$vnom .' </td><td> '.$vprenom .'</td></tr>';
}
else
    require ('../view/utilisateur/error.php');
?>
</table>
</body>
</html>
