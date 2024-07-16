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
                <?= $this->Html->link('<i class="zmdi zmdi-edit zmdi-hc-fw"></i>&nbsp;Editar', ['action' => 'edit',  $coMenu->id],['class'=>'list-group-item','escape'=>false]) ?>
                <?= $this->Form->postLink(__('<i class="zmdi zmdi-delete zmdi-hc-fw"></i>&nbsp;Eliminar'),['action' => 'delete',  $coMenu->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $coMenu->id),'escape'=>false,'class'=>'list-group-item'])?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h3><?= h($coMenu->name) ?></h3>
        <table class="table table-condensed">

        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($coMenu->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Destino') ?></th>
            <td><?= h($coMenu->destino) ?></td>
        </tr>
        <tr>
            <th><?= __('ID') ?></th>
            <td><?= $this->Number->format($coMenu->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Menu Id') ?></th>
            <td><?= $this->Number->format($coMenu->co_menu_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Posición') ?></th>
            <td><?= $this->Number->format($coMenu->posicion) ?></td>
        </tr>
        <tr>
            <th><?= __('Creado') ?></th>
            <td><?= h (date('Y-m-d H:i A', strtotime($coMenu->created))) ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= h (date('Y-m-d H:i A', strtotime($coMenu->modified))) ?></td>
        </tr>
        <tr>
            <th><?= __('Activo') ?></th>
            <td><?= $coMenu->activo ? __('<span class="label label-success">Si</span>') : __('<span class="label label-danger">No</span>'); ?></td>
        </tr>
    </table>
</div>
