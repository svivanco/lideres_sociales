<?php $this->loadHelper('Form', ['templates' => 'app_form']); ?>
<div class="col-md-3">
    <?php
    echo $this->Form->create('CoUsuario',['class'=>'form','role'=>'form']);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Bienvenido <?php echo $this->request->session()->read('Auth.User.nombre_completo'); ?></h3>
            </div>
            <div class="panel-body">
                <small>Su perfil cuenta con mas un rol de sistema. Por favor seleccione con cual desea trabajar</small>
                <?php
                echo $this->Form->input('co_grupo_id', ['label'=>false,'empty'=>true,'required'=>'required','options' => $this->request->session()->read('gruposActivos')]);
                ?>
            </div>
            <div class="panel-footer">
                <?php echo $this->Form->button('<i class="glyphicon glyphicon-ok"></i>',['id'=>'btnGuardar','class'=>'btn btn-success','escape'=>false]) ?>
            </div>
        </div>
        <?php
    echo $this->Form->end();
    ?>
</div>