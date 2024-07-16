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
//	echo $this->Html->css('select2/select2.minfd53',['block'=>true]);
//  echo $this->Html->script('select2/select2.full.minfd53',['block'=>true]);
?>
<?php
$this->loadHelper('Form', ['templates' => 'app_form']);
?>
<div class="row">
	<div class="col-lg-3">
			<div class="list-group">
				<a class="list-group-item active">Acciones</a>
				<?= $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i>&nbsp;Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
				            		<?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catFolio->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catFolio->id),'escape'=>false,'class'=>'list-group-item'])?>
        					</div>
	</div>

	<div class="col-lg-9">
    	<div class="panel panel-primary panel-line">
	        <div class="panel-heading">
	            <h2 class="panel-title"> <?= __('Editar Folio') ?></h2>
	        </div>
	        <div class="panel-body">
        		<?= $this->Form->create($catFolio,['role'=>'form','onsubmit'=>'return checkSubmit();']) ?>

				<?php
            		echo $this->Form->control('folio', ['label'=>[]]);
            		echo $this->Form->control('name', ['label'=>['text'=>'Nombre']]);
	        ?>
       			<?= $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar')) ?>

        		<?= $this->Form->end() ?>
    		</div>
	    </div>
	</div>
</div>

<script type="text/javascript">
//   	$("#Example-id").select2	({placeholder: "SELECCIONAR",allowClear: true});
</script>
