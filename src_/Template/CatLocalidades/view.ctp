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
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', $catLocalidade->id],['class'=>'list-group-item','escape'=>false]) ?>
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catLocalidade->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catLocalidade->id),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catLocalidade->name) ?></h3>
			    <table class="table table-condensed">
								<tr>
								<th scope="row"><?= __('Id') ?></th>
								<td><?= $this->Number->format($catLocalidade->id) ?></td>
								</tr>
								<tr>
				            <th scope="row"><?= __('Municipio') ?></th>
				            <td><?= $catLocalidade->has('cat_municipio') ? $catLocalidade->cat_municipio->name : '' ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Clave') ?></th>
				            <td><?= h($catLocalidade->clave) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Nombre') ?></th>
				            <td><?= h($catLocalidade->name) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Latitud') ?></th>
				            <td><?= h($catLocalidade->latitud) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Longitud') ?></th>
				            <td><?= h($catLocalidade->longitud) ?></td>
				        </tr>
																        <tr>
				            <th scope="row"><?= __('Altitud') ?></th>
				            <td><?= h($catLocalidade->altitud) ?></td>
				        </tr>
									<tr>
				            <th scope="row"><?= __('Latitud') ?></th>
				            <td><?= $this->Number->format($catLocalidade->lat) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Longitud') ?></th>
				            <td><?= $this->Number->format($catLocalidade->lng) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Fecha de Creación') ?></th>
				            <td><?= h($catLocalidade->created) ?></td>
				        </tr>
								        <tr>
				            <th scope="row"><?= __('Fecha de Modificación') ?></th>
				            <td><?= h($catLocalidade->modified) ?></td>
				        </tr>
																				        <tr>
				            <th scope="row"><?= __('Activo') ?></th>
				            <td><?= $catLocalidade->activo ? '<span class="badge badge-success">SI</span>' : '<span class="badge badge-danger">NO</span>'; ?></td>
				        </tr>
												    </table>
				            </div>
        </div>
	</div>
</div>
