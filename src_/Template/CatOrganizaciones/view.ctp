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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catOrganizacione->id],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catOrganizacione->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catOrganizacione->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catOrganizacione->name) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($catOrganizacione->id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Name') ?></th>
				            <td><?= h($catOrganizacione->name) ?></td>
				        </tr>
																																        <tr>
				            <th scope="row"><?= __('Created') ?></th>
				            <td><?= h($catOrganizacione->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Modified') ?></th>
				            <td><?= h($catOrganizacione->modified) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Activo') ?></th>
				            <td><?= $catOrganizacione->activo ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; ?></td>
				        </tr>
												    </table>
												    <div class="related">
				        <h4><?= __('Related Cat Personas') ?></h4>
				        <?php if (!empty($catOrganizacione->cat_personas)): ?>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
								                <th scope="col"><?= __('Id') ?></th>
								                <th scope="col"><?= __('Cat Persona Pertenece Id') ?></th>
								                <th scope="col"><?= __('Cat Municipio Id') ?></th>
								                <th scope="col"><?= __('Cat Localidade Id') ?></th>
								                <th scope="col"><?= __('Cat Seccione Id') ?></th>
								                <th scope="col"><?= __('Cat Cargo Id') ?></th>
								                <th scope="col"><?= __('Nombre') ?></th>
								                <th scope="col"><?= __('Paterno') ?></th>
								                <th scope="col"><?= __('Materno') ?></th>
								                <th scope="col"><?= __('Fecha Nacimiento') ?></th>
								                <th scope="col"><?= __('Cat Colonia Id') ?></th>
								                <th scope="col"><?= __('Calle') ?></th>
								                <th scope="col"><?= __('Numero Interior') ?></th>
								                <th scope="col"><?= __('Numero Exterior') ?></th>
								                <th scope="col"><?= __('Cruzamientos') ?></th>
								                <th scope="col"><?= __('Sexo') ?></th>
								                <th scope="col"><?= __('Telefono') ?></th>
								                <th scope="col"><?= __('Email') ?></th>
								                <th scope="col"><?= __('Created') ?></th>
								                <th scope="col"><?= __('Modified') ?></th>
								                <th scope="col"><?= __('Cat Organizacione Id') ?></th>
								                <th scope="col"><?= __('Foto') ?></th>
								                <th scope="col"><?= __('Ine') ?></th>
								                <th scope="col" class="actions"><?= __('Actions') ?></th>
				            </tr>
				            <?php foreach ($catOrganizacione->cat_personas as $catPersonas): ?>
				            <tr>
				                <td><?= h($catPersonas->id) ?></td>
				                <td><?= h($catPersonas->cat_persona_pertenece_id) ?></td>
				                <td><?= h($catPersonas->cat_municipio_id) ?></td>
				                <td><?= h($catPersonas->cat_localidade_id) ?></td>
				                <td><?= h($catPersonas->cat_seccione_id) ?></td>
				                <td><?= h($catPersonas->cat_cargo_id) ?></td>
				                <td><?= h($catPersonas->nombre) ?></td>
				                <td><?= h($catPersonas->paterno) ?></td>
				                <td><?= h($catPersonas->materno) ?></td>
				                <td><?= h($catPersonas->fecha_nacimiento) ?></td>
				                <td><?= h($catPersonas->cat_colonia_id) ?></td>
				                <td><?= h($catPersonas->calle) ?></td>
				                <td><?= h($catPersonas->numero_interior) ?></td>
				                <td><?= h($catPersonas->numero_exterior) ?></td>
				                <td><?= h($catPersonas->cruzamientos) ?></td>
				                <td><?= h($catPersonas->sexo) ?></td>
				                <td><?= h($catPersonas->telefono) ?></td>
				                <td><?= h($catPersonas->email) ?></td>
				                <td><?= h($catPersonas->created) ?></td>
				                <td><?= h($catPersonas->modified) ?></td>
				                <td><?= h($catPersonas->cat_organizacione_id) ?></td>
				                <td><?= h($catPersonas->foto) ?></td>
				                <td><?= h($catPersonas->ine) ?></td>
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
