<div class="container-fluid">
    <br>
	<section class="card form-wizard" id="w4">
		<div class="card-body">
			<form class="form-horizontal p-3" novalidate="novalidate">
				<div id="w4-billing" class="tab-pane">
					<h3 class="name font-weight-semibold"><?php echo $_SESSION['nombres'];?> - <?php echo $_SESSION['usuario'];?></h3>
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="inputSuccess">Clave Actual</label>
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
							<label class="col-sm-3 control-label text-sm-right pt-1" for="inputSuccess">Nueva Clave</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-expeditedssl"></i>
									</span>
									<input class="form-control" name="exp-month" required type="password" id="n_password" required minlength="6">
								</div>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-1" for="inputSuccess">Confirmar nueva Clave</label>
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
			</form>

			<button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="enviarcambiarclave()">Cambiar Clave</button>

		</div>


				

	</section>
</div>

