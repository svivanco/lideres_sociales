<%
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
%>
<?php
/**
  * @var \<%= $namespace %>\View\AppView $this
  */
?>
<%
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
%>
<div class="row">
	<div class="col-lg-3">
		<div class="list-group">
			<a class="list-group-item active">Acciones</a>
			<?= $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i>&nbsp;Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
			<?= $this->Html->link('<i class="icon md-eye">&nbsp;</i>&nbsp;Editar', ['action' => 'edit', <%= $pk %>],['class'=>'list-group-item','escape'=>false]) ?>				
	        <?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', <%= $pk %>],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', <%= $pk %>),'escape'=>false,'class'=>'list-group-item'])?>
	    </div>	
	</div>

	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h3>
			    <table class="table table-condensed">
				<% if ($groupedFields['string']) : %>
				<% foreach ($groupedFields['string'] as $field) : %>
				<% if (isset($associationFields[$field])) :
				            $details = $associationFields[$field];
				%>
		<tr>
				            <th scope="row"><?= __('<%= Inflector::humanize($details['property']) %>') ?></th>
				            <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
				        </tr>
				<% else : %>
				        <tr>
				            <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
				            <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
				        </tr>
				<% endif; %>
				<% endforeach; %>
				<% endif; %>
				<% if ($associations['HasOne']) : %>
				    <%- foreach ($associations['HasOne'] as $alias => $details) : %>
				        <tr>
				            <th scope="row"><?= __('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>') ?></th>
				            <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
				        </tr>
				    <%- endforeach; %>
				<% endif; %>
				<% if ($groupedFields['number']) : %>
				<% foreach ($groupedFields['number'] as $field) : %>
				        <tr>
				            <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
				            <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
				        </tr>
				<% endforeach; %>
				<% endif; %>
				<% if ($groupedFields['date']) : %>
				<% foreach ($groupedFields['date'] as $field) : %>
				        <tr>
				            <th scope="row"><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></th>
				            <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
				        </tr>
				<% endforeach; %>
				<% endif; %>
				<% if ($groupedFields['boolean']) : %>
				<% foreach ($groupedFields['boolean'] as $field) : %>
				        <tr>
				            <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
				            <td><?= $<%= $singularVar %>-><%= $field %> ? '<span class="label label-success">SI</span>' : '<span class="label label-danger">NO</span>'; ?></td>
				        </tr>
				<% endforeach; %>
				<% endif; %>
				    </table>
				<% if ($groupedFields['text']) : %>
				<% foreach ($groupedFields['text'] as $field) : %>
				    <div class="row">
				        <h4><?= __('<%= Inflector::humanize($field) %>') ?></h4>
				        <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?>
				    </div>
				<% endforeach; %>
				<% endif; %>
				<%
				$relations = $associations['HasMany'] + $associations['BelongsToMany'];
				foreach ($relations as $alias => $details):
				    $otherSingularVar = Inflector::variable($alias);
				    $otherPluralHumanName = Inflector::humanize(Inflector::underscore($details['controller']));
				    %>
				    <div class="related">
				        <h4><?= __('Related <%= $otherPluralHumanName %>') ?></h4>
				        <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
				        <table class="table table-bordered" cellpadding="0" cellspacing="0">
				            <tr>
				<% foreach ($details['fields'] as $field): %>
				                <th scope="col"><?= __('<%= Inflector::humanize($field) %>') ?></th>
				<% endforeach; %>
				                <th scope="col" class="actions"><?= __('Actions') ?></th>
				            </tr>
				            <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
				            <tr>
				            <%- foreach ($details['fields'] as $field): %>
				                <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
				            <%- endforeach; %>
				            <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
				                <td class="actions">
				                    <?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>]) ?>
				                    <?= $this->Html->link(__('Edit'), ['controller' => '<%= $details['controller'] %>', 'action' => 'edit', <%= $otherPk %>]) ?>
				                    <?= $this->Form->postLink(__('Delete'), ['controller' => '<%= $details['controller'] %>', 'action' => 'delete', <%= $otherPk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)]) ?>
				                </td>
				            </tr>
				            <?php endforeach; ?>
				        </table>
				        <?php endif; ?>
				    </div>
				<% endforeach; %>
            </div>
        </div>
	</div>
</div>
