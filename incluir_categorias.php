<?php
	include 'config.php';
	$query = "SELECT * FROM Categoria AS c";
  echo '<div class="form-group"><label class="control-label" for="categoria">Categoria</label><select id="categoria" required="required" name="categoria" class="form-control">';
	if (mysqli_multi_query($con, $query) or die (mysqli_error($con))) {
		do {
			if ($resultado = mysqli_use_result($con)) {
				while ($row = mysqli_fetch_row($resultado)) {
          echo '<option value="'.$row[0].'">'.$row[1].'</option>';
				}
				mysqli_free_result($resultado);
			}
		} while (mysqli_next_result($con));
	}
  echo '</select></br>';
?>
