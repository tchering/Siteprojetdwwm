<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>Title</th>
      <th>Status</th>
      <th>Position</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">John Doe</p>
            <p class="text-muted mb-0">john.doe@gmail.com</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Software engineer</p>
        <p class="text-muted mb-0">IT department</p>
      </td>
      <td>
        <span class="badge badge-success rounded-pill d-inline">Active</span>
      </td>
      <td>Senior</td>
      <td>
        <button type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/6.jpg"
              class="rounded-circle"
              alt=""
              style="width: 45px; height: 45px"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">Alex Ray</p>
            <p class="text-muted mb-0">alex.ray@gmail.com</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Consultant</p>
        <p class="text-muted mb-0">Finance</p>
      </td>
      <td>
        <span class="badge badge-primary rounded-pill d-inline"
              >Onboarding</span
          >
      </td>
      <td>Junior</td>
      <td>
        <button
                type="button"
                class="btn btn-link btn-rounded btn-sm fw-bold"
                data-mdb-ripple-color="dark"
                >
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/7.jpg"
              class="rounded-circle"
              alt=""
              style="width: 45px; height: 45px"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">Kate Hunington</p>
            <p class="text-muted mb-0">kate.hunington@gmail.com</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Designer</p>
        <p class="text-muted mb-0">UI/UX</p>
      </td>
      <td>
        <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
      </td>
      <td>Senior</td>
      <td>
        <button
                type="button"
                class="btn btn-link btn-rounded btn-sm fw-bold"
                data-mdb-ripple-color="dark"
                >
          Edit
        </button>
      </td>
    </tr>
  </tbody>
</table>






<div class="vh-150 w-100 d-flex justify-content-center align-items-center bg-dark">

    <div class="w50 radius-10 shadow-white p-4">
        <h1 class="titre text-light text-center ">LISTE CLIENT</h1>
        <form action="client&action=save" method="post" enctype="multipart/form-data">
            <div class="form-line-input my-4" hidden>
                <label for="id">Code:</label>
                <input type="text" id="id_client" name="id_client" value="<?= $id_client ?>" <?= $disabled ?>>
            </div>
            <div class="form-line-input my-4">
                <img id="image_view" src="public/upload/<?=$photo?>" alt="" width="40%">
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