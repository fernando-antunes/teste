<div class="col-md-12">

    <div class="container">

        <div class="row">

            <!--Titulo da página-->
            <legend>
                <h2>Valor do troco</h2>
            </legend>

            <!--Texto de orientação-->
            <div class="col-md-offset-4 col-md-4">
                <h5>Todos os campos com <font color="red">*</font> são obrigatório</h5>
            </div>

        </div>

        <!--Formulário-->
        <form method="POST" action="<?= base_url('troco/valor'); ?>" enctype="multipart/form-data">

            <div class="row">

                <!--Nome do cliente-->
                <div class="col-md-offset-4 col-md-4">

                    <label for="valor">Valor <font color="red">*</font></label>
                    <input type="text" name="valor" maxlength="10" placeholder="Digite o valor" id="money" class="form-control money" required autofocus>

                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-offset-4 col-md-4">

                    <!--Botão de cadastro-->
                    <button type="submit" class="btn btn-success">Enviar</button>

                </div>

            </div>

        </form>

        <?php
        $troco = $this->session->flashdata('troco');

        if (!empty($troco)) {
            ?>

            <br>

            <center>
                <h2>
                    Troco
                </h2>
            </center>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Cédulas</b>
                </div>

                <div class="panel-body">

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/100.jpg'); ?>" width="80px" height="50px"> => <?= $troco['100']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/50.jpg'); ?>" width="80px" height="50px"> => <?= $troco['50']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/20.jpg'); ?>" width="80px" height="50px"> => <?= $troco['20']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/10.jpg'); ?>" width="80px" height="50px"> => <?= $troco['10']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/5.jpg'); ?>" width="80px" height="50px"> => <?= $troco['5']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/2.jpg'); ?>" width="80px" height="50px"> => <?= $troco['2']; ?>

                    </div>

                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Moedas</b>
                </div>

                <div class="panel-body">

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/1.jpg'); ?>" width="80px" height="50px"> => <?= $troco['1']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/0,50.png'); ?>" width="80px" height="50px"> => <?= $troco['050']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/0,25.jpg'); ?>" width="80px" height="50px"> => <?= $troco['025']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/0,10.JPG'); ?>" width="80px" height="50px"> => <?= $troco['010']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/0,05.png'); ?>" width="80px" height="50px"> => <?= $troco['005']; ?>

                    </div>

                    <div class="col-md-2">

                        <img src="<?= base_url('assets/img/0,01.jpg'); ?>" width="80px" height="50px"> => <?= $troco['001']; ?>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</div>