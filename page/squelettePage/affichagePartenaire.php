<?php if(!(isset($_POST['editionpartenaire'])&&$_SESSION['gererPageDiverse']&&$_SESSION['gererPageDiverse']==true)){
			echo '<table class="partenaire">';
			$colonne = 0;
			foreach ($listPartenaire as $data){  //affichage classique
				if ($colonne == 0){echo '<tr>';}
				echo '<td><img class="imagepartenaire" src="'.$pathPicture.$data->getImage().'"/><br/><a href="'.$data->getLien().'">'.$data->getNom().'</a></td>';
				if ($colonne == 2){echo '</tr>';$colonne =0;} else {$colonne ++;}
			}
			if ($colonne != 0){echo '</tr>';}
			echo '</table>';
			if(isset($_SESSION['gererPageDiverse'])&&$_SESSION['gererPageDiverse']==true){
				echo '<form action="partenaire.php" method="POST"><input type="hidden" name="editionpartenaire" value="true"/><input type="submit" value="Editer les partenaires"></form>';
			}
		}
		else{ //MODE EDITION
			echo '<table class="partenaire" >';
			$colonne = 0;
			foreach ($listPartenaire as $data){ 
				if ($colonne == 0){echo '<tr>';}
				echo '<tr><td><img class="imagepartenaire" src="'.$pathPicture.$data->getImage().'"/><br/><a href="'.$data->getLien().'">'.$data->getNom().'</a>';
				echo '<form action="editerpartenaire.php" method="POST"><input type="hidden" name="partenaire" value="'.$data->getImage().'"/><input type="submit" value="Editer ce partenaire"/></form>';
				echo '<form action="editerpartenaire.php" method="POST"><input type="hidden" name="image" value="'.$data->getImage().'"/><input type="hidden" name="suppartenaire" value="'.$data->getNom().'"/><input type="submit" value="Supprimer ce partenaire"/></form></td>';
				if ($colonne == 2){echo '</tr>';$colonne =0;} else {$colonne ++;}
			} 
			
			if ($colonne != 0){echo '</tr>';}
			echo '</table>';
		}
?>