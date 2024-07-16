<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
	<div class="col-lg-3">
		<div class="list-group">
			<a class="list-group-item active">Acciones</a>
			<?= $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i>&nbsp;Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catColonia->id],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catColonia->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catColonia->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catColonia->name_completo) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($catColonia->id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Cat Estado Id') ?></th>
				            <td><?= h($catColonia->cat_estado_id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Cat Municipio Id') ?></th>
				            <td><?= h($catColonia->cat_municipio_id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Ciudad') ?></th>
				            <td><?= h($catColonia->ciudad) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Tipo Asentamiento') ?></th>
				            <td><?= h($catColonia->tipo_asentamiento) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Asentamiento') ?></th>
				            <td><?= h($catColonia->asentamiento) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Clave Oficina') ?></th>
				            <td><?= h($catColonia->clave_oficina) ?></td>
				        </tr>
																												        <tr>
				            <th scope="row"><?= __('Codigo Postal') ?></th>
				            <td><?= $this->Number->format($catColonia->codigo_postal) ?></td>
				        </tr>
																				    </table>
								            </div>
        </div>
	</div>
</div>
