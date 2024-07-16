
<div class="page-login-main">
    <div class="brand hidden-md-up">
      <img class="brand-img" src="<?php echo $this->request->webroot; ?>img/logo_.png" alt="..." width="300"><br>
      <h3 class="brand-text font-size-40" style="text-align: center;">LIDERES SOCIALES</h3>
    </div> 
    <h3 class="font-size-24" style="text-align: center">INICIAR SESI&Oacute;N</h3>
    <h2  class="font-size-20" style="text-align: center;">BIENVENIDO</h2>
              
          <?php
            $templatesUsername = [
                                    'input' => '
                                                <div class="form-group form-material floating" data-plugin="formMaterial">                                
                                                    <input autocomplete = "off" class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>
                                                    <label  class="floating-label">Usuario</label>
                                                </div>',
                                    'inputContainer' => '{{content}}',
                                ];


            $myTemplatesPassword = [
                                    'input' => '
                                                <div class="form-group form-material floating" data-plugin="formMaterial">
                                                 <input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>
                                                    <label class="floating-label">Clave de Acceso</label>
                                                       
                                                </div>',
                                    'inputContainer' => '{{content}}',
                                    ];
            ?>
          
          
          
           <?= $this->Form->create(null,['role'=>'form','autocomplete'=>"off"]) ?>
             <?php 
                echo $this->Form->input('login',
                                                [
                                                'type'=>'text',
                                                'label'=>false,
                                                'templates'=>$templatesUsername,
                                                ]
                                            );
                echo $this->Form->input('password',
                                                [
                                                    'type'=>'password',
                                                    'label'=>false,
                                                    'templates'=> $myTemplatesPassword
                                                ]
                                       );
                echo $this->Form->button(__('Entrar'),['class'=>'btn btn-primary btn-block btn-lg mt-40']);
                echo $this->Flash->render('flash');
            ?>
           <?= $this->Form->end()?>
           
      <footer class="page-copyright">
          <p>SM2</p>
          <p>© <?php echo date('Y')?></p>
          <div class="social">
            <a class="btn btn-icon btn-round social-twitter mx-5" target="_blank" href="#">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
            <a class="btn btn-icon btn-round social-facebook mx-5" target="_blank" href="#">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
    </footer>
</div>
<script type="text/javascript">
    var Login = document.getElementById("login").value;
    if(Login == "")
    {
        document.getElementById("login").focus();
    }
    else
    {
        document.getElementById("password").focus();
    }
</script>
