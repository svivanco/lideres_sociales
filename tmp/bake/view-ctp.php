<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<CakePHPBakeOpenTagphp
/**
  * @var \<?= $namespace ?>\View\AppView $this
  */
CakePHPBakeCloseTag>
<?php
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
?>
<div class="row">
	<div class="col-lg-3">
		<div class="list-group">
			<a class="list-group-item active">Acciones</a>
			<CakePHPBakeOpenTag= $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i>&nbsp;Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) CakePHPBakeCloseTag>
			<CakePHPBakeOpenTag= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', <?= $pk ?>],['class'=>'list-group-item','escape'=>false]) CakePHPBakeCloseTag>				
	        <CakePHPBakeOpenTag= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', <?= $pk ?>],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', <?= $pk ?>),'escape'=>false,'class'=>'list-group-item'])CakePHPBakeCloseTag>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $displayField ?>) CakePHPBakeCloseTag></h3>
			    <table class="table table-condensed">
				<?php if ($groupedFields['string']) : ?>
				<?php foreach ($groupedFields['string'] as $field) : ?>
				<?php if (isset($associationFields[$field])) :
				            $details = $associationFields[$field];
				?>
		<tr>
				            <th scope="row"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($details['property']) ?>') CakePHPBakeCloseTag></th>
				            <td><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></td>
				        </tr>
				<?php else : ?>
				        <tr>
				            <th scope="row"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></th>
				            <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
				        </tr>
				<?php endif; ?>
				<?php endforeach; ?>
				<?php endif; ?>
				<?php if ($associations['HasOne']) : ?>
<?php foreach ($associations['HasOne'] as $alias => $details) : ?>
				        <tr>
				            <th scope="row"><CakePHPBakeOpenTag= __('<?= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) ?>') CakePHPBakeCloseTag></th>
				            <td><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></td>
				        </tr>
<?php endforeach; ?>
				<?php endif; ?>
				<?php if ($groupedFields['number']) : ?>
				<?php foreach ($groupedFields['number'] as $field) : ?>
				        <tr>
				            <th scope="row"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></th>
				            <td><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
				        </tr>
				<?php endforeach; ?>
				<?php endif; ?>
				<?php if ($groupedFields['date']) : ?>
				<?php foreach ($groupedFields['date'] as $field) : ?>
				        <tr>
				            <th scope="row"><?= "<?= __('" . Inflector::humanize($field) . "') ?>" ?></th>
				            <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
				        </tr>
				<?php endforeach; ?>
				<?php endif; ?>
				<?php if ($groupedFields['boolean']) : ?>
				<?php foreach ($groupedFields['boolean'] as $field) : ?>
				        <tr>
				            <th scope="row"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></th>
				            <td><CakePHPBakeOpenTag= $<?= $singularVar ?>-><?= $field ?> ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; CakePHPBakeCloseTag></td>
				        </tr>
				<?php endforeach; ?>
				<?php endif; ?>
				    </table>
				<?php if ($groupedFields['text']) : ?>
				<?php foreach ($groupedFields['text'] as $field) : ?>
				    <div class="row">
				        <h4><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h4>
				        <CakePHPBakeOpenTag= $this->Text->autoParagraph(h($<?= $singularVar ?>-><?= $field ?>)); CakePHPBakeCloseTag>
				    </div>
				<?php endforeach; ?>
				<?php endif; ?>
				<?php
				$relations = $associations['HasMany'] + $associations['BelongsToMany'];
				foreach ($relations as $alias => $details):
				    $otherSingularVar = Inflector::variable($alias);
				    $otherPluralHumanName = Inflector::humanize(Inflector::underscore($details['controller']));
				    ?>
				    <div class="related">
				        <h4><CakePHPBakeOpenTag= __('Related <?= $otherPluralHumanName ?>') CakePHPBakeCloseTag></h4>
				        <CakePHPBakeOpenTagphp if (!empty($<?= $singularVar ?>-><?= $details['property'] ?>)): CakePHPBakeCloseTag>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
				<?php foreach ($details['fields'] as $field): ?>
				                <th scope="col"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></th>
				<?php endforeach; ?>
				                <th scope="col" class="actions"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></th>
				            </tr>
				            <CakePHPBakeOpenTagphp foreach ($<?= $singularVar ?>-><?= $details['property'] ?> as $<?= $otherSingularVar ?>): CakePHPBakeCloseTag>
				            <tr>
<?php foreach ($details['fields'] as $field): ?>
				                <td><CakePHPBakeOpenTag= h($<?= $otherSingularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php endforeach; ?>
<?php $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; ?>
				                <td class="actions">
				                    <CakePHPBakeOpenTag= $this->Html->link(__('View'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', <?= $otherPk ?>]) CakePHPBakeCloseTag>
				                    <CakePHPBakeOpenTag= $this->Html->link(__('Edit'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'edit', <?= $otherPk ?>]) CakePHPBakeCloseTag>
				                    <CakePHPBakeOpenTag= $this->Form->postLink(__('Delete'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'delete', <?= $otherPk ?>], ['confirm' => __('Are you sure you want to delete # {0}?', <?= $otherPk ?>)]) CakePHPBakeCloseTag>
				                </td>
				            </tr>
				            <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
				        </table>
				        <CakePHPBakeOpenTagphp endif; CakePHPBakeCloseTag>
				    </div>
				<?php endforeach; ?>
            </div>
        </div>
	</div>
</div>
