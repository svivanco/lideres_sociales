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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catFolio->id],['class'=>'list-group-item','escape'=>false]) ?>
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catFolio->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catFolio->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catFolio->name) ?></h3>
			    <table class="table table-condensed">
						<tr>
							<th scope="row"><?= __('Id') ?></th>
							<td><?= $this->Number->format($catFolio->id) ?></td>
					</tr>
								        <tr>
				            <th scope="row"><?= __('Folio') ?></th>
				            <td><?= $this->Number->format($catFolio->folio) ?></td>
				        </tr>
								<tr>
							<th scope="row"><?= __('Nombre') ?></th>
							<td><?= h($catFolio->name) ?></td>
							</tr>
																				    </table>
								            </div>
        </div>
	</div>
</div>
