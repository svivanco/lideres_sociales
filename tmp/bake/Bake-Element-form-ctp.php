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
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });

if (isset($modelObject) && $modelObject->hasBehavior('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}
?>
<script type="text/javascript">
var statSend = false;
function checkSubmit() 
{   
    if (!statSend) 
    {
        statSend = true;
        document.getElementById('btnGuardar').disabled = true;
        return true;
    } 
    else 
    {
        alert("El formulario ya se esta enviando...");
        return false;
    }
}
</script>
<CakePHPBakeOpenTagphp 
//	echo $this->Html->css('select2/select2.minfd53',['block'=>true]);
//  echo $this->Html->script('select2/select2.full.minfd53',['block'=>true]);
CakePHPBakeCloseTag>
<CakePHPBakeOpenTagphp
$this->loadHelper('Form', ['templates' => 'app_form']);
CakePHPBakeCloseTag>
<div class="row">
	<div class="col-lg-3">
			<div class="list-group">
				<a class="list-group-item active">Acciones</a>
				<CakePHPBakeOpenTag= $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i>&nbsp;Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) CakePHPBakeCloseTag>
				<?php if (strpos($action, 'add') === false): ?>
            		<CakePHPBakeOpenTag= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $<?= $singularVar ?>-><?= $primaryKey[0] ?>],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $<?= $singularVar ?>-><?= $primaryKey[0] ?>),'escape'=>false,'class'=>'list-group-item'])CakePHPBakeCloseTag>
        		<?php endif; ?>
			</div>
	</div>

	<div class="col-lg-9">
    	<div class="panel panel-primary panel-line">
	        <div class="panel-heading">
	            <h2 class="panel-title"> <CakePHPBakeOpenTag= __('<?= Inflector::humanize($action) ?> <?= $singularHumanName ?>') CakePHPBakeCloseTag></h2>
	        </div>
	        <div class="panel-body">
        		<CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>,['role'=>'form','onsubmit'=>'return checkSubmit();']) CakePHPBakeCloseTag>
        	        			
				<CakePHPBakeOpenTagphp
<?php
		foreach ($fields as $field) 
		{
		    if (in_array($field, $primaryKey)) 
		    {
		        continue;
		    }
		    if (isset($keyFields[$field])) 
		    {
		        $fieldData = $schema->column($field);
		        if (!empty($fieldData['null'])) 
		        {
?>
            		echo $this->Form->control('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'empty' => true,'label'=>['']]);
<?php
		        } 
		        else 
		        {
?>
            		echo $this->Form->control('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>,'label'=>['']]);
<?php
		        }
		        continue;
		    }
		    if (!in_array($field, ['created', 'modified', 'updated'])) 
		    {
		        $fieldData = $schema->column($field);
		        if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) 
		        {
?>
            		echo $this->Form->control('<?= $field ?>', ['empty' => true,'label'=>['']]);
<?php
		        } 
		        else 
		        {
?>
            		echo $this->Form->control('<?= $field ?>', ['label'=>[]]);
<?php
		        }
		    }
		}
		if (!empty($associations['BelongsToMany'])) 
		{
		    foreach ($associations['BelongsToMany'] as $assocName => $assocData) 
		    {
?>
            	echo $this->Form->control('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>,'label'=>[]]);
<?php
		    }
		}
?>
	        CakePHPBakeCloseTag>
       			<CakePHPBakeOpenTag= $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar')) CakePHPBakeCloseTag>

        		<CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
    		</div>
	    </div>
	</div>
</div>

<script type="text/javascript">
//   	$("#Example-id").select2	({placeholder: "SELECCIONAR",allowClear: true});	
</script>