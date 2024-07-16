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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $opePersonasRedesSociale->id],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $opePersonasRedesSociale->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $opePersonasRedesSociale->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($opePersonasRedesSociale->id) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($opePersonasRedesSociale->id) ?></td>
				        </tr>
														<tr>
				            <th scope="row"><?= __('Cat Persona') ?></th>
				            <td><?= $opePersonasRedesSociale->has('cat_persona') ? $this->Html->link($opePersonasRedesSociale->cat_persona->nombre_completo, ['controller' => 'CatPersonas', 'action' => 'view', $opePersonasRedesSociale->cat_persona->id]) : '' ?></td>
				        </tr>
														<tr>
				            <th scope="row"><?= __('Cat Redes Sociale') ?></th>
				            <td><?= $opePersonasRedesSociale->has('cat_redes_sociale') ? $this->Html->link($opePersonasRedesSociale->cat_redes_sociale->name, ['controller' => 'CatRedesSociales', 'action' => 'view', $opePersonasRedesSociale->cat_redes_sociale->id]) : '' ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Enlace') ?></th>
				            <td><?= h($opePersonasRedesSociale->enlace) ?></td>
				        </tr>
																																        <tr>
				            <th scope="row"><?= __('Created') ?></th>
				            <td><?= h($opePersonasRedesSociale->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Modified') ?></th>
				            <td><?= h($opePersonasRedesSociale->modified) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Activo') ?></th>
				            <td><?= $opePersonasRedesSociale->activo ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; ?></td>
				        </tr>
												    </table>
								            </div>
        </div>
	</div>
</div>
