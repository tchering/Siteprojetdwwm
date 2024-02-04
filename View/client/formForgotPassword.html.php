<div class="vh-150 w-100 d-flex justify-content-center align-items-center bg-dark">
    <div class="w50 bg_green radius-10 shadow-white p-4">
        <h1 class="titre text-light text-center ">CONNEXION</h1>
        <form action="client&action=forgotpassword" method="post">

            <?php if (isset($message)) : ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" required>


            <button type="submit" value="submit">Password Reset</button>

        </form>