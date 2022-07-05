<div class="container">
    <h1>Login</h1>
    <?php Flasher::flash(); ?>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
        <p>Atau Daftar <strong> <a href="<?= BASEURL ?>/register">Disini</a></strong></p>
    </form>

</div>