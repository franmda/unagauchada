<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="page-header">
            <h3 class="reviews">Deja tus preguntas acá!</h3>
        </div>
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comentarios</h4></a></li>
                <?php
                    if (isset($_SESSION['userMail'])){
                        if (($_SESSION['userMail']!=$datos['userMail'])){
                            echo '<li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Añadir comentario</h4></a></li>';
                        }
                    }
                ?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="comments">
                  <?php include 'show_comments.php';?>
                </div>
                <div class="tab-pane" id="add-comment">
                    <form action="#" method="post" class="form-horizontal" id="commentForm" role="form">
                        <?php if (isset($_SESSION['userMail'])){ ?>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Comment</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="addComment" id="addComment" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span>Submit comment</button>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="tab-pane" id="add-comment-disabled">
                                <div class="alert alert-info alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                  </button>
                                  <strong>Hey!</strong> If you already have an account <a href="#" class="alert-link">Login</a> now to make the comments you want. If you do not have an account yet you're welcome to <a href="#" class="alert-link"> create an account.</a>
                                </div>
                            </div>
                        <?php } ?>    
                    </form>
                </div>
            </div>
        </div>
  </div>
  </div>