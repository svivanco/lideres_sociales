<?php
	echo $this->Html->css('select2/select2.minfd53',['block'=>true]);
  	echo $this->Html->script('select2/select2.full.minfd53',['block'=>true]);
?>
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
<?php 
//	echo $this->Html->css('select2/select2.minfd53',['block'=>true]);
//  	echo $this->Html->script('select2/select2.full.minfd53',['block'=>true]);
?>
<div class="row">
    <div class="col-lg-3">
			<div class="list-group">
				<a class="list-group-item active">Acciones</a>
				<?php echo $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i> Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
	        </div>
    </div>
    
	<div class="col-lg-9">
		<div class="panel panel-primary panel-line">
		    <div class="panel-heading">
		        <h3 class="panel-title">Actualizar Usuario</h3>
		    </div>
		    <div class="panel-body">
		    	
		        <?= $this->Form->create($coUsuario,['role'=>'form','onsubmit'=>'return checkSubmit();']) ?>
		        
			    <?php
			      echo $this->Form->control('nombre', ['label'=>['text'=>'Nombre']]);
			      echo $this->Form->control('paterno', ['label'=>['text'=>'Apellido Paterno']]);
			      echo $this->Form->control('materno', ['label'=>['text'=>'Apellido Materno']]);
			      echo $this->Form->control('login', ['label'=>['text'=>'Nombre de Usuario']]);
			    ?>
			    <?php
			      echo $this->Form->control('password', ['label'=>['text'=>'Clave de Acceso']]);
			    ?>

			    <?php
			      echo $this->Form->input('co_grupos._ids', ['options' => $coGrupos,'label'=>['text'=>'Grupo(s)']]);
			    ?>
                <?php echo $this->Form->control('activo',['div'=>false,'label'=>['text'=>' Activo'],'escape'=>false]); ?>

		        <div class="row">
		            <label for="" class="col-lg-12"></label>
		            <div class="col-lg-9">
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


<script type="text/javascript">

   	$("#co-grupos-ids").select2	({placeholder: "EMPLEADO SOLICITANTE",allowClear: true});	
	
</script>