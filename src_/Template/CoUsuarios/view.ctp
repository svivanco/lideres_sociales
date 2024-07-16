
<div class="row">
    <div class="col-sm-3">
		 <div class="list-group">
			<a class="list-group-item active">Acciones</a>
			<?php echo $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i> Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
	        <?php echo $this->Form->postLink(
				__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),
				['action' => 'delete', $coUsuario->id],
				['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $coUsuario->id),'escape'=>false,'class'=>'list-group-item'])
			?>
		 </div>
    </div>
    
    <div class="col-sm-9">
        <div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n del Usuario</h2>
            </div>
            <div class="panel-body">
            	<h3><?= h($coUsuario->login) ?></h3>
				<table class="table table-condensed">
					<tr class="info">
						<th>Id</th>
						<th>Login</th>
						<th>Activo</th>
					</tr>
					<tr>
					    <td><?= $this->Number->format($coUsuario->id) ?></td>
					    <td><?= h($coUsuario->login) ?></td>
					    <td><?= $coUsuario->activo ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; ?></td>
					</tr>
					<tr>
						<th ><?= __('Ultimo Acceso') ?></th>
						<th><?= __('Fecha de Creaci&oacute;n') ?></th>
						<th><?= __('Ultima Modificaci&oacute;n') ?></th>
					</tr>
					<tr>
					    <td><?= h($coUsuario->ultimo_acceso) ?></td>
					    <td><?= h($coUsuario->created) ?></td>
					    <td><?= h($coUsuario->modified) ?></td>
					</tr>
					<tr>
						<th>Password</th>
						<td colspan="2"><?= h($coUsuario->password) ?></td>
					</tr>
					
				</table>

			<div class="related">
			    <h4><?= __('Grupos') ?></h4>
			    <?php if (!empty($coUsuario->co_grupos)): ?>
			    <table class="table table-bordered">
					<tr class="info">
			            <th><?= __('Id') ?></th>
			            <th><?= __('Nombre') ?></th>
			            <th><?= __('Pagina Inicial') ?></th>
			            <th><?= __('Activo') ?></th>
			            <th><?= __('Fecha de Creaci&oacute;n') ?></th>
			            <th><?= __('Acciones') ?></th>
			        </tr>
			        <?php foreach ($coUsuario->co_grupos as $coGrupos): ?>
			        <tr>
			            <td><?= h($coGrupos->id) ?></td>
			            <td><?= h($coGrupos->name) ?></td>
			            <td><?= h($coGrupos->pagina_inicial) ?></td>
			            <td><?= h($coGrupos->activo) ?></td>
			            <td><?= h($coGrupos->created) ?></td>
			            <td class="actions">
			                <?= $this->Html->link(__('Ver'), ['controller' => 'CoGrupos', 'action' => 'view', $coGrupos->id]) ?>
			                <?= $this->Html->link(__('Editar'), ['controller' => 'CoGrupos', 'action' => 'edit', $coGrupos->id]) ?>
			            </td>
			        </tr>
			        <?php endforeach; ?>
			    </table>
			    <?php endif; ?>
			</div>
			
        </div>
    </div>
            
</div>

