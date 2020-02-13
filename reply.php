<!DOCTYPE HTML>

<Html>
	
	<head>
		
		<h2>
			Talk to us

		</h2>
	</head>



	<body>
		


		<form name="Contact form" id="cform" method="post"  action="engine.php" >




			<div class ="row">

				<div class ="col-sm-6 form-group">
					<label for="From">

						From : 
					</label>
					<input type="int" name="From" maxlength="50">
				</div>

				<br></br>




			<div class ="row">

				<div class ="col-sm-6 form-group">
					<label for="To">

						To : 
					</label>
					<input type="int" name="To" maxlength="50">
				</div>

<br></br>


				<div class="row">

					<div class ="col-sm-12 form-group">
						<label for="message">

						</label>

								<textarea class="form-control"  type="textarea" id="message" name="message"  placeholder="enter message" maxlength="6000"
						rows="8"  required>
					</textarea>

				</div>

				 <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-lg btn-success btn-block" id="okButton">Send </button>
                </div>
            </div>
			




		</form>
	</body>
</Html>

  