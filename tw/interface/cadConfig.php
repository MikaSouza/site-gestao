<?php 
$namePage = 'config';
$titlePage = 'Configurações';
require_once '../app/header.php'; 
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Configurações</h2>
			<span class="icon"></span>
		</div>
		<form class="form-default" name="formConfig" method="POST">
			<fieldset>
				<legend>E-mail</legend>
				<div class="form-group">
					<label for="vSCFGHOST">E-mail host</label>
					<input type="text" class="form-control" id="vSCFGHOST" name="vSCFGHOST" placeholder="E-mail host" title="E-mail host" value="<?= $fill['CFGHOST']; ?>">
				</div>
				<div class="form-group">
					<label for="vSCFGEMAILENVIO">E-mail de envio</label>
					<input type="email" class="form-control" id="vSCFGEMAILENVIO" name="vSCFGEMAILENVIO" placeholder="E-mail de envio" title="E-mail de envio" value="<?= $fill['CFGEMAILENVIO']; ?>">
				</div>
				<div class="form-group">
					<label for="vSCFGSENHAEMAIL">Senha do E-mail de envio</label>
					<input type="password" class="form-control" id="vSCFGSENHAEMAIL" name="vSCFGSENHAEMAIL" placeholder="Senha do E-mail de envio" title="Senha do E-mail de envio" value="<?= $fill['CFGSENHAEMAIL']; ?>">
				</div>
				<div class="form-group">
					<label for="vSCFGEMAILRECEBIMENTO">E-mail de recebimento</label>
					<input type="email" class="form-control" id="vSCFGEMAILRECEBIMENTO" name="vSCFGEMAILRECEBIMENTO" placeholder="E-mail de recebimento" title="E-mail de recebimento" value="<?= $fill['CFGEMAILRECEBIMENTO']; ?>">
				</div>
				<div class="form-group">
					<label for="vSCFGPORT">Porta</label>
					<input type="text" class="form-control" id="vSCFGPORT" name="vSCFGPORT" placeholder="Porta" title="Porta" value="<?= $fill['CFGPORT']; ?>">
				</div>
				<div class="form-group">
					<label for="vSCFGCRIPTOGRAFIA">Criptografia</label>
					<select name="vSCFGCRIPTOGRAFIA" id="vSCFGCRIPTOGRAFIA" class="form-control" title="Criptografia">
						<option value="tls" <?php if($fill['CFGCRIPTOGRAFIA'] == 'tls') echo 'selected'; ?>>tls</option>
						<option value="ssl" <?php if($fill['CFGCRIPTOGRAFIA'] == 'ssl') echo 'selected'; ?>>ssl</option>
					</select>
				</div>
			</fieldset>
			<fieldset>
				<legend>Google Recaptcha</legend>
				<div class="form-group">
					<label for="vSCFGRECAPTCHASITEKEY">Data-sitekey</label>
					<input type="text" class="form-control" id="vSCFGRECAPTCHASITEKEY" name="vSCFGRECAPTCHASITEKEY" placeholder="Data-sitekey" title="Data-sitekey" value="<?= $fill['CFGRECAPTCHASITEKEY']; ?>">
				</div>
				<div class="form-group">
					<label for="vSCFGRECAPTCHASECRETKEY">Secret key</label>
					<input type="text" class="form-control" id="vSCFGRECAPTCHASECRETKEY" name="vSCFGRECAPTCHASECRETKEY" placeholder="Secret key" title="Secret key" value="<?= $fill['CFGRECAPTCHASECRETKEY']; ?>">
				</div>
			</fieldset>
			<fieldset>
				<legend>Google Maps</legend>
				<div class="form-group">
					<label for="vSCFGGOOGLEMAPSKEY">Api Key</label>
					<input type="text" class="form-control" id="vSCFGGOOGLEMAPSKEY" name="vSCFGGOOGLEMAPSKEY" placeholder="Api Key" title="Api Key" value="<?= $fill['CFGGOOGLEMAPSKEY']; ?>">
				</div>
			</fieldset>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" name="vICFGCODIGO" value="<?= $fill['CFGCODIGO']; ?>">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php require_once '../app/footer.php'; ?>