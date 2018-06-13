<div class="col-md-12">

    <div class="container">


        <?php
        if (!empty($this->session->flashdata('usuario'))) {

            $msg = $this->session->flashdata('usuario');
            ?>
            <div class="alert alert-<?= $msg['class']; ?>" role="alert">
                <center><?= $msg['msg']; ?></center>
            </div>
        <?php } ?>



        <div class="row">

            <!--Titulo da página-->
            <legend>
                <h2>Cadastro de Usuário</h2>
            </legend>

            <!--Texto de orientação-->
            <h5>Todos os campos com <font color="red">*</font> são obrigatório</h5>

        </div>

        <!--Formulário-->
        <form method="POST" action="<?= base_url('usuario/cadastro'); ?>">

            <div class="row">

                <!--Nome do usúario-->
                <div class="col-md-4">

                    <label for="us_nome">Nome <font color="red">*</font></label>
                    <input type="text" name="us_nome" placeholder="Digite seu nome" class="form-control" required autofocus>

                </div>

                <!--E-mail do usúario-->
                <div class="col-md-3">

                    <label for="us_email">E-mail <font color="red">*</font></label>
                    <input type="email" name="us_email" placeholder="Digite seu email" class="form-control" required>


                </div>

                <!--Nível do Usúario-->
                <div class="col-md-2">


                    <label for="us_nivel">Nível <font color="red">*</font></label>

                    <select name="us_nivel" class="form-control" required>

                        <option value="">Selecione</option>
                        <option value="1">Usuário</option>
                        <option value="2">Administrador</option>

                    </select>

                </div>

                <!--Senha do Usúario-->
                <div class="col-md-3">

                    <label for="us_senha">Senha <font color="red">*</font></label>
                    <input type="password" name="us_senha" placeholder="Digite sua senha" class="form-control" required>

                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-12">

                    <!--Botão de cadastro-->
                    <button type="submit" class="btn btn-success">Salvar</button>

                </div>

            </div>
        </form>

        <br>

        <?php if (!empty($lista)) { ?>

            <div class="table-responsive">

                <table class="table table-hover table-striped">

                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Nível</th>
                        <th>Ação</th>
                    </tr>

                    <?php foreach ($lista as $lis) { ?>

                        <tr>
                            <td><?= $lis->us_nome; ?></td>
                            <td><?= $lis->us_email; ?></td>
                            <td>
                                <?php
                                if ($lis->us_nivel == 1) {
                                    echo 'Usuário';
                                } else {
                                    echo 'Administrador';
                                }
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target=".edi<?= $lis->us_cd; ?>">Editar</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target=".exc<?= $lis->us_cd; ?>">Excluir</button>
                                <button class="btn btn-primary" data-toggle="modal" data-target=".sen<?= $lis->us_cd; ?>">Senha</button>
                            </td>
                        </tr>

                        <div class="modal fade edi<?= $lis->us_cd; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <form method="POST" action="<?= base_url('usuario/editar'); ?>">
                                    <input type="hidden" name="cd" value="<?= $lis->us_cd; ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar usuário</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <!--Nome do usúario-->
                                                <div class="col-md-4">

                                                    <label for="us_nome">Nome <font color="red">*</font></label>
                                                    <input type="text" value="<?= $lis->us_nome; ?>" name="us_nome" placeholder="Digite seu nome" class="form-control" required autofocus>

                                                </div>

                                                <!--E-mail do usúario-->
                                                <div class="col-md-4">

                                                    <label for="us_email">E-mail <font color="red">*</font></label>
                                                    <input type="email" value="<?= $lis->us_email; ?>" name="us_email" placeholder="Digite seu email" class="form-control" required>


                                                </div>

                                                <!--Nível do Usúario-->
                                                <div class="col-md-4">


                                                    <label for="us_nivel">Nível <font color="red">*</font></label>

                                                    <select name="us_nivel" class="form-control" required>

                                                        <option value="">Selecione</option>
                                                        <option value="1" <?php
                                                        if ($lis->us_nivel == 1) {
                                                            echo 'selected';
                                                        }
                                                        ?> >Usuário</option>
                                                        <option value="2" <?php
                                                        if ($lis->us_nivel == 2) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Administrador</option>

                                                    </select>

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

                        <div class="modal fade exc<?= $lis->us_cd; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <form method="POST" action="<?= base_url('usuario/excluir'); ?>">
                                    <input type="hidden" name="cd" value="<?= $lis->us_cd; ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Excluir usuário</h4>
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                Você deseja realmente excluir <b><?= $lis->us_nome; ?></b>?
                                            </center>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                            <button type="submit" class="btn btn-success">Sim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="modal fade sen<?= $lis->us_cd; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <form method="POST" action="<?= base_url('usuario/senha'); ?>">
                                    <input type="hidden" name="cd" value="<?= $lis->us_cd; ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Alterar senha do usuário</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="senha">Senha</label>
                                                        <input type="password" maxlength="255" name="us_senha" id="nova_senha<?= $lis->us_cd; ?>" onkeyup="checarSenha<?= $lis->us_cd; ?>()" class="form-control" placeholder="Digite a senha" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="confirme">Confirme a senha</label>
                                                        <input type="password" maxlength="255" name="us_confirme" id="senha_confirmar<?= $lis->us_cd; ?>" onkeyup="checarSenha<?= $lis->us_cd; ?>()" class="form-control" placeholder="Confirme a senha" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <center>
                                                            <div id="info-span">
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                            <button type="submit" class="btn btn-success" id="enviarsenha<?= $lis->us_cd; ?>">Sim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function () {
                                $("#nova_senha<?= $lis->us_cd; ?>").keyup(checkPasswordMatch);
                                $("#senha_confirmar<?= $lis->us_cd; ?>").keyup(checkPasswordMatch);
                            });
                            function checarSenha<?= $lis->us_cd; ?>()
                            {
                                var password = $("#nova_senha<?= $lis->us_cd; ?>").val();
                                var confirmPassword = $("#senha_confirmar<?= $lis->us_cd; ?>").val();
                                if (password === '' || '' === confirmPassword) {

                                    $("#info-span").html("<br><br><span style='color:SteelBlue'>Confirme a senha!</span>");
                                    document.getElementById("enviarsenha<?= $lis->us_cd; ?>").disabled = true;
                                } else if (password != confirmPassword)
                                {
                                    $("#info-span").html("<br><br><span style='color:red'>As senhas não conferem!</span>");
                                    document.getElementById("enviarsenha<?= $lis->us_cd; ?>").disabled = true;
                                } else
                                {
                                    $("#info-span").html("<br><br><span style='color:green'>As senhas conferem!</span>");
                                    document.getElementById("enviarsenha<?= $lis->us_cd; ?>").disabled = false;
                                }

                            }
                        </script>

                    <?php } ?>

                </table>

            </div>

        <?php } else { ?>

            <center>
                <h3 style="color: red;">Nenhum usuário cadastrado!</h3>
            </center>

        <?php } ?>

    </div>

</div>