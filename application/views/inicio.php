<?php if ($this->session->flashdata('class')) { ?>

    <div class="alert alert-<?= $this->session->flashdata('class'); ?>" role="alert">
        <center>

            <?= $this->session->flashdata('inicio'); ?>

        </center>
    </div>


<?php } ?>