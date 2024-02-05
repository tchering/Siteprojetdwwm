<?php
class ClientController extends MyFct
{
    public function __construct()
    {
        $action = "list";
        extract($_GET);
        switch ($action) {
            case 'afficher':
                if (isset($id)) {
                    $this->afficherClient($id);
                }
                break;
            case 'list':
                $this->showClients();
                break;
            case "login":
                if ($_POST) {
                    $this->loginSuccess($_POST);
                }
                $this->loginUser();
                break;
            case 'logout':
                $this->logoutClient();
                break;
            case 'register': //--- case inscription
                if ($_POST) {
                    $this->registerUser($_POST);
                }
                $this->registerForm();
                break;
            case 'insert':
                $this->afficherFormInsert();
                break;
            case 'modifier':
                $this->modifierClient($id);
                break;
            case 'save':
                $this->saveClient($_POST, $_FILES);
                break;
            case 'supprimer':
                $this->supprimer($id);
                break;
            case 'search':
                $this->searchClient($mot);
                break;
            case 'forgotpassword':
                if ($_POST) {
                    $this->forgotPassword($_POST);
                }
                $this->forgotPasswordForm();
                break;
        }
    }


    //! Mes fonctions
    function forgotPasswordForm()
    {
        $file = "View/client/formForgotPassword.html.php";
        $this->generatePage($file);
    }
    function forgotPassword($email)
    {
        extract($email);
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        // Retrieve the user's email from the database
        $cm = new ClientManager();
        $message = $cm->forgotPassword($email, $token);
        $variables = [
            'message' => $message,
        ];
        $file  = "View/client/formForgotPassword.html.php";
        $this->generatePage($file, $variables);
    }
    function searchClient($mot)
    {
        $cm = new ClientManager();
        $Clients = $cm->search($mot);
        $listClients = [];

        foreach ($Clients as $client) {
            $client = new Client($client);
            $id = $client->getId_client();
            $nom = $client->getNom();
            $prenom = $client->getPrenom();
            $email = $client->getEmail();
            $listClients[] = [
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
            ];
        }
        //here the array is converted to json which is converted to js object in listClient.html.php
        $Clients = json_encode($listClients);
        echo $Clients;
    }
    function supprimer($id)
    {
        $cm = new ClientManager();
        $cm->supprimer($id);
        header('location:client');
        exit;
    }

    //todo added new function saveCLient if id=0 then add if not then update.
    function saveClient($data, $files = [])
    {
        MyFct::prints($files);
        if ($files['photo']['name']) {
            $file_photo = $_FILES['photo'];
            $name = $file_photo['name'];
            $source = $file_photo['tmp_name'];
            $destination = "public/upload/$name";
            $data['photo'] = $name;
            if (move_uploaded_file($source, $destination)) {
                $_SESSION['photo'] = $destination;
            }
        } else {
            unset($data['name']); // supprimer l'element a l'indice 'name' dans $data 
        }
        extract($data);
        $cm = new ClientManager();
        $id_client = (int) $id_client;
        if ($id_client == 0) {
            $cm->insertClient($data);
            header('location:client');
        } else {
            $cm->modifierClient($data);
            header('location:client');
        }
        // $file = "View/client/formListClient.html.php";
        // $this->generatePage($file);
    }

    //todo added new function modifierClient. Shows formClient that calls 
    function modifierClient($id)
    {
        $cm = new ClientManager();
        $client = $cm->showId($id);
        $disabled = "";
        $this->formGenerate($client, $disabled);
    }
    function afficherFormInsert()
    {
        $r = new RoleManager();
        $allRoles = $r->findRoles();
        $roles = [];
        foreach ($allRoles as $role) {
            $selected = ""; // Initialize $selected as an empty string
            $id_role = $role['id_role'];

            $selected = "";

            $roles[] = ['id_role' => $id_role, 'selected' => $selected];
        }

        $variables = [
            'roles' => $roles,
            'id_client' => "",
            'nom' => "",
            'prenom' => "",
            'email' => "",
            'password' => "",
            'disabled' => "",
            'titre' => 'Liste Client',

        ];
        $file = "View/client/formListClient.html.php";
        $this->generatePage($file, $variables);
    }
    function loginUser()
    {
        $file = "View/client/formLogin.html.php";
        $this->generatePage($file);
    }
    function logoutClient()
    {
        session_unset();
        session_destroy();
        header('location:accueil');
    }

    function loginSuccess($data)
    {
        extract($data);
        $cm = new ClientManager();
        $message = $cm->login($data);
        $file = "View/client/formLogin.html.php";
        $variable = [
            'message' => $message,
        ];
        $this->generatePage($file, $variable);
    }
    //pour afficher formulaire inscription
    function registerForm()
    {
        $file = "View/client/formRegistration.html.php";
        $this->generatePage($file);
    }
    function registerUser($data)
    {  // function inscription
        extract($data);
        $cm = new ClientManager();
        $message = $cm->register($data);
        $file = "View/client/formRegistration.html.php";
        $variable = [
            'message' => $message
        ];
        $this->generatePage($file, $variable);
    }
    //! new variable is created here to show roles as option.
    function afficherClient($id)
    {
        $cm = new ClientManager();
        $client = $cm->showId($id);
        $disabled = "disabled";
        $this->formGenerate($client, $disabled);
    }

    function showClients()
    {
        $cm = new ClientManager();
        $Clients = $cm->showClient();
        // $Clients = json_encode($Clients);
        //!this is for showing clients roles

        // MyFct::prints($roleName);
        $listClients = [];
        foreach ($Clients as $client) {
            $client = new Client($client);
            $id = $client->getId_client();
            $nom = $client->getNom();
            $prenom = $client->getPrenom();
            $email = $client->getEmail();
            $photo = $client->getPhoto();
            $listClients[] = [
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'photo' => $photo,
            ];
        }
        $variables = [
            'listClients' => $listClients,
        ];
        // MyFct::prints($variables);

        $file = "View/client/listClient.html.php";
        $this->generatePage($file, $variables);
    }
    //! this is common form for afficherCLient  and modifierClient.
    function formGenerate($client, $disabled)
    {
        //this is for photo
        $photo = $client->getPhoto();
        if (!$photo) {
            $photo = "photo.jpg";
        }
        //!Here we will get all roles from database with its id_role since it is in Client.
        $r = new RoleManager();
        $client_roleId = $client->getId_role();

        $allRoles = $r->findRoles();
        $roles = [];
        foreach ($allRoles as $role) {
            $selected = ""; // Initialize $selected as an empty string
            $id_role = $role['id_role'];
            if ($id_role == $client_roleId) {
                $selected = "selected";
            }
            $roles[] = ['id_role' => $id_role, 'selected' => $selected];
        }

        $variables = [
            'roles' => $roles,
            'id_client' => $client->getId_client(),
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'email' => $client->getEmail(),
            'password' => '',
            'disabled' => $disabled,
            'titre' => 'Liste Client',
            'role' => $client->getNom_role(),
            'photo' => $photo,
        ];
        $file = "View/client/formListClient.html.php";
        $this->generatePage($file, $variables);
    }
}
