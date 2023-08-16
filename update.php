
<form method="GET" action=..\controller\index.php?action=updateu>

    <fieldset>
        <legend>Mon formulaire :</legend>
        <input type='hidden' name='action' value='updatedu'>
        <p>
            <label for="login">login</label> :
       <?php
       foreach ($tab_v as $v){
           $vlogin=htmlspecialchars($v->get('login'));
           $vnom=htmlspecialchars($v->get('nom'));
           $vprenom=htmlspecialchars($v->get('prenom'));
       }

       echo '<input readonly type="text" value='.$vlogin. ' name="login" id="login" required/>';
        ?>
        </p>
        <p>
            <label for="couleur_id">nom</label> :
         <?php  echo '<input type="text"  value='.$vnom.' name="nom" id="nom" required/>';?>
        </p>
        <p>
            <label for="marque_id">prenom</label> :
          <?php  echo '<input type="text"  value='.$vprenom.' name="prenom" id="prenom" required/>';?>
        </p>
        <p>
            <input type="submit" value="Envoyer" name="envoi"/>
        </p>
    </fieldset>
</form>

