<?php
$idMooc;
$idChap;

 if (isset($_GET['idM']) && isset($_GET['idC'])) {
	$idMooc = $_GET['idM'];
	$idChap = $_GET['idC'];	

	//afficheChapitreExos($idMooc,$idChap,$bdd,0);													
	//echo $idMooc;
}else{
	$valid = 0;
	echo'erreur';
}
?>
<div class="row">
<div class="row">


		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2> Cours </h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a>
								</li>
								<li><a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<!-- Cours -->
					<h4><b>Nom prénom</b></h4>
					<div>
						Le nom et le prénom doit être placé en début de CV, plutôt en haut et à gauche ou en haut centré. <br>
						Mettre le nom et le prénom est indispensable, sauf si un CV anonyme est demandé. De toute façon il aura soit la lettre de motivation soit votre mail pour savoir qui vous êtes. <br>
						Evitez de mettre la mention du nom avant le prénom. Le nom mis en capitale surtout pour ceux qui ont un nom qui peut être un prénom ou lorsque vos nom et prénom sont à consonance étrangère méconnue.<br>			
					</div>
					<h4><b>Adresse</b></h4>
					<div>
						Eviter de mettre la ville tout en capitale, peu d'intérêt d'attirer le regard. <br>
						Cette information est indispensable mais moins prioritaire, en dehors de savoir où vous habitez par rapport au lieu de travail. Les premières actions sont traitées par téléphone ou mail sauf parfois pour vous informer (quand ils le font) d'une fin de non recevoir. <br>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2> Exemple </h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a>
								</li>
								<li><a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<!-- Cours -->
					<div class="col-sm-4 invoice-col">
                     <address>
                           	<strong>Iron Admin, Inc.</strong>
                           	<br>795 Freedom Ave, Suite 600
                           	<br>New York, CA 94107
                           	<br>Phone: 1 (804) 123-9876
                           	<br>Email: ironadmin.com
                        </address>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
				<?php
					nomChapitre($idMooc,$bdd,$idChap);
				?>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a>
								</li>
								<li><a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">


					<!-- Smart Wizard -->
					<h3>Exercices</h3>
					<div id="wizard" class="form_wizard wizard_horizontal">
						<?php
							creationWizardStep($idMooc,$idChap,$bdd);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

