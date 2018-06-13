<div class="col-md-12">

    <div class="container">

        <?php
        if (!empty($this->session->flashdata('cliente'))) {

            $msg = $this->session->flashdata('cliente');
            ?>
            <div class="alert alert-<?= $msg['class']; ?>" role="alert">
                <center><?= $msg['msg']; ?></center>
            </div>
        <?php } ?>

        <div class="row">

            <!--Titulo da página-->
            <legend>
                <h2>Cadastro de clientee</h2>
            </legend>

            <!--Texto de orientação-->
            <h5>Todos os campos com <font color="red">*</font> são obrigatório</h5>

        </div>

        <!--Formulário-->
        <form method="POST" action="<?= base_url('cliente/cadastro'); ?>" enctype="multipart/form-data">

            <div class="row">

                <!--Nome do cliente-->
                <div class="col-md-4">

                    <label for="cl_nome">Nome <font color="red">*</font></label>
                    <input type="text" name="cl_nome" placeholder="Digite seu nome" class="form-control" required autofocus>

                </div>

                <!--CNPJ do cliente-->
                <div class="col-md-4">

                    <label for="cl_cnpj">CNPJ <font color="red">*</font></label>
                    <input type="text" name="cl_cnpj" placeholder="Digite o CNPJ" id="cnpj" class="form-control cnpj" required>


                </div>

                <!--Logo do cliente-->
                <div class="col-md-4">

                    <label for="cl_logo">Logo <font color="red">*</font></label>
                    <input type="file" name="cl_logo" class="form-control" accept=".jpg, .jpeg, .png" required>


                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-12">

                    <!--Botão de cadastro-->
                    <button type="submit" class="btn btn-success">Cadastrar</button>

                </div>

            </div>
        </form>

        <br>
        <?php if (!empty($lista)) { ?>

            <div class="table-responsive">


                <table class="table table-hover table-striped">

                    <tr>
                        <th>Logo</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Ação</th>
                    </tr>

                    <?php foreach ($lista as $lis) { ?>

                        <tr>
                            <td><img src="<?= base_url('assets/logo/' . $lis->cl_logo); ?>" width="70px" height="70px"></td>
                            <td><?= $lis->cl_nome; ?></td>
                            <td><?= $lis->cl_cnpj; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".edi<?= $lis->cl_cd; ?>">Editar</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".exc<?= $lis->cl_cd; ?>">Excluir</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".log<?= $lis->cl_cd; ?>">Alterar logo</button>
                            </td>
                        </tr>

                        <div class="modal fade edi<?= $lis->cl_cd; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <form method="POST" action="<?= base_url('cliente/editar'); ?>">
                                    <input type="hidden" name="cd" value="<?= $lis->cl_cd; ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar cliente</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <!--Nome do cliente-->
                                                <div class="col-md-6">

                                                    <label for="cl_nome">Nome <font color="red">*</font></label>
                                                    <input type="text" value="<?= $lis->cl_nome; ?>" name="cl_nome" placeholder="Digite seu nome" class="form-control" required autofocus>

                                                </div>

                                                <!--CNPJ do cliente-->
                                                <div class="col-md-6">

                                                    <label for="cl_cnpj">CNPJ <font color="red">*</font></label>
                                                    <input type="text" value="<?= $lis->cl_cnpj; ?>" name="cl_cnpj" placeholder="Digite o CNPJ" id="cnpj" class="form-control cnpj" required>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="modal fade exc<?= $lis->cl_cd; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <form method="POST" action="<?= base_url('cliente/excluir'); ?>">
                                    <input type="hidden" name="cd" value="<?= $lis->cl_cd; ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Excluir cliente</h4>
                                        </div>
                                        <div class="modal-body">
                                            Deseja realmente apagar o cliente?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                            <button type="submit" class="btn btn-success">Sim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="modal fade log<?= $lis->cl_cd; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <form method="POST" action="<?= base_url('cliente/logo'); ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="cd" value="<?= $lis->cl_cd; ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Alterar logo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <!--Logo do cliente-->
                                                <div class="col-md-12">

                                                    <label for="cl_logo">Logo <font color="red">*</font></label>
                                                    <input type="file" name="cl_logo" class="form-control" accept=".jpg, .jpeg, .png" required>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php } ?>

                </table>

            </div>

        <?php } else { ?>

            <center>
                <h3 style="color: red;">Nenhum cliente cadastrado!</h3>
            </center>

        <?php } ?>

    </div>

</div>