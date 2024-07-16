<?php
/**
 * @var \App\View\AppView $this
 */
?>
<script type="text/javascript">
    var statSend = false;
    function checkSubmit()
    {
        if (!statSend)
        {
            statSend = true;
            document.getElementById('btnGuardar').disabled = true;
            return true;
        }
        else
        {
            alert("El formulario ya se esta enviando...");
            return false;
        }
    }
</script>
<?php
$this->loadHelper('Form', ['templates' => 'app_form']);
?>
<div class="row">
    <div class="col-md-3">
        <div class="bs-item z-depth-5">
            <div class="list-group">
                <a class="list-group-item active">Acciones</a>
                <?= $this->Html->link('<i class="zmdi zmdi-apps">&nbsp;</i>Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>

            </div>
        </div>
    </div>
< <div class="col-sm-9">
        <div class="card">
            <div class="card-header">
                <h2> <?= __('Nuevo Grupo') ?></h2>
            </div>
            <div class="card-body card-padding">
                <?php echo $this->Form->create($coGrupo,['role'=>'form','class'=>'form']) ?>
                     <?php
                        echo $this->Form->input('name', ['label'=>['text'=>'Nombre']]);
                        echo $this->Form->input('pagina_inicial', ['label'=>['text'=>'Pagina Inicial']]);
                        // echo $this->Form->input('activo');
                                    $activo = array(1=>'ACTIVO');
                                    echo $this->Form->control('activo', ['empty'=>'DESACTIVO','options' => $activo,'class'=>'form-control','label'=>['class'=>'control-label','text'=>'Activar Grupo'],'div'=>['class'=>'form-group']]);
                                    ?>
                                    <!-- <div class="col-md-12"> -->
                                        <?php
                                        echo $this->Form->input('co_menus._ids', ['size'=>10,'options' => $coMenus,'label'=>['class'=>'control-label','text'=>'Menus']]);
                                        ?>
                                    <!-- </div> -->
                                    <div class="col-md-12">
                                        <br><br><br><br><br><br><br>
                                        <?php
                                        echo $this->Form->input('co_permisos._ids', ['size'=>10,'options' => $coPermisos,'class'=>'form-control','label'=>['class'=>'control-label','text'=>'Permisos'],'div'=>['class'=>'form-group']]);
                                        ?>
                                    </div>
                                    <?php
                    ?>
                <div class="row">
                    <label for="" class="col-md-12"></label>
                    <div class="col-md-9">
                        <div class="form-group form-button">
                            <?= $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar')) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


