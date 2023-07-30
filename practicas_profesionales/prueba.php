<?php
include "config.php";
?>
<!doctype html>
<html>
<head>
<title>Llenar SELECT con jQuery: Ejemplo completo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script type="text/javascript">
$(document).ready(function(){

$("#sel_depart").change(function(){
var deptid = $(this).val();

$.ajax({
url: 'getUsers.php',
type: 'post',
data: {depart:deptid},
dataType: 'json',
success:function(response){

var len = response.length;

$("#sel_user").empty();
for( var i = 0; i<len; i++){
var id = response[i]['id'];
var name = response[i]['name'];

$("#sel_user").append("<option value='"+id+"'>"+name+"</option>");

}
}
});
});

});
</script>


<script>
$(document).ready(function () {
var data = [
{ "name": "Bob", "customerName": "Bob" },
{ "name": "Mike", "customerName": "Mike" }
];
for (var index = 0; index <= data.length; index++) {
$('#customerNameList').append('<option value="' + data[index].name + '">' + data[index].customerName + '</option>');
}
});
</script>

</head>
<body>
<div class="container">
<div class="card">
<div class="card-header text-white" style="background-color: #00AA9E;">Llenar SELECT con jQuery: Ejemplo completo </div>
<div class="card-body" style=" border:1px solid #00AA9E">
<div>Departamentos </div>
<select class="form-control" id="sel_depart">
<option value="0">- Seleccione -</option>
<?php
// llamamos a los registros
$sql_department = "SELECT * FROM department";
$department_data = mysqli_query($con,$sql_department);
while($row = mysqli_fetch_assoc($department_data) ){
$departid = $row['id'];
$depart_name = $row['depart_name'];

// Opciones con registros
echo "<option value='".$departid."' >".$depart_name."</option>";
}
?>
</select>
<div class="clear"></div>
<hr>
<div>Usuarios </div>
<select class="form-control" id="sel_user">
<option value="0">- Seleccione -</option>
</select>
<select id="customerNameList" name="customer">
<option value="John">John</option>
<option value="David">David</option>
</select>
</div>
</div>
</div>
</body>
</html>