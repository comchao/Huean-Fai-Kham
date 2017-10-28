<div id="id01" class="modal">
							  <form class="modal-content animate" action="secure/login.php" method="post"> 
							    <div class="imgcontainer">
							      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
							      <img src="popup/img_avatar2.png" alt="Huean Fai Kham" class="avatar">
							    </div>

							    <div class="container">
							      <label><b>Username</b></label>
							      <br>
							      <input type="text" placeholder="Enter Username" name="uname" required>
							      <br>

							      <label><b>Password</b></label>
							      <br>
							      <input type="password" placeholder="Enter Password" name="psw" required>
							       
							      <br>
							      <br>
							      <button type="submit" value="เข้าสู่ระบบ">Login</button>
							    </div>
							    
							  </form>
							</div>

							<script>
							// Get the modal
							var modal = document.getElementById('id01');

							// When the user clicks anywhere outside of the modal, close it
							window.onclick = function(event) {
							    if (event.target == modal) {
							        modal.style.display = "none";
							    }
							}
							</script>
