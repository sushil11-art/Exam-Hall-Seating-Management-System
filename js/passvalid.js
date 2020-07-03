function fun(){

					var a = document.getElementById("enter_pass");
					var b = document.getElementById("enter_retype_pass");

					if(a!=b) {
				document.getElementById("pass_error").innerHTML="  password do not match ! ! "; 			
						location.href='admin-signup.php';
							return false;	
							}else{
				document.getElementById("pass_error").innerHTML="   "; 			
								location.href='admin_form_insert.php';
								return true;
							}
				}