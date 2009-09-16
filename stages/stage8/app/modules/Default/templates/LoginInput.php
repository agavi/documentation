<div id="box">
	<h2><?php echo $t['_title']; ?></h2>
	<form id="login" action="<?php echo $ro->gen('login'); ?>" method="post">
		<?php if (isset($t['errors']) && sizeof($t['errors']) !== 0): ?>
		<ul id="errors">
			<?php foreach($t['errors'] as $error): ?>
				<li><?php echo $error['message']; ?></li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
		<fieldset>
			<div class="form-row">
				<div class="form-label">
					<label for="username">Username</label>
				</div>
				<div class="form-control">
					<input type="text" id="username" name="username" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">
					<label for="password">Password</label>
				</div>
				<div class="form-control">
					<input type="password" id="password" name="password" />
				</div>
			</div>
			<div class="form-row-nolabel">
				<input type="checkbox" id="remember" name="remember" value="remember" />
				<label for="remember">Stay Signed in for a Week</label>
			</div>
		</fieldset>
		<fieldset>
			<div class="form-row-nolabel">
				<input type="submit" name="login" value="Log in" />
			</div>
		</fieldset>	
	</form>
</div>