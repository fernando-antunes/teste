<html>
    <head>
        <title>Teste</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        
        <!--Chama o css da pagina-->
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
        
        <!--Chama o js da pagina-->
        <script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
        <script src="<?= base_url('assets/js/jquery.mascara.js'); ?>"></script>
        <script src="<?= base_url('assets/js/mascara.js'); ?>"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Teste</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= base_url('inicio'); ?>">Início</a></li>
                        <li><a href="<?= base_url('usuario'); ?>">Usuário</a></li>
                        <li><a href="<?= base_url('cliente'); ?>">Cliente</a></li>
                        <li><a href="<?= base_url('troco'); ?>">Troco</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= base_url('login/sair'); ?>">Sair</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <br>
        <br>
        <br>
    </body>
</html>