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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catTema->id],['class'=>'list-group-item','escape'=>false]) ?>
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catTema->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catTema->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catTema->name) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($catTema->id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Nombre') ?></th>
				            <td><?= h($catTema->name) ?></td>
				        </tr>
																																        <tr>
				            <th scope="row"><?= __('Creado') ?></th>
				            <td><?= h($catTema->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Modificado') ?></th>
				            <td><?= h($catTema->modified) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Activo') ?></th>
				            <td><?= $catTema->activo ? '<span class="badge badge-success">SI</span>' : '<span class="badge badge-danger">NO</span>' ?></td>
				        </tr>
												    </table>
				            </div>
        </div>
	</div>
</div>
