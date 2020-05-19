<html>
<head>
<title>Packages having Features </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

<h1 class = 'text-center' style='margin-top:100px;'>Update Features</h1>


</head>


<body>

	<div class='container'>


	<div class='row '>

		<div class="col-md-4"></div>
		<div class='col-md-4'>

<!-- TO Show the validation error-->

<?php echo validation_errors();?>

<?php
$i = 1;
foreach ($data as $row):?>
<form class='submitform' method="post">

<p><b>Update Feature</b>
<select class="form-control" id="feature" name="feature" placeholder='Features'>
<option value="0">Add unlimited users</option>
<option value="1">Remove users</option>
<option value="2">Access to change data</option>
<option value="3">Block Users</option>

</select>

<br>
<p><b>Update Packages</b></p>
<input type="checkbox" id="package" name="package[]" value='Premium'>
<label for="premium">Premium</label><span>
<input type="checkbox" id="package" name="package[]" value="Gold">
<label for="gold">Gold</label><span>
<input type="checkbox" id="package" name="package[]" value="Silver">
<label for="ailver">Silver</label><br><br>												 <input type="submit" class ='btn btn-primary btn-sm'name='update' value="update feature"><span>
	<a href='index' class='btn btn-info btn-sm' >Back</a>
<?php endforeach;?>
</div>
</div>
</div>
</body>
</html>