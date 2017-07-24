<div class="container">
	<?php if (isset($_SESSION['userMail'])) { ?>
	  <div class="row">
	    <div class="col-sm-10 col-sm-offset-1" id="logout">
	        <div class="page-header">
	            <h3 class="reviews">Dejá tu comentario acá!</h3>
	        </div>
	        <div class="comment-tabs">
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comentarios</h4></a></li>
	                <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Añadir comentarios</h4></a></li>
	            </ul>            
	            <div class="tab-content">
	                <div class="tab-pane active" id="comments-logout">                
	                    <ul class="media-list">
	                    	<?php include 'show_comments.php'; ?>
	                    </ul>
	                </div>
	                <?php
	                if ($_SESSION['userMail']!=$datos['userMail']) {//la persona que esta logueada debe ser distinta del dueño de la gauchada para poder comentar?>
									<div class="tab-pane" id="add-comment">
										<?php echo '<form action="hacer_comentario.php?idFavor='.$_REQUEST['id'].'" method="post" class="form-horizontal" id="commentForm" role="form">'; ?>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Comentario</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <button class="btn btn-warning btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span>Publicar comentario</button>
                            </div>
                        </div>            
                    </form>
                	</div>	                               	
	                <?php }else{ ?>
			              <div class="tab-pane" id="add-comment">
		                    <div class="alert alert-warning alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert">
		                        <span aria-hidden="true">×</span><span class="sr-only">Close</span>                        
		                      </button>
		                      <strong>Che!</strong> Si vos sos dueño de una gauchada, no podes hacer una pregunta acerca de esta, porque se supone que sabes la respuesta ¿Verdad, pilluelo? Ahora tomatelas de aca antes de que saque el rifle. Con amor, ñiñita ?) 
		                    </div>
		                </div>
	                <?php } ?>
	            	</div>
	        	</div>
	  	</div>
  </div>
  <?php }else{ ?>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="page-header">
            <h3 class="reviews">Dejá tu comentario acá!</h3>
        </div>
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comentario</h4></a></li>
                <li><a href="#add-comment-disabled" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Añadir comentario</h4></a></li>
            </ul>            
            <div class="tab-content">
                <div class="tab-pane active" id="comments-logout">                
                    <ul class="media-list">
                    	<?php include 'show_comments.php'; ?>
                    </ul> 
                </div>
                <div class="tab-pane" id="add-comment-disabled">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">×</span><span class="sr-only">Close</span>                        
                      </button>
                      <strong>Che!</strong> Si ya tenés una cuenta, tendrás que loguearte con el botón iniciar sesión para poder comentar. Asi mismo,si no estas registrado te invitamos a hacerlo con el boton registrarse (el mismo con el que inicias sesion ;))
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 <?php } ?> 
</div>