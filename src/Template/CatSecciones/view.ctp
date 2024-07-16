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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catSeccione->id],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catSeccione->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catSeccione->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catSeccione->name) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($catSeccione->id) ?></td>
				        </tr>
														<tr>
				            <th scope="row"><?= __('Cat Municipio') ?></th>
				            <td><?= $catSeccione->has('cat_municipio') ? $this->Html->link($catSeccione->cat_municipio->name, ['controller' => 'CatMunicipios', 'action' => 'view', $catSeccione->cat_municipio->id]) : '' ?></td>
				        </tr>
														<tr>
				            <th scope="row"><?= __('Cat Distrito') ?></th>
				            <td><?= $catSeccione->has('cat_distrito') ? $this->Html->link($catSeccione->cat_distrito->name, ['controller' => 'CatDistritos', 'action' => 'view', $catSeccione->cat_distrito->id]) : '' ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Name') ?></th>
				            <td><?= h($catSeccione->name) ?></td>
				        </tr>
																																        <tr>
				            <th scope="row"><?= __('Created') ?></th>
				            <td><?= h($catSeccione->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Modified') ?></th>
				            <td><?= h($catSeccione->modified) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Activo') ?></th>
				            <td><?= $catSeccione->activo ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; ?></td>
				        </tr>
												    </table>
												    <div class="related">
				        <h4><?= __('Related Cat Personas') ?></h4>
				        <?php if (!empty($catSeccione->cat_personas)): ?>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
								                <th scope="col"><?= __('Id') ?></th>
								                <th scope="col"><?= __('Cat Municipio Id') ?></th>
								                <th scope="col"><?= __('Cat Localidade Id') ?></th>
								                <th scope="col"><?= __('Cat Nivel Academico Id') ?></th>
								                <th scope="col"><?= __('Cat Colonias Id') ?></th>
								                <th scope="col"><?= __('Cat Seccione Id') ?></th>
								                <th scope="col"><?= __('Cat Cargo Id') ?></th>
								                <th scope="col"><?= __('Nombre') ?></th>
								                <th scope="col"><?= __('Paterno') ?></th>
								                <th scope="col"><?= __('Materno') ?></th>
								                <th scope="col"><?= __('Edad') ?></th>
								                <th scope="col"><?= __('Sexo') ?></th>
								                <th scope="col"><?= __('Telefono') ?></th>
								                <th scope="col"><?= __('Email') ?></th>
								                <th scope="col"><?= __('Red Social') ?></th>
								                <th scope="col"><?= __('Tiempo Residencia') ?></th>
								                <th scope="col"><?= __('Created') ?></th>
								                <th scope="col"><?= __('Modified') ?></th>
								                <th scope="col" class="actions"><?= __('Actions') ?></th>
				            </tr>
				            <?php foreach ($catSeccione->cat_personas as $catPersonas): ?>
				            <tr>
				                <td><?= h($catPersonas->id) ?></td>
				                <td><?= h($catPersonas->cat_municipio_id) ?></td>
				                <td><?= h($catPersonas->cat_localidade_id) ?></td>
				                <td><?= h($catPersonas->cat_nivel_academico_id) ?></td>
				                <td><?= h($catPersonas->cat_colonias_id) ?></td>
				                <td><?= h($catPersonas->cat_seccione_id) ?></td>
				                <td><?= h($catPersonas->cat_cargo_id) ?></td>
				                <td><?= h($catPersonas->nombre) ?></td>
				                <td><?= h($catPersonas->paterno) ?></td>
				                <td><?= h($catPersonas->materno) ?></td>
				                <td><?= h($catPersonas->edad) ?></td>
				                <td><?= h($catPersonas->sexo) ?></td>
				                <td><?= h($catPersonas->telefono) ?></td>
				                <td><?= h($catPersonas->email) ?></td>
				                <td><?= h($catPersonas->red_social) ?></td>
				                <td><?= h($catPersonas->tiempo_residencia) ?></td>
				                <td><?= h($catPersonas->created) ?></td>
				                <td><?= h($catPersonas->modified) ?></td>
				                <td class="actions">
				                    <?= $this->Html->link(__('View'), ['controller' => 'CatPersonas', 'action' => 'view', $catPersonas->id]) ?>
				                    <?= $this->Html->link(__('Edit'), ['controller' => 'CatPersonas', 'action' => 'edit', $catPersonas->id]) ?>
				                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CatPersonas', 'action' => 'delete', $catPersonas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catPersonas->id)]) ?>
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
