<?php
/**
  * @var \App\View\AppView $this
  */

?>

<div class="row">
	<div class="col-lg-3">
		<div class="list-group">
			<a class="list-group-item active">Acciones</a>
			<?= $this->Html->link('<i class="icon md-format-list-bulleted">&nbsp;</i>&nbsp;Listado', ['action' => 'municipales'],['class'=>'list-group-item','escape'=>false]) ?>
	    </div>	
	</div>
	<div class="col-sm-9">
		<div class="panel panel-primary panel-line">
            <div class="panel-heading">
                <h2 class="panel-title">Informaci&oacute;n</h2>
            </div>
            <div class="panel-body">
             	<h3><?= h($catPersona->nombre_completo) ?></h3>
			    <table class="table table-striped table-bordered">
					<tr>
				        <th scope="row"><?= __('Sexo') ?></th>
                        <td><?= h($catPersona->sexo) ?></td>
                        <th scope="row"><?= __('Fecha Nacimiento') ?></th>
                        <td><?= h($catPersona->fecha_nacimiento) ?></td>
				    </tr>
                    <tr>
				        <th scope="row"><?= __('Telefono') ?></th>
				        <td><?= h($catPersona->telefono) ?></td>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($catPersona->email) ?></td>
				    </tr>
                    <tr>
                        <th scope="row"><?= __('Municipio') ?></th>
                        <td><?= h($catPersona->has('cat_municipio')?$catPersona->cat_municipio->name:'') ?></td>
                        <th scope="row"><?= __('Localidad') ?></th>
                        <td><?= h($catPersona->has('cat_localidade')?$catPersona->cat_localidade->name:'') ?></td>
                    </tr>
                    <tr>

                       <th scope="row"><?= __('Colonia') ?></th>
                       <td><?= h($catPersona->has('cat_colonia')?$catPersona->cat_colonia->asentamiento:'') ?></td>
                        <th scope="row"><?= __('Calle') ?></th>
                        <td><?= h($catPersona->calle) ?></td>
                    </tr>
                    <tr>

                        <th scope="row"><?= __('Numero Interior') ?></th>
                        <td><?= h($catPersona->numero_interior) ?></td>
                        <th scope="row"><?= __('Numero Exterior') ?></th>
                        <td><?= h($catPersona->numero_exterior) ?></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2"><?= __('Cruzamientos') ?></th>
                        <td colspan="2"><?= h($catPersona->cruzamientos) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Distrito') ?></th>
                        <td><?= h($catPersona->has('cat_seccione')?$catPersona->cat_seccione->cat_distrito->name:'') ?></td>
                        <th scope="row"><?= __('Seccion') ?></th>
                        <td><?= h($catPersona->has('cat_seccione')?$catPersona->cat_seccione->name:'') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Edad') ?></th>
                        <td><?= h($catPersona->edad) ?></td></tr>
				</table>

                <div class="related">
                    <h4><?= __('Redes Sociales ') ?></h4>
                    <?php if (!empty($catPersona->ope_personas_redes_sociales)): ?>
                        <table class="table table-bordered" cellpadding="0" cellspacing="0">

                            <?php foreach ($catPersona->ope_personas_redes_sociales as $red_social): ?>
                                <tr>
                                    <td><?= h($red_social->cat_redes_sociale->name) ?></td>
                                    <td><?= h($red_social->enlace) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <h4><?= __('Temas ') ?></h4>
                    <?php if (!empty($catPersona->cat_temas)): ?>
                    <table class="table table-bordered" cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Nombre') ?></th>
                        </tr>
                        <?php foreach ($catPersona->cat_temas as $temas): ?>
                        <tr>
                            <td><?= h($temas->name) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <h4><?= __('Actividades ') ?></h4>
                    <?php if (!empty($catPersona->cat_actividades)): ?>
                        <table class="table table-bordered" cellpadding="0" cellspacing="0">

                            <?php foreach ($catPersona->cat_actividades as $Actividad): ?>
                                <tr>
                                    <td><?= h($Actividad->name) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
				</div>
        </div>
	</div>
</div>
