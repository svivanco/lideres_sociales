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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catMunicipio->id],['class'=>'list-group-item','escape'=>false]) ?>
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catMunicipio->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catMunicipio->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catMunicipio->name) ?></h3>
			    <table class="table table-condensed">
							<tr>
							<th scope="row"><?= __('Id') ?></th>
							<td><?= $this->Number->format($catMunicipio->id) ?></td>
							</tr>
																        <tr>
				            <th scope="row"><?= __('Nombre') ?></th>
				            <td><?= h($catMunicipio->name) ?></td>
				        </tr>

																				        <tr>
				            <th scope="row"><?= __('Fceha de Creación') ?></th>
				            <td><?= h($catMunicipio->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Fecha de Modificación') ?></th>
				            <td><?= h($catMunicipio->modified) ?></td>
				        </tr>
								</table>
				            </div>
        </div>
	</div>
</div>
