			
			<form id="login_form1" class="form-signin" method="post">
				<h3 class="form-signin-heading">
					<i class="icon-lock"></i> Login Dulu
				</h3>
				<input type="text"      class="input-block-level"   id="username" name="username" placeholder="Username" required>
				<input type="password"  class="input-block-level"   id="password" name="password" placeholder="Password" required>
				
				<button data-placement="right" title="Klik Disini untuk Login" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Masuk</button>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#signin').tooltip('show');
				$('#signin').tooltip('hide');
				});
				</script>		
			</form>
						<script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true_admin')
									{
									$.jGrowl("Sebentar Sabar......", { sticky: true });
									$.jGrowl("Welcome to Sistem Marketing PT.SBK", { header: 'Login Berhasil' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'admin/index.php'  }, delay);  
									}else if (html == 'true'){
										$.jGrowl("Welcome to Sistem Marketing PT.SBK", { header: 'Login Berhasil' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'sales/index.php'  }, delay);  
									}else
									{
									$.jGrowl("Mohon Cek Username dan Password Anda", { header: 'Login Gagal' });
									}
									}
								});
								return false;
							});
						});
						</script>
			