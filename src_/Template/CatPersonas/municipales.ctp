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
            <h2>Administración Lideres Municipales</h2>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-primary waves-effect waves-classic" data-target=".example-modal-lg" data-toggle="modal">Nuevo Lider Municipal</button>
        </div>
        <br>
    </div>

    <div class="col-lg-12">
        <table id="catPersona" class="table table-hover dataTable table-striped w-full">
            <thead>
            <tr>
                <th>Municipio</th>
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
        "sAjaxSource": "<?php echo $this->Url->build(array('action'=>'get_data_municipales','_ext'=>'json')); ?>",
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
                <?php echo $this->Form->control('action',['type'=>'hidden']) ?>
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
                        echo $this->Form->control('cat_municipio_id', ['options'=>$catMunicipios,'empty'=>true,'label'=>['text'=>'Municipios']]);
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
            placeholder:'Temas',
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