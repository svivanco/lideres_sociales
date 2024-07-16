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
                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete zmdi-hc-fw"></i>&nbsp;Eliminar'),['action' => 'delete', $coMenu->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $coMenu->id),'escape'=>false,'class'=>'list-group-item'])?>

            </div>
        </div>
    </div>

    <div class="col-sm-9">
        <div class="card">
            <div class="card-header">
                <h2> <?= __('Actualizar Menu') ?></h2>
            </div>
            <div class="card-body card-padding">
				<?php echo $this->Form->create($coMenu,['role'=>'form','class'=>'form']) ?>

				<?php
				$activo = array(1=>'ACTIVO');
				echo $this->Form->control('activo', ['empty'=>'DESACTIVO','options' => $activo,'class'=>'form-control','label'=>['class'=>'control-label','text'=>'Activar Menu'],'div'=>['class'=>'form-group']]);
				?>
		        <?php
		            echo $this->Form->input('co_menu_id', ['label'=>['text'=>'Menu']]);
		            echo $this->Form->input('name', ['label'=>['text'=>'Nombre']]);
		            echo $this->Form->input('destino', ['label'=>['text'=>'Destino']]);
		            echo $this->Form->input('icon', ['label'=>['text'=>'Icon']]);
		            echo $this->Form->input('posicion', ['label'=>['text'=>'Posición']]);
		            //echo $this->Form->input('activo');
								echo $this->Form->input('co_grupos._ids', ['size'=>10,'options' => $coGrupos,'class'=>'form-control','label'=>['class'=>'control-label','text'=>'Grupos'],'div'=>['class'=>'form-group']]);
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