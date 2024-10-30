<?php
$_error = NULL;
if (array_key_exists('error', $_REQUEST)) {
	$_error = $_REQUEST['error'];
}
?>
<div class="wrap">
	<header>
	<a href="https://wefoster.co/"><img src="<?php echo plugins_url($this->getPluginLogo(), __FILE__); ?>" width="180px" /></a>
  <p class="poweredBy u-pull-right"><a href="http://blogvault.net"><img src="<?php echo plugins_url('../assets/img/blogvault-logo-120.png', __FILE__); ?>" width="140px"/></a></p>
	</header>

	<hr/>
	<div class="row">

		<div class="seven columns">
			<form id="wefoster_migrate_form" dummy=">" action="<?php echo $this->bvmain->appUrl(); ?>/home/migrate" onsubmit="document.getElementById('migratesubmit').disabled = true;" method="post" name="signup">
				<h1>Migrate Your Community to the WeFoster Platform</h1>
        <p>WeFoster Automated Migrations allows you to easily migrate your WordPress site to the WeFoster platform.</p>
        <p>Visit your MyWeFoster Dashboard to quickly find the information required to start the migration.<a href="https://my.wefoster.co">Visit MyWeFoster</a></p>

<?php if ($_error == "email") {
	echo '<div class="error" style="padding-bottom:0.5%;"><p>There is already an account with this email.</p></div>';
} else if ($_error == "blog") {
	echo '<div class="error" style="padding-bottom:0.5%;"><p>Could not create an account. Please contact <a href="http://blogvault.net/contact/">blogVault Support</a><br />
		<font color="red">NOTE: We do not support automated migration of locally hosted sites.</font></p></div>';
} else if (($_error == "custom") && isset($_REQUEST['bvnonce']) && wp_verify_nonce($_REQUEST['bvnonce'], "bvnonce")) {
	echo '<div class="error" style="padding-bottom:0.5%;"><p>'.base64_decode($_REQUEST['message']).'</p></div>';
}
?>
				<input type="hidden" name="bvsrc" value="wpplugin" />
				<input type="hidden" name="migrate" value="wefoster" />
				<input type="hidden" name="type" value="sftp" />
				<input type="hidden" name="web_protocol" value="https://" />
<?php echo $this->siteInfoTags(); ?>
				<div class="row">
						<div class="six columns">
								<label id='label_email'>Email</label>
								<input class="u-full-width" type="text" id="email" name="email">
								<p class="help-block"></p>
						</div>
						<div class="six columns">
								<label class="control-label" for="input02">WeFoster Platform Site URL</label>
								<input type="text" class="u-full-width" name="newurl" placeholder="eg. mycommunity.wefoster-platform.co">
					</div>
				</div>
				<div class="row">
					<div class="four columns">
						<label class="control-label" for="input01">SFTP Username</label>
								<input type="text" class="u-full-width" name="username">
								<p class="help-block"></p>
					</div>
					<div class="four columns">
						<label class="control-label" for="input02">SFTP Password</label>
								<input type="password" class="u-full-width" name="passwd">
					</div>
					<div class="four columns">
          	<label class="control-label" for="inputip">SFTP Port</label>
						<input type="text" class="u-full-width" placeholder="eg. 3256" name="port">
						<p class="help-block"></p>
          </div>
				</div>
				<hr/>
				<div>
					<input type="checkbox" name="consent" onchange="document.getElementById('migratesubmit').disabled = !this.checked;" value="1"/>I agree to Blogvault <a href="https://blogvault.net/tos" target="_blank" rel="noopener noreferrer">Terms of Service</a> and <a href="https://blogvault.net/privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>
				</div>
					<br><input type='submit' disabled id='migratesubmit' value='Start Community Migration' class="button button-primary">
			</form>
		</div>
		<div class="five columns">
    	<h1>We're here to help!</h1>
      <div style="padding:10px; background-color:#FFF; margin-top:15px;">
			<img src="<?php echo plugins_url('../assets/img/plugin-db-772.png', __FILE__); ?>" width="100%"/>
      	<p><i>For full instructions and solutions to common errors, please visit our <a href="https://wefoster.helpscoutdocs.com/collection/1-wefoster-platform">WeFoster Platform Knowledgebase</a></i></p>
      </div>
    </div>
	</div><!--row end-->
</div><!-- wrap ends here -->