<html>
<head>
<title>Packages having Features </title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<h1 class = 'text-center' style='margin-top:100px;'>Add Feature</h1><br>

</head>

<body>

<div class='container'>
</br>
</br>
<?php echo validation_errors();?>

<div align='right' style='margin-bottom: 5px;'>
  <button type='button' name='add' id='add' class='btn btn-success btn-xs'>Add feature</button>
</div>
</br>
<form method='post' id='feature_form'>
  <div class='table-responsive'>
    <table class='table table-striped
    table-bordered' id='feature_data'>
    <tr>
      <th>Feature</th>
      <th>Package</th>
      <th>Remove</th>
    </tr>
  </table>
</div>
<div align='center'>
  <input type ='submit' name='insert' id='insert'
  class='btn btn-primary' value='addfeature'/>
  </div>
</form>
</br/>
</div>
<div id='feature_dialog' title='Add Data'>
  <div class='form-group'>
<label>Select Feature</label>
<select class="form-control" id="feature" name="feature">
  <option value="0">Add unlimited users</option>
  <option value="1">Remove users</option>
  <option value="2">Access to change data</option>
  <option value="3">Block Users</option>

</select>

</div>
<span id='error_feature' class='text-danger'></span>
<br/>
<div class='form-group'>
  <input type="hidden" id="package">
 <label><input type="checkbox" id="package" name="package1" value= "Premium">Premium</label><br>

 <label> <input type="checkbox" id="package" name="package2" value= "Gold">Gold</label><br>

  <label><input type="checkbox" id="package" name="package3" value= "Silver">Silver</label><br>

  <span id='error_package' class='text-danger'></span>
</div>
<div class='form-group' align='center'>
<input type='hidden' name='row_id' value='hidden_row_id'/>
<button type='button' name='save' id='save' class='btn btn-info'>Save</button>
  </div>
</div>
<div id='action_alert' title='Action'>
  </div>



<script>
  $(document).ready(function()
{
  var count = 0;

  $('#feature_dialog').dialog(

{
 autoOpen:false,
 width:400

});

  $('#add').click(function()
{

  $('#feature_dialog').dialog('option','title','Add Data');

  $('#feature').val('');
  $('#package').val('');
  $('#error_feature').text('');
  $('#error_package').text('');
  $('#feature').css('border-color','');
  $('#package').css('border-color','');
  $('#save').text('save');
  $('#feature_dialog').dialog('open');

});


  $('#save').click(function()
{
var package = [];


            $.each($("input[type='checkbox']:checked"), function(){

                package.push($(this).val());
            });

  var error_feature='';
  var error_package='';
  var feature='';
  seperator=',';
packagedata=package.join(seperator);




  if($('#feature').val()== null)
  {
     error_feature = 'Please select feature';
     $('#error_feature').text(error_feature);
     $('#feature').css('border-color','#cc0000');
     feature='';
  }
  else
  {
     error_feature='';
     $('#error_feature').text(error_feature);
     $('#feature').css('border-color','');
     feature=$('#feature').val();



  }

  if(packagedata== '')
  {
     error_package = 'Please select package';
     $('#error_package').text(error_package);
     $('#package').css('border-color','#cc0000');
     package='';
  }
  else
  {
     error_package='';
     $('#error_package').text(error_package);
     $('#package').css('border-color','');
     package=packagedata;


  }

  if(error_feature !== '' || error_package !== '')
  {

    return false;
  }

  else
  {
    if($('#save').text() =='save')
  {


    count=count+1;
    output = '<tr id="row_'+count+'">';
    output+='<td>'+feature+'<input type="hidden" name="hidden_feature[]" id="feature'+count+'"class="feature" value="'+feature+'"/></td>';
     output+='<td>'+package+'<input type="hidden" name="hidden_package[]" id="package'+count+'"class="package" value="'+package+'"/></td>';
      output+='<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
      output+='</tr>';
      $('#feature_data').append(output);

  }
  $('#feature_dialog').dialog('close');

  }

});

  $(document).on('click','.remove_details',function()
{
 var row_id = $(this).attr("id");

 if(confirm('Are you sure about this?'))
 {
   $('#row_'+row_id+'').remove();

 }
 else
 {
  return false;
 }


   });

});
</script>
</body>
</html>