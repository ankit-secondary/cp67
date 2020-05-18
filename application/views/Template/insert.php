<html>
<head>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Packages having Features </title>
<h1 class = 'text-center' style='margin-top:100px;'>Add Feature</h1><br>
<style type="text/css" media="screen">
.submitform{
    border:3px solid #f1f1f1;
    padding: 15px;
    border-radius: 10px;

 }
</style>
</head>

<body>

<div class='container'>


	<div class='row '>

		<div class="col-md-4"></div>
		<div class='col-md-4'>
<form class= 'submitform' method="post">
<p><b>Select Feature</b></p>
<select class="form-control" id="feature" name="feature" placeholder='Features' required="true">
  <option value="0">Add unlimited users</option>
  <option value="1">Remove users</option>
  <option value="2">Access to change data</option>
  <option value="3">Block Users</option>
</select>
<br>
<p><b>Select Packages</b></p>
 <input type="checkbox" id="package" name="package[]" value='Premium'>
  <label for="premium">Premium</label><span>
  <input type="checkbox" id="package" name="package[]" value="Gold">
  <label for="gold">Gold</label><span>
  <input type="checkbox" id="package" name="package[]" value="Silver">
  <label for="ailver">Silver</label><br><br>

<span id="spnError" class="error" style="display: none">Please select at-least one Fruit.</span>
<br />
  <input type="submit" id='btnSubmit' class='btn btn-info btn-sm' name='save' value="add feature">
</form>
</div>
</div>
</div>
</body>
