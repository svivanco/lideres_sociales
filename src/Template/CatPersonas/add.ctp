
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

<?php
    echo $this->Html->css('bootstrap-datetimepicker',['block'=>true]);
    echo $this->Html->script('moment.min',['block'=>true]);
    echo $this->Html->script('es',['block'=>true]);
    echo $this->Html->script('bootstrap-datetimepicker',['block'=>true]);
?>

<?php 
	echo $this->Html->css('select2/select2.minfd53',['block'=>true]);
    echo $this->Html->script('select2/select2.full.minfd53',['block'=>true]);
    echo $this->Html->script('select2/es',['block'=>true]);
?>
<?php
$this->loadHelper('Form', ['templates' => 'app_form']);
?>
<div class="row">
	<div class="col-lg-3">
			<div class="list-group">
				<a class="list-group-item active">Acciones</a>
				<?= $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i>&nbsp;Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
		    </div>
	</div>
	<div class="col-lg-9">
    	<div class="panel panel-primary panel-line">
	        <div class="panel-heading">
	            <h2 class="panel-title"> <?= __('Agregar Nuevo') ?></h2>
	        </div>
	        <div class="panel-body">
        		<?= $this->Form->create($catPersona,['role'=>'form','onsubmit'=>'return checkSubmit();','type'=>'file']) ?>
                <div class="row">
				    <div class="col-md-4">
                        <?php
                            echo $this->Form->control('nombre', ['label'=>['text'=>'Nombre(s)']]);  
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                             echo $this->Form->control('paterno', ['label'=>['text'=>'Ap. Paterno']]);  
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                            echo $this->Form->control('materno', ['label'=>['text'=>'Ap. Materno']]);  
                        ?>
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-md-6">
                    <?php
                      //echo $this->Form->control('edad', ['label'=>[]]);
                      echo $this->Form->control('fecha_nacimiento', ['type'=>'text','label'=>[]]);
                    ?>
                    </div>
                    <div class="col-md-6">
                    <?php
                    $Sexo =  array('H'=>'HOMBRE','M'=>'MUJER');
                      echo $this->Form->control('sexo', ['empty'=>true,'options'=>$Sexo,'label'=>[]]);  
                    ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <?php
                      echo $this->Form->control('telefono', ['label'=>[]]);  
                    ?>
                    </div>
                    <div class="col-md-6">
                    <?php
                      echo $this->Form->control('email', ['label'=>[]]);  
                    ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <?php
                        echo $this->Form->control('cat_municipio_id', ['required'=>true,'empty'=>true,'options'=>$catMunicipios,'label'=>['text'=>'Municipios']]);  
                    ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                            echo $this->Form->control('cat_localidade_id', ['label'=>['text'=>'Localidades']]);  
                        ?>
                    </div> 
                </div> 
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('cat_colonia_id',['options'=>$catColonias,'empty'=>true,'label'=>['text'=>'Colonias']])?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('calle',['label'=>['text'=>'Calle']])?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"> 
                        <?= $this->Form->control('numero_interior',['label'=>['text'=>'N° Interior']])?>
                    </div>
                    <div class="col-md-4"> 
                        <?= $this->Form->control('numero_exterior',['label'=>['text'=>'N° Exterior']])?>
                    </div>
                    <div class="col-md-4">
                    <?= $this->Form->Control('cruzamientos')?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo $this->Form->input('foto', array('required'=>false,'type'=>'file', 'placeholder' => 'Seleccionar un archivo','label' => array('text' => 'Subir foto de perfil : ')));?>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->Control('cat_seccione_id') ?>    
                    </div>
                </div>

<!--                    <div class="col-md-4">-->
                    <?php
//                      echo $this->Form->control('cat_colonia_id', ['label'=>['text'=>'Colonias']]);  
                    ?>
<!--                    </div>-->
                </div>
       			 <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <?= $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar')) ?>
                    </div>
                 </div>

        		<?= $this->Form->end() ?>
    		</div>
	    </div>
	</div>
</div>

<script type="text/javascript">
    $('#fecha-nacimiento').datetimepicker({format: "YYYY-MM-DD"});


    $("#cat-municipio-id").select2    ({placeholder: "SELECCIONAR",allowClear: true});    
   	$("#cat-localidade-id").select2	({placeholder: "SELECCIONAR",allowClear: true});	
</script>

<script type="text/javascript">
  $("#cat-municipio-id").on('change',function()
  {
    var id = $(this).val();
    $("#cat-localidade-id").find('option').remove();
 
    if (id)
    {
//      document.getElementById('cargando').style.display='block';
      var dataString = 'id='+ id;
      $.ajax(
        {
            type: "POST",
            url: "<?php echo $this->Url->build(['controller'=>'cat_localidades','action' => 'get_localidades_por_municipio']); ?>" ,
            dataType: "json",
            data: dataString,
            cache: false,
            success: function(html)
            {
//              document.getElementById('cargando').style.display='none';
              $('<option>').val('').text('Seleccione una localidad').appendTo($("#cat-localidade-id"));
              $.each(html, function(key, value)
              {
                $('<option>').val(key).text(value).appendTo($("#cat-localidade-id"));
              });
            }
        });
    }
  });
</script>
