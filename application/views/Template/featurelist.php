<html>

<head>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Packages having Features </title>
<h1 class = 'text-center' style='margin-top:100px;'>Packages Having Features</h1>
</head>

<body>
	<div class='container' style='margin-top:50px;'>


	<div class='row '>

		<div class="col-md-3"></div>
		<div class='col-md-8'>

<table class='table table-hover table-white'>
	<a href='addfeature' class='btn btn-info btn-sm' >Add feature</a>
  <tr>
    <th>Sr No</th>
    <th>Packages</th>
    <th>Feature</th>
	<th>Actions</th>

  </tr>
<?php
$i = 1;
foreach ($data as $row):?>
<tr>
	<td><?php echo $i;?></td>
<td>
<?php echo $row->package;?>
</td>

	<td>
<?php if (($row->feature) == 0) {
	echo '  Add unlimited users';
}

if (($row->feature) == 1) {
	echo ' Remove users';
}

if (($row->feature) == 2) {
	echo 'Access to change data';
}

if (($row->feature) == 3) {
	echo 'Block users';
}

?>
</td>
<?php echo "<td><a href='updatefeature?id=".$row->id."' class='btn btn-success btn-sm'>Update</a>
       <a href='deletefeature?id=".$row->id."' class='btn btn-info btn-sm'>Delete</a>
	</td>";?>
</tr>
<?php $i++;?>
<?php endforeach;?>

</table>
</div>
</div>
</div>
</body>