
<div class="row">
    <div class="col-sm-3">
	 <div class="bs-item z-depth-5">
		 <div class="list-group">
			<a class="list-group-item active">Acciones</a>
			<?php echo $this->Html->link('<i class="zmdi zmdi-apps">&nbsp;</i>Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
	        <?php echo $this->Form->postLink(
				__('<i class="zmdi zmdi-delete zmdi-hc-fw"></i>&nbsp;Eliminar'),
				['action' => 'delete', $coPermiso->id],
				['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $coPermiso->id),'escape'=>false,'class'=>'list-group-item'])
			?>
		 </div>
	 </div>
    </div>

        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h2>Informaci&oacute;n del Permiso</h2>
                </div>
                <div class="card-body card-padding">
                    <h3><?= h($coPermiso->name) ?></h3>
                    <table class="table table-condensed">
                    	<tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($coPermiso->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($coPermiso->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Controller') ?></th>
                            <td><?= h($coPermiso->controller) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Action') ?></th>
                            <td><?= h($coPermiso->action) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Fecha de Creaci&oacute;n') ?></th>
                            <td><?= h($coPermiso->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Ultima Modificaci&oacute;n') ?></th>
                            <td><?= h($coPermiso->modified) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Activo') ?></th>
                            <td><?= $coPermiso->activo ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'  ?></td>
                        </tr>
                    </table>
                    <div class="row">
                        <h4><?= __('Descripcion') ?></h4>
                        <?= $this->Text->autoParagraph(h($coPermiso->descripcion)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


