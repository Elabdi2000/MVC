<body>
<p><h1>Liste des utilisateurs</h1></p>
<table border='3'>
    <th colspan="2">utilisateur</th>
<?php

foreach ($tab_v as $v){
	$vlogin=htmlspecialchars($v->get('login'));
    $hlogin=rawurlencode($v->get('login'));
    echo '<tr><td> <a href=../controller/index.php?action=readu&login='.$hlogin.'>' . $vlogin . '</a></td><td><a href=../controller/index.php?action=deleteu&login='.$hlogin.'>del</a></td>
<td><a href=../controller/index.php?action=updateu&login='.$hlogin.'>update</a></td></tr>';
}
?>
</table>
</body>
