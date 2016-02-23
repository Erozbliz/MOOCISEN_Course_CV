


<br />

<div class="row">
<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Form Wizards <small>Sessions</small></h2>
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
					<p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
					<div id="wizard" class="form_wizard wizard_horizontal">
						<ul class="wizard_steps">
							<li>
								<a href="#step-1">
									<span class="step_no">1</span>
									<span class="step_descr">
							Step 1<br />
							<small>Step 1 description</small>
						</span>
								</a>
							</li>
							<li>
								<a href="#step-2">
									<span class="step_no">2</span>
									<span class="step_descr">
							Step 2<br />
							<small>Step 2 description</small>
						</span>
								</a>
							</li>
							<li>
								<a href="#step-3">
									<span class="step_no">3</span>
									<span class="step_descr">
							Step 3<br />
							<small>Step 3 description</small>
						</span>
								</a>
							</li>
							<li>
								<a href="#step-4">
									<span class="step_no">4</span>
									<span class="step_descr">
							Step 4<br />
							<small>Step 4 description</small>
						</span>
								</a>
							</li>
						</ul>
						<div id="step-1">
							<form class="form-horizontal form-label-left">

							   <div class="chapitre">
							<div class="panel-body" style="display: block;">
								<?php 
								//include '../../_include/connect.inc.php';
								//include '../../_model/requeteMooc.php';
								//include '../../_model/Qcm.php';
								
								$idMooc;
								$idChap;
								
								 if (isset($_GET['idM']) && isset($_GET['idC'])) {
									$idMooc = $_GET['idM'];
									$idChap = $_GET['idC'];	

									//chapitresplusSousPartie($idMooc,$bdd);
									afficheChapitreExos($idMooc,$idChap,$bdd,0);													
									//echo $idMooc;
								}else{
									$valid = 0;
									echo'erreur';
								}
								
								
								?>
							</div>                          
						</div>    
							</form>

						</div>
						<div id="step-2">
							<h2 class="StepTitle">Step 2 Content</h2>
							<p>
								do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>
						<div id="step-3">
							<h2 class="StepTitle">Step 3 Content</h2>
							<p>
								sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>
						<div id="step-4">
							<h2 class="StepTitle">Step 4 Content</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>

					</div>
					<!-- End SmartWizard Content -->





				   

					<!-- End SmartWizard Content -->


				</div>
			</div>
		</div>

	</div>




</div>

