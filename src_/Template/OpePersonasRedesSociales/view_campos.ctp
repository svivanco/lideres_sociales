<?php
$this->loadHelper('Form', ['templates' => 'app_form']);
?>


<div class="col-md-4">
        <?= $this->Form->control('ope_personas_redes_sociales.'.$numero.'.cat_redes_sociale_id',['empty'=>true,'options'=>$catRedesSociales,'label'=>['text'=>'Red Social']]) ?>
        <?= $this->Form->control('ope_personas_redes_sociales.'.$numero.'.enlace',[]) ?>
        <?= $this->Form->control('ope_personas_redes_sociales.'.$numero.'.activo',['type'=>'hidden','value'=>1]) ?>
 </div>
