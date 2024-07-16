<?php
$this->loadHelper('Form', ['templates' => 'app_form']);
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

<div class="row">
    <div class="col-sm-3">
	    <div class="bs-item z-depth-5">
			<div class="list-group">
				<a class="list-group-item active">Acciones</a>
				<?php echo $this->Html->link('<i class="zmdi zmdi-apps">&nbsp;</i>Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
	        </div>
	    </div>
    </div>

    <div class="col-sm-9">
        <div class="card">
            <div class="card-header">
                <h2>Nuevo Permiso</h2>
            </div>
            <div class="card-body card-padding">
                <?= $this->Form->create($coPermiso,['role'=>'form','onsubmit'=>'return checkSubmit();']) ?>
                <?= $this->Form->control('name',['label'=>false,'placeholder'=>'Nombre']); ?>
                <?= $this->Form->control('descripcion',['label'=>false,'placeholder'=>'Descripcion']); ?>
                <?= $this->Form->control('controller',['label'=>false,'placeholder'=>'Controller']); ?>
                <?= $this->Form->control('action',['label'=>false,'placeholder'=>'Action']); ?>
                <?= $this->Form->control('co_grupos._ids',['class'=>'form-control','label'=>['text'=>'Grupos']]) ?>
                <?= $this->Form->control('activo',['div'=>false,'label'=>['class'=>"checkbox checkbox-inline m-r-20",'text'=>'<i class="input-helper"></i>Activo'],'escape'=>false]); ?>

                <div class="row">
                    <label for="" class="col-md-12"></label>
                    <div class="col-md-9">
                        <div class="form-group form-button">
                            <?php echo $this->Form->button('Guardar',['id'=>'btnGuardar','class'=>'btn btn-primary waves-effect']) ?>
                        </div>
                    </div>
                </div>

                <?php echo $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


