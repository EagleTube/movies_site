<?php if(!defined('DVD_PATH'))
   {
    die(header("HTTP/1.1 500 Internal Server Error"));
   }  
   else{
     ?>
<section id='request_form'>
<div class="wrapper">
			<div class="inner">
				<form action="" method="POST" enctype="multipart/form-data">
					<h3 style="font-size:23px;font-family:'Orbitron';text-align:center;">Request Your Movie</h3>
					<p>Cant find your desired movies? Request with us and our team will get in touch with you soon!.</p>
					<label class="form-group">
						<input type="text" name="name" class="form-control"  required>
						<span>Your Name</span>
						<span class="border"></span>
					</label>
					<label class="form-group">
						<input type="text" name="mvname" class="form-control"  required>
						<span>Movie Name</span>
						<span class="border"></span>
					</label>
					<label class="form-group">
						<input type="text" name="email" class="form-control"  required>
						<span for="">Your Mail</span>
						<span class="border"></span></br>
					<label style="color:#00ff00;" class="form-group">Upload your Movie Picture:
                    <input id='upload' type="file" name="image"></label>
					<input type='hidden' name='act' value='EAGLE'>
					<button>Submit</button>
				</form>
			</div>
		</div>
</section>
<?php
	require_once "request_process.php";
   }
   ?>

