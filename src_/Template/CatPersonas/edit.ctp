<?php
    $Edades = array();
    for($i = 1; $i <= 100; $i++)
    {
        $Edades[$i] = $i." A&Ntilde;OS";
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


<?php
    echo $this->Html->css('select2/select2.minfd53',['block'=>true]);
	echo $this->Html->css('bootstrap-datetimepicker',['block'=>true]);
    
    
    echo $this->Html->script('moment.min',['block'=>true]);
    echo $this->Html->script('es',['block'=>true]);
    echo $this->Html->script('bootstrap-datetimepicker',['block'=>true]);
    echo $this->Html->script('select2/select2.full.minfd53',['block'=>true]);
    echo $this->Html->script('select2/es',['block'=>true]);
?>


<?php
$this->loadHelper('Form', ['templates' => 'app_form']);
?>

<script type="text/javascript">
function AddTema()
{      
      var NuevoTema =  document.getElementById("otro-tema").value;
      if(NuevoTema != "")
      {
         NuevoTema = 'name='+ NuevoTema;

         jQuery.ajax({
                        type:'POST',
                        async: true,
                        cache: false,
                        url: "<?php echo $this->Url->build(array('controller'=>'cat_temas','action'=>'add_tema')); ?>",
                        success: function(response)
                        {                          
                          console.log(response);
                          document.getElementById("otro-tema").value = ""
                          $("#cat-temas-ids").find('option').remove();
                           $.ajax(
                                {
                                    type: "POST",
                                    url: "<?php echo $this->Url->build(['controller'=>'cat_temas','action' => 'get_temas']); ?>" ,
                                    dataType: "json",
                                    //data: dataString,
                                    cache: false,
                                    success: function(html)
                                    {
                                      $.each(html, function(key, value)
                                      {
                                        $('<option>').val(key).text(value).appendTo($("#cat-temas-ids"));
                                      });
                                    }
                                });
                          
                        },
                        error: function(response) 
                        {
                          console.log(response);
                        },
                        data:NuevoTema
                      });
          return false;
      }
      else
      {
        alert('DEBE DE INGRESAR EL NOMBRE DEL TEMA.');
      }
}
</script>

<div class="row">
	<div class="col-lg-3">
			<div class="list-group">
				<a class="list-group-item active">Acciones</a>
				<?= $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i>&nbsp;Listado', ['action' => 'index'],['class'=>'list-group-item','escape'=>false]) ?>
				<?= $this->Form->postLink(__('<i class="icon md-delete">&nbsp;</i>&nbsp;Eliminar'),['action' => 'delete', $catPersona->id],['confirm' => __('Realmente desea eliminar el registro con Id # {0}?', $catPersona->id),'escape'=>false,'class'=>'list-group-item'])?>
        	</div>
	</div>

	<div class="col-lg-9">
    	<div class="panel panel-primary">
	        <div class="panel-heading">
	            <h2 class="panel-title"> <?= __('Actualizar informaci&oacute;n') ?></h2>
	        </div>
	        <div class="panel-body">
        		<?= $this->Form->create($catPersona,['role'=>'form','onsubmit'=>'return checkSubmit();']) ?>
                  <h3>Informaci&oacute;n General</h3>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        echo $this->Form->control('ine', ['label'=>['text'=>'Ine']]);
                        ?>
                    </div>
                </div>
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
                    <div class="col-md-2">
                        <?php
                            echo $this->Form->control('fecha_nacimiento', ['type'=>'text','label'=>['text'=>'F.Nacimiento']]);
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                            $Sexo =  array('H'=>'HOMBRE','M'=>'MUJER');
                              echo $this->Form->control('sexo', ['empty'=>true,'options'=>$Sexo,'label'=>[]]);
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                            echo $this->Form->control('telefono', ['label'=>[]]);
                        ?>
                    </div>
                    <div class="col-md-4">
                    <?php
                      echo $this->Form->control('email', ['label'=>[]]);
                    ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->control('cat_municipio_id',['options'=>$catMunicipios])?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('cat_colonia_id',['options'=>$catColonias]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('calle') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->control('numero_interior') ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('numero_exterior') ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('cruzamientos') ?>
                    </div>
                </div>

                <h3>Actividades realizadas con la comunidad por orden de ejecuci&oacute;n</h3>
                <div class="row">
                    <div class="col-md-12">
                    <?php
                    echo $this->Form->control('cat_actividades._ids', ['options' => $catActividades,'label'=>['text'=>'Actividades realizadas']]);
                    ?>
                    </div>
                </div>
                <hr>
                <h3>Temas en los que se encuentra preparado para capacitar</h3>
                <div class="row">
                    <div class="col-md-10">
                    <?php
                        echo $this->Form->control('cat_temas._ids', ['options' => $catTemas,'label'=>['text'=>'Temas para capacitar']]);
                    ?>
                    </div>
                </div>
                <div class="row">

                    <?php
                    $i =0;
                        foreach ($catPersona->ope_personas_redes_sociales as $redes_sociales) :
                        ?>
                        <?php
                            echo $this->Form->control('ope_personas_redes_sociales.'.$i.'.id', ['type'=>'hidden','value'=>$redes_sociales->id]);
                            echo $this->Form->control('ope_personas_redes_sociales.'.$i.'.cat_redes_sociale_id', ['options'=>$catRedesSociales,'value'=>$redes_sociales->cat_redes_sociale_id]);
                            echo $this->Form->control('ope_personas_redes_sociales.'.$i.'.enlace', ['value'=>$redes_sociales->enlace]);
                        ?>
                    <?php
                        $i++;
                        endforeach;
                        ?>
                </div>

       			<?= $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar')) ?>

        		<?= $this->Form->end() ?>
    		</div>
	    </div>
	</div>
</div>



<script type="text/javascript">
  $("#cat-municipio-id").on('change',function()
  {
    var id = $(this).val();
    $("#cat-localidade-id").find('option').remove();
    $("#cat-colonias-ids").find('option').remove();
 
    if (id)
    {
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
              $('<option>').val('').text('Seleccione una localidad').appendTo($("#cat-localidade-id"));
              $.each(html, function(key, value)
              {
                $('<option>').val(key).text(value).appendTo($("#cat-localidade-id"));
              });
            }
        });
        
      $.ajax(
        {
            type: "POST",
            url: "<?php echo $this->Url->build(['controller'=>'cat_colonias','action' => 'get_colonias_por_municipio']); ?>" ,
            dataType: "json",
            data: dataString,
            cache: false,
            success: function(html)
            {
              $.each(html, function(key, value)
              {
                $('<option>').val(key).text(value).appendTo($("#cat-colonias-ids"));
              });
            }
        });
    }
  });
</script>


<script type="text/javascript">
/*function getColonias(cp)
{
    if (cp != "")
    {
        $("#cat-colonias-ids").find('option').remove();
        var dataString = cp;
          $.ajax(
            {
                type: "POST",
                url: "https://services.sm2consultores.com/cp/GetCP.php/"+cp,
                dataType: "json",
                cache: false,
                success: function(json)
                {
                  $('<option>').val('').text('Seleccione una colonia').appendTo($("#cat-colonias-ids"));
                  $.each(json.Generales.Colonias, function(key, value)
                  {
                      $('<option>').val(value.id).text(value.text).appendTo($("#cat-colonias-ids"));
                  });
                }
            });
    }

}*/
</script>


<script type="text/javascript">
    $('#fecha-nacimiento').datetimepicker({format: "YYYY-MM-DD"});

    
    $.fn.select2.defaults.set('language', 'es');

    $("#cat-partidos-politicos-ids").select2({placeholder: "SELECCIONAR",allowClear: true});
    $("#cat-redes-sociales-ids").select2({placeholder: "SELECCIONAR",allowClear: true});
    $("#cat-capacidades-ids").select2({placeholder: "SELECCIONAR",allowClear: true, maximumSelectionLength: 2});
    $("#cat-colonias-ids").select2({placeholder: "SELECCIONAR",allowClear: true});
    $("#cat-actividades-ids").select2({placeholder: "SELECCIONAR",allowClear: true, maximumSelectionLength: 3});
    $("#cat-temas-ids").select2({placeholder: "SELECCIONAR",allowClear: true, maximumSelectionLength: 2});
    $("#cat-preparacion-areas-ids").select2({placeholder: "SELECCIONAR",allowClear: true, maximumSelectionLength: 3});
    $("#cat-causas-sociales-ids").select2({placeholder: "SELECCIONAR",allowClear: true, maximumSelectionLength: 3}); 
    $("#cat-zonas-influencia-id").select2({placeholder: "SELECCIONAR",allowClear: true});
    $("#cat-municipio-id").select2({placeholder: "SELECCIONAR",allowClear: true});
    $("#cat-localidade-id").select2({placeholder: "SELECCIONAR",allowClear: true});
  	$("#tiempo-residencia").select2({placeholder: "SELECCIONAR",allowClear: true});
</script>

<script type="text/javascript">
$(document).ready(function() 
{
    $('#BtnAddTema').attr('disabled', 'disabled');

    $('#otro-tema').keyup(function() {

        var empty = false;
        $('#otro-tema').each(function() {
            if ($(this).val().length == 0) {
                empty = true;
            }
        });

        if (empty) {
            $('#BtnAddTema').attr('disabled', 'disabled');
        } else {
            $('#BtnAddTema').removeAttr('disabled');
        }
    });
});
</script>