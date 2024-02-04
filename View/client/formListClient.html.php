






<div class="vh-150 w-100 d-flex justify-content-center align-items-center bg-dark">

    <div class="w50 radius-10 shadow-white p-4">
        <h1 class="titre text-light text-center ">LISTE CLIENT</h1>
        <form action="client&action=save" method="post" enctype="multipart/form-data">
            <div class="form-line-input my-4" hidden>
                <label for="id">Code:</label>
                <input type="text" id="id_client" name="id_client" value="<?= $id_client ?>" <?= $disabled ?>>
            </div>
            <div class="form-line-input my-4">
                <img id="image_view" src="<?php echo isset($_SESSION['photo'])?$_SESSION['photo']:"public/upload/photo.jpg" ?>" alt="" width="40%">
                <input class="" type="file" class="from-control w50" id="photo" name="photo" value="" onChange="previewImage(event,'image_view')" >
            </div>
            <div class="form-line-input my-4">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="<?= $nom ?>" <?= $disabled ?>>
            </div>

            <div class="form-line-input my-2">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" value="<?= $prenom ?>" <?= $disabled ?>>
            </div>

            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" value="<?= $email ?>" <?= $disabled ?>>

            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" value="<?= $password ?>" <?= $disabled ?>>

            <!-- add new line here for showing role-id as option which we will need -->
            <select class=" form-select" id="id_role" name="id_role[]" multiple>ROLE
                <?php foreach ($roles as $role) : ?>
                    <option value="<?= $role['id_role'] ?>" <?= $role['selected'] ?>>
                        <?= $role['id_role'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- added button  -->
            <div class="d-flex justify-content-between">
                <a href="javascript:history.go(-1)" class="btn btn-primary mx-2">Retourner</a>
                <a href="" class="btn btn-secondary mx-2" <?= $disabled ?>">Annuler</a>
                <button type="submit" class="btn btn-danger mx-2" <?= $disabled ?>>Valider</button>
            </div>

        </form>
        </body>