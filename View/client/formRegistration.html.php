<div class="vh-150 w-100 d-flex justify-content-center align-items-center bg-dark">
    <div class="w50 radius-10 shadow-white p-4">
        <h1 class="titre text-light text-center ">INSCRIPTION</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php echo isset($message) ? $message : "";
                    unset($message); ?>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <label for="id_role" hidden>Role:</label>
            <input type="number" id="id_role" name="id_role" value="2" hidden>

            <button type="submit" value="submit">S'inscrire</button>

        </form>