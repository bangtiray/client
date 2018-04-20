<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <h1 style="text-align: center;">Daftar Bentaran <br>Buat Dapetin Token</h1>
    <div class="row">
    	<div class="col-md-4"></div>
    	<div class="col-md-4">
    		<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">@</span>
				  </div>
				  <input type="text" id="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
				</div>
    		<button class="btn btn-sm btn-danger" id="btn-reg">Get Token</button>
    	</div>
    	<div class="col-md-4"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#btn-reg').click(function(){
	    			var Stringdata={
	    					email : $('#email').val()
	    				}
	    		$.ajax({
	    			url:"<?php echo site_url() ?>welcome/daftar",
	    			data:Stringdata,
	    			type: 'POST',
	    			cache:false,
	    			success:function(data){
	    				 var obj = $.parseJSON(data);
	    				if(obj.status == true){
                            swal("Good job!", "token udah ane kirim ke email ente ya, Di Cek Dulu Dah!", "success");
	    					
	    				}else{
	    					swal("Ohh No!", "Cek Email Masih kosong, Di Cek Dulu Dah!", "error");
	    				}
	    			}
	    		})
    		})
    	})
    </script>
  </body>
</html>