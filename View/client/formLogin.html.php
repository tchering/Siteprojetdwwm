<div class="vh-150 w-100 d-flex justify-content-center align-items-center bg-dark">
    <div class="w50 bg_green radius-10 shadow-white p-4">
        <h1 class="titre text-light text-center ">CONNEXION</h1>
        <form action="" method="post">

        <?php echo isset($message)?$message:"";
            unset($message);
        ?>
            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <button type="submit" value="submit">Se connecter</button>
        </form>