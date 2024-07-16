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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catDistrito->id],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catDistrito->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catDistrito->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catDistrito->name) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($catDistrito->id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Name') ?></th>
				            <td><?= h($catDistrito->name) ?></td>
				        </tr>
																												        <tr>
				            <th scope="row"><?= __('Numero') ?></th>
				            <td><?= $this->Number->format($catDistrito->numero) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Created') ?></th>
				            <td><?= h($catDistrito->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Modified') ?></th>
				            <td><?= h($catDistrito->modified) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Activo') ?></th>
				            <td><?= $catDistrito->activo ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; ?></td>
				        </tr>
												    </table>
												    <div class="related">
				        <h4><?= __('Related Cat Secciones') ?></h4>
				        <?php if (!empty($catDistrito->cat_secciones)): ?>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
								                <th scope="col"><?= __('Id') ?></th>
								                <th scope="col"><?= __('Cat Municipio Id') ?></th>
								                <th scope="col"><?= __('Cat Distrito Id') ?></th>
								                <th scope="col"><?= __('Name') ?></th>
								                <th scope="col"><?= __('Activo') ?></th>
								                <th scope="col"><?= __('Created') ?></th>
								                <th scope="col"><?= __('Modified') ?></th>
								                <th scope="col" class="actions"><?= __('Actions') ?></th>
				            </tr>
				            <?php foreach ($catDistrito->cat_secciones as $catSecciones): ?>
				            <tr>
				                <td><?= h($catSecciones->id) ?></td>
				                <td><?= h($catSecciones->cat_municipio_id) ?></td>
				                <td><?= h($catSecciones->cat_distrito_id) ?></td>
				                <td><?= h($catSecciones->name) ?></td>
				                <td><?= h($catSecciones->activo) ?></td>
				                <td><?= h($catSecciones->created) ?></td>
				                <td><?= h($catSecciones->modified) ?></td>
				                <td class="actions">
				                    <?= $this->Html->link(__('View'), ['controller' => 'CatSecciones', 'action' => 'view', $catSecciones->id]) ?>
				                    <?= $this->Html->link(__('Edit'), ['controller' => 'CatSecciones', 'action' => 'edit', $catSecciones->id]) ?>
				                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CatSecciones', 'action' => 'delete', $catSecciones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catSecciones->id)]) ?>
				                </td>
				            </tr>
				            <?php endforeach; ?>
				        </table>
				        <?php endif; ?>
				    </div>
				            </div>
        </div>
	</div>
</div>
