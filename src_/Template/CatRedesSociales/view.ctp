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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catRedesSociale->id],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catRedesSociale->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catRedesSociale->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catRedesSociale->name) ?></h3>
			    <table class="table table-condensed">
																        <tr>
				            <th scope="row"><?= __('Id') ?></th>
				            <td><?= h($catRedesSociale->id) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Name') ?></th>
				            <td><?= h($catRedesSociale->name) ?></td>
				        </tr>
																																        <tr>
				            <th scope="row"><?= __('Created') ?></th>
				            <td><?= h($catRedesSociale->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Modified') ?></th>
				            <td><?= h($catRedesSociale->modified) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Activo') ?></th>
				            <td><?= $catRedesSociale->activo ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; ?></td>
				        </tr>
												    </table>
												    <div class="related">
				        <h4><?= __('Related Ope Personas Redes Sociales') ?></h4>
				        <?php if (!empty($catRedesSociale->ope_personas_redes_sociales)): ?>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
								                <th scope="col"><?= __('Id') ?></th>
								                <th scope="col"><?= __('Cat Persona Id') ?></th>
								                <th scope="col"><?= __('Cat Redes Sociale Id') ?></th>
								                <th scope="col"><?= __('Enlace') ?></th>
								                <th scope="col"><?= __('Activo') ?></th>
								                <th scope="col"><?= __('Created') ?></th>
								                <th scope="col"><?= __('Modified') ?></th>
								                <th scope="col" class="actions"><?= __('Actions') ?></th>
				            </tr>
				            <?php foreach ($catRedesSociale->ope_personas_redes_sociales as $opePersonasRedesSociales): ?>
				            <tr>
				                <td><?= h($opePersonasRedesSociales->id) ?></td>
				                <td><?= h($opePersonasRedesSociales->cat_persona_id) ?></td>
				                <td><?= h($opePersonasRedesSociales->cat_redes_sociale_id) ?></td>
				                <td><?= h($opePersonasRedesSociales->enlace) ?></td>
				                <td><?= h($opePersonasRedesSociales->activo) ?></td>
				                <td><?= h($opePersonasRedesSociales->created) ?></td>
				                <td><?= h($opePersonasRedesSociales->modified) ?></td>
				                <td class="actions">
				                    <?= $this->Html->link(__('View'), ['controller' => 'OpePersonasRedesSociales', 'action' => 'view', $opePersonasRedesSociales->id]) ?>
				                    <?= $this->Html->link(__('Edit'), ['controller' => 'OpePersonasRedesSociales', 'action' => 'edit', $opePersonasRedesSociales->id]) ?>
				                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OpePersonasRedesSociales', 'action' => 'delete', $opePersonasRedesSociales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $opePersonasRedesSociales->id)]) ?>
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
