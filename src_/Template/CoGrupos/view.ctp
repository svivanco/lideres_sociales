<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col-sm-3">
        <div class="bs-item z-depth-5">
            <div class="list-group">
                <a class="list-group-item active">Acciones</a>
                <?= $this->Html->link('<i class="zmdi zmdi-apps">&nbsp;</i>Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
                <?= $this->Html->link('<i class="zmdi zmdi-edit zmdi-hc-fw"></i>&nbsp;Editar', ['action' => 'edit',  $coGrupo->id],['class'=>'list-group-item','escape'=>false]) ?>
                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete zmdi-hc-fw"></i>&nbsp;Eliminar'),['action' => 'delete',  $coGrupo->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $coGrupo->id),'escape'=>false,'class'=>'list-group-item'])?>
            </div>
        </div>
    </div>
    <div class="col-md-9">

        <h3><?= h($coGrupo->name) ?></h3>
    <table>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($coGrupo->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Pagina Inicial') ?></th>
            <td><?= h($coGrupo->pagina_inicial) ?></td>
        </tr>
        <tr>
            <th><?= __('ID') ?></th>
            <td><?=$coGrupo->id ?></td>
        </tr>
        <tr>
            <th><?= __('Creado') ?></th>
            <td><?= h($coGrupo->created->format('d-m-Y h:i a')) ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= h($coGrupo->modified->format('d-m-Y h:i a')) ?></td>
        </tr>
        <tr>
            <th><?= __('Activo') ?></th>
            <td><?= $coGrupo->activo ? __('<span class="label label-success">Si</span>') : __('<span class="label label-danger">No</span>'); ?></td>
        </tr>
    </table>
</div>
