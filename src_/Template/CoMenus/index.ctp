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
//                                    'datatables/datatables.net-buttons/buttons.print.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-buttons/jszip.min',
                                    'datatables/datatables.net-buttons/pdfmake.min',
                                    'datatables/datatables.net-buttons/vfs_fonts',
                                    'datatables/datatables.net-buttons/buttons.colVis.minfd53.js?v4.0.1',
                                    'datatables/datatables.net-buttons-bs4/buttons.bootstrap4.minfd53.js?v4.0.1',
							      )
							);
?>

<div class="row">
    <div class="col-md-9">
        <h2>Menus</h2>
    </div>
    <div class="col-md-3">
        <div class="text-right">
            <?php echo $this->Html->link('<i class="zmdi zmdi-collection-plus zmdi-hc-fw"></i>&nbsp;Nuevo Registro', ['action' => 'add'],['escape'=>false,'class'=>'btn btn-primary waves-effect']) ?>
        </div>
    </div>
</div>
<div class="table-reponsive">

    <table id="coMenus" class="table table-bordered table-condensed dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="info">
            <th>ID</th>
            <th>Menu</th>
            <th>Nombre</th>
            <th>posicion</th>
            <th>destino</th>
            <th>activo</th>
            <th>Creado</th>
            <th>Modificado</th>
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
<script type="text/javascript" charset="utf-8">
    $.extend(true, $.fn.dataTable.defaults,
        {
            lengthMenu: [[10, 25, 50, 250, 999999], [10, 25, 50, 250, "Todos"]]
        });
    var tbl = $('#coMenus');

    var tabla = $('#coMenus').DataTable({
        "bProcessing": true,
        "bServerSide": true,
        'responsive': true,
        "sAjaxSource": "<?php echo $this->Url->build(array('action'=>'get_data','_ext'=>'json')); ?>",
        "dom": '<"toolbar">lBfrtprt<"bottom"ip<"clear">>',

        "buttons":
            [
                {
                    extend: 'collection',
                    text: 'Exportar',
                    "buttons":
                        [                 
                            {
                                extend: 'excelHtml5',
                                title: 'Lista de Direcciones',
                                customize: function ( xlsx ){
                                }
                            },
                            {

                                extend: 'pdfHtml5',
                                text: 'PDF',
                                orientation: 'landscape',
                                download: 'open',
                                title:  "Servicios Estatales de Salud \n Coordinacion de Informatica\n",
                                exportOptions: {
														columns: [ 0, 1, 2, 3,4,5,6,7 ]
                                },
                                customize: function (doc)
                                {

                                    doc.pageMargins = [10,10,10,10];
                                    doc.defaultStyle.fontSize = 9;
                                    doc.styles.tableHeader.fontSize = 10;
                                    doc.styles.title.fontSize = 13;
                                    // Remove spaces around page title
                                    doc.content[0].text = doc.content[0].text.trim();

                                    var colCount = new Array();
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
                                    colCount.pop();
                                    doc.content[1].table.widths = colCount;

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
                                                        text: 'Lista de Direcciones',
                                                        bold: true,
                                                    },
                                                    {
                                                        alignment: 'right',
                                                        text: 'Fecha: '+fecha+'\nHora: '+hora+'     ',
                                                        margin: [ 0, 0, 40, 0 ],
                                                        bold: true
                                                    }
                                                ]
                                        }
                                    );

                                    // Styling the table: create style object
                                    var objLayout = {};
                                    // Horizontal line thickness
                                    objLayout['hLineWidth'] = function(i) { return .5; };
                                    // Vertikal line thickness
                                    objLayout['vLineWidth'] = function(i) { return .5; };
                                    // Horizontal line color
                                    objLayout['hLineColor'] = function(i) { return '#aaa'; };
                                    // Vertical line color
                                    objLayout['vLineColor'] = function(i) { return '#aaa'; };
                                    // Left padding of the cell
                                    objLayout['paddingLeft'] = function(i) { return 4; };
                                    // Right padding of the cell
                                    objLayout['paddingRight'] = function(i) { return 4; };
                                    // Inject the object in the document
                                    doc.content[1].layout = objLayout;

                                }
                            },
                        ]
                }
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
            "sSearch": "Filtrar: ",
            "sSearchPlaceholder": "Filtrar",
            "sProcessing":"Cargando"
        },
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [8] }
        ]
    });

</script>
