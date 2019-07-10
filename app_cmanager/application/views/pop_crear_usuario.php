<div class="container-fluid">
    <br>
	<section class="card form-wizard" id="w4">
		<div class="card-body">
			<div class="wizard-progress wizard-progress-lg">
				<div class="steps-progress">
					<div class="progress-indicator"></div>
				</div>
				<ul class="nav wizard-steps">
					<li class="nav-item active">
						<a class="nav-link" href="#w4-account" data-toggle="tab"><span>1</span>Nombres</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#w4-profile" data-toggle="tab"><span>2</span>Datos Basicos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#w4-billing" data-toggle="tab"><span>3</span>Credenciales</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#w4-confirm" data-toggle="tab"><span>4</span>Confirmación</a>
					</li>
				</ul>
			</div>

			<form class="form-horizontal p-3" novalidate="novalidate">
				<div class="tab-content">
					<div id="w4-account" class="tab-pane active">
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="w4-username">Nombres</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input type="text" class="form-control" name="username" id="w4-username" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="w4-password">Apellidos</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input class="form-control" name="password" id="w4-password" required>
								</div>
							</div>
						</div>
					</div>
					<div id="w4-profile" class="tab-pane">
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="w4-first-name">Cedula</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-align-left"></i>
									</span>
									<input type="text" class="form-control" name="first-name" id="w4-first-name" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="w4-last-name">Fecha Nacimiento</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="date" class="form-control" name="last-name" id="w4-last-name" required>
								</div>
							</div>
						</div>
					</div>
					<div id="w4-billing" class="tab-pane">
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="w4-cc">Usuario</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user-plus"></i>
									</span>
									<input type="text" class="form-control" name="cc-number" id="w4-cc" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="inputSuccess">Password</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-expeditedssl"></i>
									</span>
									<input class="form-control" name="exp-month" required type="password" id="password" required minlength="6">
								</div>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="inputSuccess">Confirmar Password</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-expeditedssl"></i>
									</span>
									<input class="form-control" name="exp-year" required required type="password" id="conf_password" required minlength="6">
								</div>
							</div>
						</div>
					</div>
					<div id="w4-confirm" class="tab-pane">
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="w4-email">Email</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input type="text" class="form-control" name="email" id="w4-email" required>
								</div>
							</div>
						</div>
						<!--<div class="form-group row">
							<div class="col-sm-3"></div>
							<div class="col-sm-9">
								<div class="checkbox-custom">
									<input type="checkbox" name="terms" id="w4-terms" required>
									<label for="w4-terms">Estoy de acuerdo con los terminos del servicio</label>
								</div>
							</div>
						</div>-->
					</div>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<ul class="pager">
				<li class="previous disabled">
					<a><i class="fa fa-angle-left"></i> Previous</a>
				</li>
				<li class="finish hidden float-right">
					<a onclick="insert_user();" data-dismiss="modal">Finish</a>

				</li>
				<li class="next">
					<a>Next <i class="fa fa-angle-right"></i></a>
				</li>
			</ul>
		</div>
	</section>
</div>

<!-- Specific Page Vendor -->
<script src="<?=base_url()?>vendor/jquery-validation/jquery.validate.js"></script>
<script src="<?=base_url()?>vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<script src="<?=base_url()?>vendor/pnotify/pnotify.custom.js"></script>

<!-- Examples -->
<script src="<?=base_url()?>js/examples/examples.wizard.js"></script>