<html>
<head>
<title>Packages having Features </title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<h1 class = 'text-center' style='margin-top:100px;'>Add Feature</h1><br>

</head>

<body>

<div class='container'>


	<div class='row '>

		<div class="col-md-4"></div>
		<div class='col-md-4'>
<?php echo validation_errors();?>
<form class= 'submitform' id='myform' method="post">
<p><b>Select Feature</b></p>
<select class="form-control" id="feature" name="feature" placeholder='Features'>
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
  <label for="silver">Silver</label><br><br>

  <input type="submit" id='btnSubmit' class='btn btn-info btn-sm' name='save' value="add feature"><span>
  <a href='index' class='btn btn-info btn-sm' >Back</a>
</form>
</div>
</div>
</div>

<script>

  $().ready(function()
{

  $("#myform").validate({
            rules: {
                package:
                {
                required:true,

             },

           },

             messages: {

              package:

                 {

                 required: 'Please select package',
               },

             },
   });

    });

  </script>
</body>
</html>