<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        <title>Psystem</title>

        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
    </head>

    <body>
        <div class="container">

            <?php if ($this->session->flashdata('class')) { ?>

                <div class="alert alert-<?= $this->session->flashdata('class'); ?>" role="alert">
                    <center>

                        <?= $this->session->flashdata('login'); ?>

                    </center>
                </div>


            <?php } ?>

            <form class="form-signin" method="POST" action="<?= base_url('login/logar'); ?>">
                <h2 class="form-signin-heading">Teste</h2>

                <!--Campo de e-mail-->
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required autofocus>
                <!--Campo senha-->
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
                <!--Botão de entrada-->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

                <br>

                <center>

                    <p><b>Login:</b> admin@admin</p>
                    <p><b>Senha:</b> admin</p>

                </center>

            </form>

        </div> <!-- /container -->
    </body>
</html>