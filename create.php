
<form method="GET" action=..\controller\index.php?action=createdu>

    <fieldset>
        <legend>Mon formulaire :</legend>
        <input type='hidden' name='action' value='createdu'>
        <p>
            <label for="login">login</label> :
            <input type="text" placeholder="Ex : " name="login" id="login" required/>
        </p>
        <p>
            <label for="nom">nom</label> :
            <input type="text" placeholder="Ex : " name="nom" id="nom" required/>
        </p>
        <p>
            <label for="prenom">prenom</label> :
            <input type="text" placeholder="Ex : " name="prenom" id="prenom" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" name="envoi"/>
        </p>
    </fieldset>
</form>
