<?php
/**
  * @var \App\View\AppView $this
  */
?>


<?php
  echo $this->Html->css(
  						array(
                                'datatables/datatables.net-bs4/dataTables.bootstrap4.minfd53.css?v4.0.1',
                                'datatables/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.minfd53.css?v4.0.1',
                                'datatables/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.minfd53.css?v4.0.1',
                                'datatables/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.minfd53.css?v4.0.1',
                                'datatables/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.minfd53.css?v4.0.1',
                                'datatables/datatables.net-select-bs4/dataTables.select.bootstrap4.minfd53.css?v4.0.1',
                                'datatables/datatables.net-responsive-bs4/responsive.bootstrap4.min',
                                'datatables/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.minfd53.css?v4.0.1',
                                'datatables/datatables.net-bs4/datatable.minfd53.css?v4.0.1',
						      )
						);
  echo $this->Html->script(
  							array(
                                    'datatables/jquery.dataTablesfd53.js?v4.0.1',
                                    'datatables/datatables.net-bs4/dataTables.bootstrap4fd53.js?v4.0.1',
                                    'datatables/datatables.net-fixedheader/dataTables.fixedHeader.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-fixedcolumns/dataTables.fixedColumns.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-rowgroup/dataTables.rowGroup.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-scroller/dataTables.scroller.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-responsive/dataTables.responsive.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-responsive-bs4/responsive.bootstrap4.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-buttons/dataTables.buttons.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-buttons/buttons.html5.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-buttons/buttons.flash.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-buttons/jszip.min',
                                    'datatables/datatables.net-buttons/pdfmake.min',
                                    'datatables/datatables.net-buttons/vfs_fonts',
                                    'datatables/datatables.net-buttons/buttons.colVis.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-buttons-bs4/buttons.bootstrap4.minfd53.js?v4.0.1',
							      )
							);
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
	<div class="col-lg-12"> 
	   <div class="text-center">
	     <h2>Administraci&oacute;n de <?php echo $catCargo->name?> de <?php echo $catMunicipio->name?></h2>        
	   </div> 
	    <div class="text-right">
			<button class="btn btn-primary waves-effect waves-classic" data-target="#exampleFillIn" data-toggle="modal" type="button">Nuevo <?php echo $catCargo->name?> </button>

	    </div>
	    <br>
	</div>
	
	<div class="col-lg-12">
	 	<table id="catPersona" class="table table-hover dataTable table-striped w-full">
	        <thead>
	             <tr>
		                <th>Nombre</th>
		                <th>Paterno</th>
		                <th>Materno</th>
		                <th>Edad</th>
		                <th>Sexo</th>
		                <th>Telefono</th>
		                <th>Email</th>
		                <th>F. Creaci&oacute;n</th>
		                <th>Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	                <td colspan="9">Cargando datos...</td>
	            </tr>
	        </tbody>
	    </table>
	</div> 
 </div> 
<script type="text/javascript" charset="utf-8">
	$.extend(true, $.fn.dataTable.defaults, 
    { 
    	lengthMenu: [[10, 25, 50, 250, 999999], [10, 25, 50, 250, "Todos"]]
	});
	var tbl = $('#catPersona');

    var tabla = $('#catPersona').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            'responsive': true,
            "sAjaxSource": "<?php echo $this->Url->build(array('action'=>'get_data_listado','_ext'=>'json')); ?>", 
			"fnServerParams": function ( aoData ) 
			{
                aoData.push( 
					{"name": "cat_municipio_id", "value": "<?php echo $catMunicipio->id ?>"},
					{"name":"cat_cargo_id","value":"<?php echo $catCargo->id ?>"} 
					);
            },
			'dom': 'Bfrtip',	
        	"buttons":
        			   	[
        			   		{
	                            extend: 'colvis',
	                            text: 'Columnas',
	                        },
							{
								extend: 'excelHtml5',
								title: 'Lista de Promotores Sociales',
								customize: function ( xlsx ){}
							},
							{
												
								extend: 'pdfHtml5',
								text: 'PDF',
								orientation: 'landscape',
								download: 'open',
                                title: 'Lista de Promotores Sociales',
                 				exportOptions: {
															columns: [ 0, 1, 2, 3,4,5,6 ]
											   },  
								customize: function (doc)
														{
															
//																doc.pageMargins = [10,10,10,10];
															doc.defaultStyle.fontSize = 9;
															doc.styles.tableHeader.fontSize = 10;
															doc.styles.title.fontSize = 13;
															// Remove spaces around page title
															doc.content[0].text = doc.content[0].text.trim();
															
															/*var colCount = new Array();
															$(tbl).find('tbody tr:first-child td').each(function()
															{
																if($(this).attr('colspan'))
																{
																    for(var i=1;i<=$(this).attr('colspan');$i++)
																    {
																        colCount.push('*');
																    }
																}
																else
																{ 
																    colCount.push('*'); 
																}
															});
															doc.content[1].table.widths = colCount;*/
															
															// Create a footer
															doc['footer']=(function(page, pages) 
															{
																return {
																    columns: [
																        'Elaborado por: <?php echo $this->request->Session()->read('Auth.User.nombre_completo')?>',
																        {
																            // This is the right column
																            alignment: 'right',
																            text: ['Página ', { text: page.toString() },  ' de ', { text: pages.toString() }]
																        }
																    ],
																    margin: [10, 0]
																}
															});
															var d = new Date();
															var fecha = d.toLocaleDateString('es-CL');
															var hora = d.toLocaleTimeString('es-CL');
															doc.content.splice(           
																	  			1, 0,	
      																				{
																					  columns: 
																					  [
																						  {
																							   alignment: 'left',
																							   text: 'Fecha: '+fecha+' : '+hora+'     ',
																							  margin: [ 0, 0, 40, 0 ],
																							  bold: true
																						  }
																					  ]
	  																				}
	  																		 );
														}
                            },                
        			   	],
            "language": {
                        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                        "sZeroRecords": "Sin registros",
                        "sInfo": "Mostrando registros de _START_ a _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Sin registros",
                        "sInfoFiltered": "",//"(Mostrando _MAX_ registros por pagina)",
                        "oPaginate": {
                            "sFirst": "Inicio",
                            "sLast": " Final",
                            "sNext": ">",
                            "sPrevious": "<"
                        },
                        "sSearch": " ",
                        "sSearchPlaceholder": "Filtrar",
                        "sProcessing":"Cargando"
                    },
                    "aoColumnDefs": [
                                            { "bSortable": false, "aTargets": [8] }
                                    ]
        });
     
</script>

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

<script type="text/javascript">
    function guardar() {
        $('#action').val('1')
    }
    function guardaryAgregarCoordinador()
    {
        $('#action').val('3')
    }
    function guardaryAgregarPromotor()
    {
        $('#action').val('4')
    }

</script>


<div class="modal fade example-modal-lg" role="dialog" tab-index="1" id="exampleFillIn">
	<div class="modal-dialog modal-simple  modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
			</div>
			<div class="modal-body">
			<?= $this->Form->create($catPersona,['url'=>['action'=>'add'],'role'=>'form','onsubmit'=>'return checkSubmit();','type'=>'file']) ?>
                <?= $this->Form->control('cat_cargo_id',['type'=>'hidden','value'=>$catCargo->id]) ?>
                <?php echo $this->Form->control('action',['type'=>'hidden']) ?>
                <?php
                    if($catCargo->id == "bf294131-c603-47e0-b315-7df7455716a7"){
                        echo $this->Form->control('cat_organizacione_id',['options'=>$catOrganizaciones,'empty'=>true,'label'=>['text'=>'Organizaciones']]);
                    }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('cat_persona_pertenece_id',['options'=>$catPersonasPertenece,'empty'=>true,'label'=>'A Cargo de ']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('ine',['label'=>['text'=>'Clave Elector']]) ?>
                        <span class="badge badge-danger" id="existe" style="display: none">Registrado</span>
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
                    <div class="col-md-6">
                        <div class="form-group form-inline">
                            <div class="fg-line">
                                <label>Fecha de Nacimiento</label>
                                <?php
                                $Meses = array(
                                    '01'=>'Enero',
                                    '02'=>'Febrero',
                                    '03'=>'Marzo',
                                    '04'=>'Abril',
                                    '05'=>'Mayo',
                                    '06'=>'Junio',
                                    '07'=>'Julio',
                                    '08'=>'Agosto',
                                    '09'=>'Septiembre',
                                    '10'=>'Octubre',
                                    '11'=>'Noviembre',
                                    '12'=>'Diciembre',
                                );
                                ?>
                                <?php echo $this->Form->day('fecha_nacimiento');?>
                                <?php echo $this->Form->month('fecha_nacimiento',['options'=>$Meses,'required'=>true]);?>
                                <?php echo $this->Form->year('fecha_nacimiento',['required'=>true,'maxYear' => date('Y') - 18,'minYear' => date('Y') - 80,'label'=>['text'=>'Año']]);?>
                            </div>
                        </div>
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
                        echo $this->Form->control('cat_localidade_id', ['options'=>$catLocalidades,'label'=>['text'=>'Localidades']]);
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('cat_colonia_id',['options'=>$catColonias,'empty'=>true,'label'=>['text'=>'Colonias']])?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->control('calle',['label'=>['text'=>'Calle']])?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('numero_interior',['label'=>['text'=>'N° Interior']])?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('numero_exterior',['label'=>['text'=>'N° Exterior']])?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->Control('cruzamientos')?>
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
                    <?php
                         echo $this->Form->control('cat_municipio_id', ['type'=>'hidden',"value"=>$catMunicipio->id]);
                    ?>

                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->Control('cat_seccione_id',['empty'=>true,'options'=>$catSecciones,'label'=>['text'=>'Secciones']]) ?>
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
                        <?= $this->Form->button('Guardar',array('onClick'=>'guardar()','type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar')) ?>
                        <?php
                        if($catCargo->id == "bf294131-c603-47e0-b315-7df7455716a7")
                        {
                            echo $this->Form->button('Guardar y Agregar Coordinadores',array('onClick'=>'guardaryAgregarCoordinador()','type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar'));
                        }else if($catCargo->id == "3b4b8a85-02d8-49e5-94df-64c4247187f8")
                        {
                            echo $this->Form->button('Guardar y Agregar Promotores',array('onClick'=>'guardaryAgregarPromotor()','type'=>'submit','class'=>'btn btn-primary waves-effect','id'=>'btnGuardar'));
                        }
                        ?>
                    </div>
                 </div>

        		<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

    $('#fecha-nacimiento').datepicker({format: 'yyyy-mm-dd',language:'es'});
    $('#cat-localidade-id').select2(
        {
            placeholder:'Selecciona',
            width:'100%'
        }
    );
    $('#cat-persona-pertence-id').select2(
        { placeholder:'Selecciona',width:'100%'}
    );
    $('#cat-colonia-id').select2(
        { placeholder:'Selecciona',width:'100%'}
    );
    $('#cat-seccione-id').select2(
        { placeholder:'Selecciona',width:'100%'}
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
    $('#ine').on('blur',function () {
        var ine = $(this).val();
        if(ine)
        {
            $.ajax({
                type:'POST',
                async:true,
                url:"<?php echo $this->Url->build(['controller'=>'cat_personas','action'=>'registrado_clave_elector','_ext'=>'json'])  ?>",
                data:
                    {
                        clave_elector:ine
                    }
            })
                .done(function (data) {
                    if(data.catPersona != null)
                    {
                        $('#existe').css('display','block');
                    }else
                    {
                        $('#existe').css('display','none');
                    }
                })
                .fail(function (error) {
                    console.log(error)
                });
        }
    });

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
