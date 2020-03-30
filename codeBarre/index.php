<?php 
require 'header.php';
$suiteChif = [];
$total = 0;
$numeros = [
	'Numéro 01',
	'Numéro 02',
	'Numéro 03',
	'Numéro 04',
	'Numéro 05',
	'Numéro 06',
	'Numéro 07',
	'Numéro 08',
	'Numéro 09',
	'Numéro 10',
	'Numéro 11',
	'Numéro 12'
];
?>

<form action"/index.php" method="POST">
	<?php foreach ($numeros as $numero){?>
		<div align="center" >
			<label><?= $numero ?></label>
			<input type="text" name="numero[]" value="">
			<?php } ?>
			<br><input type="submit" value="Valider" class="btn btn-primary">
		</div>
</form>

<?php
if (isset($_POST['numero'])){
	
	foreach($_POST['numero'] as $numero){
		if(isset($numeros[$numero]) || is_int($numeros[$numero])){
			$suiteChif[] = $numero;
		}
		else {
			?><div class="alert alert-danger">
			<?php echo "Vous n'avez pas rempli correctement le formulaire"; ?>
			</div><?php
			die;
		}
	}
	
	for ($i =0; $i < 12; $i++){
		if ($i%2==1){
			$suiteChif[$i] = $suiteChif[$i]*3;
			}
	}
	$total = array_sum($suiteChif);
	$reste=$total%10;
	if ($reste==0){
		$cle = $reste;
	}
	else{
		$cle=10-$reste;
	}
	?>
	<div class="alert alert-success">
	<?php echo "La clé du 13e chiffre est : " . $cle; ?>
	</div>
<?php
}
?>