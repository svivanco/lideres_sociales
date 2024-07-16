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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catDistritosFederale->id],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catDistritosFederale->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catDistritosFederale->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catDistritosFederale->name) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($catDistritosFederale->id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Name') ?></th>
				            <td><?= h($catDistritosFederale->name) ?></td>
				        </tr>
																																        <tr>
				            <th scope="row"><?= __('Created') ?></th>
				            <td><?= h($catDistritosFederale->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Modified') ?></th>
				            <td><?= h($catDistritosFederale->modified) ?></td>
				        </tr>
																    </table>
												    <div class="related">
				        <h4><?= __('Related Cat Secciones') ?></h4>
				        <?php if (!empty($catDistritosFederale->cat_secciones)): ?>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
								                <th scope="col"><?= __('Id') ?></th>
								                <th scope="col"><?= __('Cat Municipio Id') ?></th>
								                <th scope="col"><?= __('Cat Distritos Federale Id') ?></th>
								                <th scope="col"><?= __('Cat Distrito Id') ?></th>
								                <th scope="col"><?= __('Name') ?></th>
								                <th scope="col"><?= __('Activo') ?></th>
								                <th scope="col"><?= __('Created') ?></th>
								                <th scope="col"><?= __('Modified') ?></th>
								                <th scope="col" class="actions"><?= __('Actions') ?></th>
				            </tr>
				            <?php foreach ($catDistritosFederale->cat_secciones as $catSecciones): ?>
				            <tr>
				                <td><?= h($catSecciones->id) ?></td>
				                <td><?= h($catSecciones->cat_municipio_id) ?></td>
				                <td><?= h($catSecciones->cat_distritos_federale_id) ?></td>
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
								    <div class="related">
				        <h4><?= __('Related Cat Municipios') ?></h4>
				        <?php if (!empty($catDistritosFederale->cat_municipios)): ?>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
								                <th scope="col"><?= __('Id') ?></th>
								                <th scope="col"><?= __('Cat Estado Id') ?></th>
								                <th scope="col"><?= __('Id Municipio Ine') ?></th>
								                <th scope="col"><?= __('Name') ?></th>
								                <th scope="col"><?= __('Clave') ?></th>
								                <th scope="col"><?= __('Activo') ?></th>
								                <th scope="col"><?= __('Meta') ?></th>
								                <th scope="col"><?= __('Created') ?></th>
								                <th scope="col"><?= __('Modified') ?></th>
								                <th scope="col" class="actions"><?= __('Actions') ?></th>
				            </tr>
				            <?php foreach ($catDistritosFederale->cat_municipios as $catMunicipios): ?>
				            <tr>
				                <td><?= h($catMunicipios->id) ?></td>
				                <td><?= h($catMunicipios->cat_estado_id) ?></td>
				                <td><?= h($catMunicipios->id_municipio_ine) ?></td>
				                <td><?= h($catMunicipios->name) ?></td>
				                <td><?= h($catMunicipios->clave) ?></td>
				                <td><?= h($catMunicipios->activo) ?></td>
				                <td><?= h($catMunicipios->meta) ?></td>
				                <td><?= h($catMunicipios->created) ?></td>
				                <td><?= h($catMunicipios->modified) ?></td>
				                <td class="actions">
				                    <?= $this->Html->link(__('View'), ['controller' => 'CatMunicipios', 'action' => 'view', $catMunicipios->id]) ?>
				                    <?= $this->Html->link(__('Edit'), ['controller' => 'CatMunicipios', 'action' => 'edit', $catMunicipios->id]) ?>
				                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CatMunicipios', 'action' => 'delete', $catMunicipios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catMunicipios->id)]) ?>
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
