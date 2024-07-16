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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catCargo->id],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catCargo->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catCargo->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catCargo->name) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($catCargo->id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Name') ?></th>
				            <td><?= h($catCargo->name) ?></td>
				        </tr>
																																        <tr>
				            <th scope="row"><?= __('Created') ?></th>
				            <td><?= h($catCargo->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Modified') ?></th>
				            <td><?= h($catCargo->modified) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Activo') ?></th>
				            <td><?= $catCargo->activo ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; ?></td>
				        </tr>
												    </table>
												    <div class="related">
				        <h4><?= __('Related Cat Personas') ?></h4>
				        <?php if (!empty($catCargo->cat_personas)): ?>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
								                <th scope="col"><?= __('Id') ?></th>
								                <th scope="col"><?= __('Cat Municipio Id') ?></th>
								                <th scope="col"><?= __('Cat Localidade Id') ?></th>
								                <th scope="col"><?= __('Cat Rangos Persona Id') ?></th>
								                <th scope="col"><?= __('Cat Zonas Influencia Id') ?></th>
								                <th scope="col"><?= __('Cat Nivel Academico Id') ?></th>
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
								                <th scope="col"><?= __('Su Lider') ?></th>
								                <th scope="col"><?= __('Trabajo Sociales') ?></th>
								                <th scope="col"><?= __('Afinidad Politica') ?></th>
								                <th scope="col"><?= __('Colonia Influencia') ?></th>
								                <th scope="col"><?= __('Created') ?></th>
								                <th scope="col"><?= __('Modified') ?></th>
								                <th scope="col" class="actions"><?= __('Actions') ?></th>
				            </tr>
				            <?php foreach ($catCargo->cat_personas as $catPersonas): ?>
				            <tr>
				                <td><?= h($catPersonas->id) ?></td>
				                <td><?= h($catPersonas->cat_municipio_id) ?></td>
				                <td><?= h($catPersonas->cat_localidade_id) ?></td>
				                <td><?= h($catPersonas->cat_rangos_persona_id) ?></td>
				                <td><?= h($catPersonas->cat_zonas_influencia_id) ?></td>
				                <td><?= h($catPersonas->cat_nivel_academico_id) ?></td>
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
				                <td><?= h($catPersonas->su_lider) ?></td>
				                <td><?= h($catPersonas->trabajo_sociales) ?></td>
				                <td><?= h($catPersonas->afinidad_politica) ?></td>
				                <td><?= h($catPersonas->colonia_influencia) ?></td>
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
