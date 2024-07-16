<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
echo $this->Html->css('datepicker/bootstrap-datepicker.standalone.min',['block'=>true]);
echo $this->Html->script('datepicker/bootstrap-datepicker.min',['block'=>true]);
echo $this->Html->script('datepicker/bootstrap-datepicker.es.min',['block'=>true]);
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
	<div class="col-md-12 text-center">
	<h2>Lideres, coordinadores y promotores</h2></div>
</div>
<br/>
<br/>
<div class="row">
	<div class="col-md-12">
        <div class="text-right">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary waves-effect waves-classic" data-target=".example-modal-lg" data-toggle="modal">Nuevo Lider Municipal</button>
                <?= $this->html->link('Lista Lideres',['controller'=>'cat_personas','action'=>'municipales'],['class'=>'btn btn-primary'])  ?>
            </div>

        </div>
		<table class="table">
			<thead>
				<tr>
					<th>Municipios</th>
					<th>Lideres</th>
					<th>Coordinadores</th>
					<th>Promotores</th>
				</tr>
			</thead>
			<?php
				foreach($catMunicipios as $catMunicipio)
				{
					?>
						<tr>
							<td><?php echo $catMunicipio->name?></td>
                            <?php
                            if($catMunicipio->lideres){
                                ?>
                                <td><?php echo $this->Html->link('Ver',['controller'=>'cat_personas','action'=>'index',$catMunicipio->id,'bf294131-c603-47e0-b315-7df7455716a7'],['escape'=>false]) ?></td>
                                <?php
                            }else{
                                ?>
                                    <td><i class="md-lock" aria-hidden="true"></i></td>
                                <?php
                            }
                            ?>
                            <?php
                            if($catMunicipio->coordinadores){
                            ?>
                                <td><?php echo $this->Html->link('Ver',['controller'=>'cat_personas','action'=>'index',$catMunicipio->id,'3b4b8a85-02d8-49e5-94df-64c4247187f8'],['escape'=>true]) ?></td>
                            <?php
                            }else{
                                ?>
                                <td><i class="md-lock" aria-hidden="true"></i></td>
                                <?php
                            }
                            ?>

                            <?php
                            if($catMunicipio->promotores){
                                ?>
                                <td><?php echo $this->Html->link('Ver',['controller'=>'cat_personas','action'=>'index',$catMunicipio->id,'d5dccdef-e6a7-47e7-a50b-d39abaf331c7'],['escape'=>true]) ?></td>
                                <?php
                            }else{
                                ?>
                                <td><i class="md-lock" aria-hidden="true"></i></td>
                                <?php
                            }
                            ?>



						</tr>
					<?php
				}
			?>
		</table>
	</div>
</div>

<script type="text/javascript">
    function GuardarAgregarLider()
    {
        $('#action').val('2')
    }
    function guardar() {
        $('#action').val('1')
    }
</script>
<div class="modal fade example-modal-lg" aria-labelledby="exampleOptionalLarge" role="dialog">
    <div class="modal-dialog modal-simple modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="exampleOptionalLarge">Nuevo Lider Municipal</h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create($catPersona,['url'=>['controller'=>'cat_personas','action'=>'add'],'role'=>'form','onsubmit'=>'return checkSubmit();','type'=>'file']) ?>
                <?= $this->Form->control('cat_cargo_id',['type'=>'hidden','value'=>'4e52048b-c814-4d61-977e-31c5b6b7b8ca']) ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo  $this->Form->control('ine',['label'=>['text'=>'Ine'],'required'])?>
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
                    <div class="col-md-4">
                        <?php
                        echo $this->Form->control('fecha_nacimiento', ['type'=>'text','label'=>[]]);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                            $Sexo =  array('H'=>'HOMBRE','M'=>'MUJER');
                            echo $this->Form->control('sexo', ['empty'=>true,'options'=>$Sexo,'label'=>[]]);
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
                        <?php
                            echo $this->Form->control('telefono', ['empty'=>true,'label'=>['text'=>'Telefono']]);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                        echo $this->Form->control('cat_municipio_id', ['options'=>$catMunicipiosLista,'empty'=>true,'label'=>['text'=>'Municipios']]);
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                        echo $this->Form->control('cat_localidade_id', ['options'=>false,'label'=>['text'=>'Localidades']]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('cat_colonia_id',['empty'=>true,'label'=>['text'=>'Colonias']])?>
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
                        <?php /*echo $this->Form->input('foto', array('required'=>false,'type'=>'file', 'placeholder' => 'Seleccionar un archivo','label' => array('text' => 'Subir foto de perfil : ')));*/?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->Control('cat_seccione_id',['empty'=>true,'label'=>['text'=>'Secciones']]) ?>
                    </div>
                    <div class="col-md-8">
                        <?= $this->Form->control('cat_actividades._ids',['options'=>$catActividades,'label'=>['text'=>'Actividades']]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('cat_temas._ids',['options'=>$catTemas,'label'=>['text'=>'Temas']]) ?>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $this->Html->link('Añadir Red Social','javascript:;',['id'=>'red_social','class'=>'btn btn-primary btn-icon-text','escape'=>false]) ?>
                </div>
            </div>
            <div class="row" id="campos_redes_sociales">

            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: right;">
                    <?= $this->Form->button('Guardar',array('type'=>'submit','onClick'=>'guardar()','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar')) ?>
                    <?= $this->Form->button('Guardar y Agregar Lider',array('onClick'=>'GuardarAgregarLider()','type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar')) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#cat-municipio-id').on('change',function ()
         {
        var id = $(this).val();//id municipio

        if(id)
        {
            $.ajax(
                {
                    async:true,
                    type:'POST',
                    url:"<?php echo $this->Url->build(['controller'=>'cat_colonias','action'=>'get_colonias_por_municipio'])  ?>",
                    data:{
                        id:id
                    }

                }
            ).done(function (data)
            {
                var html = "";
                $.each(data, function (key,value) {
                    html +="<option value='"+key+"'>"+value+"</option>";
                });
                $('#cat-colonia-id').html(html);
            }).fail(function (error)
            {
                console.log(error);
            });

            $.ajax(
                {
                    type:'POST',
                    async:true,
                    url:"<?php echo $this->Url->build(['controller'=>'cat_secciones','action'=>'get_secciones_por_municipios','_ext'=>'json'])  ?>",
                    data:
                        {
                            id:id
                        }
                }
            ).done(function (data) {
                var html = "";
                $.each(data.catSecciones, function (key,value) {
                    html +="<option value='"+key+"'>"+value+"</option>";
                });
                $('#cat-seccione-id').html(html);
            }).fail(function (error) {
                console.log(error);
            });

            $.ajax(
                {
                    type:'POST',
                    async:true,
                    url:"<?php echo $this->Url->build(['controller'=>'cat_localidades','action'=>'get_localidades_por_municipio','_ext'=>'json'])  ?>",
                    data:
                        {
                            id:id
                        }
                }
            )
                .done(function (data)
            {
                var html = '';
                $.each(data,function (key,value) {
                    html += '<option value="'+key+'">'+value+'</option>';
                });
                $('#cat-localidade-id').html(html);
            })
                .fail(function (error)
            {
                console.log(error)
            })
        }
    }
    );
    $('#fecha-nacimiento').datepicker({format: 'yyyy-mm-dd',language:'es'});
    $('#cat-municipio-id').select2(
        {
            placeholder:'Selecciona',
            width:'100%'
        }
    );
    $('#cat-localidade-id').select2(
        {
            placeholder:'Selecciona',
            width:'100%'
        }
    );
    $('#cat-colonia-id').select2(
        {
            placeholder:'Selecciona',
            width:'100%'
        }
    );
    $('#cat-seccione-id').select2(
        {
            placeholder:'Selecciona',
            width:'100%'
        }
    );
    $('#cat-actividades-ids').select2(
        {
            placeholder:'Actividades',
            width:'100%'
        }
    );
    $('#cat-temas-ids').select2(
        {
            placeholder:'Actividades',
            width:'100%'
        }
    );

    var numero = 0;
    $('#red_social').click(function (e) {
        $.ajax(
            {
                async:true,
                type:'POST',
                url:"<?php echo $this->Url->build(['controller'=>'ope_personas_redes_sociales','action'=>'view_campos']) ?>",
                data:{
                    numero:numero
                }
            }
        ).done(function (data) {
            console.log(data);
            $("#campos_redes_sociales").append(data);
        }).fail(function (error) {
            console.log(error);
        });
        numero++;
    })
</script>