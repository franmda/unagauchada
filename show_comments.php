<?php
  $query = "SELECT descripcion_pregunta, fecha_pregunta, userPhoto, userName, userId, id_respuesta, descripcion_respuesta, fecha_respuesta, p.id_pregunta
            FROM Pregunta AS p INNER JOIN Usuario AS u ON(p.userMail=u.userMail)
                               INNER JOIN Favor AS f ON(p.favorId=f.favorId)
                               LEFT JOIN Respuesta AS r ON (r.id_pregunta=p.id_pregunta)
            WHERE p.favorId='$_REQUEST[id]'
            ORDER BY fecha_pregunta";
  if (mysqli_multi_query($con, $query) or die (mysqli_error($con))) {
    do {
      if ($resultado = mysqli_use_result($con)) {
        while ($row = mysqli_fetch_row($resultado)) {
          echo '
          <li class="media">
          <a class="pull-left" href="#">
            <img class="media-object img-circle" src="uploads/'.$row[2].'" alt="profile">
          </a>
          <div class="media-body">
            <div class="well well-lg">
                <h4 class="media-heading text-uppercase reviews">'.$row[3].'</h4>
                <ul class="media-date text-uppercase reviews list-inline">
                  <li>'.$row[1].'</li>
                </ul>
                <p class="media-comment">
                  '.$row[0].'
                </p>';
                if (isset($_SESSION['userMail'])) {//que quien responda este logueado
                  if ($_SESSION['userMail']==$datos['userMail']) {//que quien responda sea el dueño de la gauchada
                    if (is_null($row[5])) {//que quien responda no responda dos veces
                      echo'<form action=\'responder_comentario.php?id_pregunta='.$row[8].'&id='.$_REQUEST['id'].'\' method=\'post\'>
                        <input size=40 required type="text" name="respuesta" placeholder="Acá va tu respuesta">
                        <button class="btn btn-info btn-circle text-uppercase" type="submit" id="reply"><span class="glyphicon glyphicon-share-alt"></span>Responder</button>
                      </form>';
                    }
                  }
                }
                if (!empty($row[6])) {
                	echo '<a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#reply'.$row[5].'"><span class="glyphicon glyphicon-comment"></span>Respuesta</a>';
            
		echo'   </div>
          </div>

          <div class="collapse" id="reply'.$row[5].'">
              <ul class="media-list">
                  <li class="media media-replied">
                      <a class="pull-left" href="#">
                        <img class="media-object img-circle" src="uploads/'.$datos['userPhoto'].'" alt="profile">
                      </a>
                      <div class="media-body">
                        <div class="well well-lg">
                            <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span>'.$datos['userName'].'</h4>
                            <ul class="media-date text-uppercase reviews list-inline">
                              <li>'.$row[7].'</li>
                            </ul>
                            <p class="media-comment">
                              '.$row[6].'
                            </p>
                        </div>
                      </div>
                  </li>
              </ul>
          </div>
          </li>         
          ';
          }
        }
        mysqli_free_result($resultado);
      }
    } while (mysqli_next_result($con));
  }
?>
