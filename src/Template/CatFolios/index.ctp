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

<div class="row">
	<div class="col-lg-12">
	   <div class="text-center">
	     <h2>Cat&aacute;logo de Folios</h2>
	   </div>
	    <div class="text-right">
	        <?php echo $this->Html->link('<i class="icon md-plus" aria-hidden="true"></i>&nbsp; Nuevo Folio' , ['action' => 'add'],['escape'=>false,'class'=>'btn btn-primary waves-effect waves-classic']) ?>
	    </div>
	    <br>
	</div>

	<div class="col-lg-12">
	 	<table id="catFolio" class="table table-hover dataTable table-striped w-full">
	        <thead>
	             <tr>
		                <th>Id</th>
		                <th>Folio</th>
		                <th>Nombre</th>
		                <th>Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	                <td colspan="4">Cargando datos...</td>
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
	var tbl = $('#catFolio');

    var tabla = $('#catFolio').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            'responsive': true,
            "sAjaxSource": "<?php echo $this->Url->build(array('action'=>'get_data','_ext'=>'json')); ?>",
			'dom': 'Bfrtip',
        	"buttons":
        			   	[
        			   		{
	                            extend: 'colvis',
	                            text: 'Columnas',
	                        },
							{
								extend: 'excelHtml5',
								title: 'Lista de "catFolio"',
								customize: function ( xlsx ){}
							},
							{

								extend: 'pdfHtml5',
								text: 'PDF',
								orientation: 'landscape',
								download: 'open',
                 				title:  'LISTA DE "catFolio"',
                 				exportOptions: {
//															columns: [ 0, 1, 2, 3,4,5 ]
											   },
								customize: function (doc)
														{

//																doc.pageMargins = [10,10,10,10];
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
                                            { "bSortable": false, "aTargets": [3] }
                                    ]
        });

</script>
