<!DOCTYPE html>
<html ng-app="myApp">

<head>
  <meta charset="UTF-8">
  <title>Formulario con AngularJS</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
</head>

<body ng-controller="FormController">

  <h1>Formulario con AngularJS</h1>

  <form ng-submit="submitForm()">
    <label for="name">Nombre:</label>
    <input type="text" id="name" ng-model="formData.name" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" ng-model="formData.email" required>

    <button type="submit">Enviar</button>
  </form>

  <div>
    <h2>Datos del formulario:</h2>
    <p>Nombre: {{ formData.name }}</p>
    <p>Correo electrónico: {{ formData.email }}</p>
  </div>

  <script>
    angular.module('myApp', [])
      .controller('FormController', function($scope) {
        $scope.formData = {};

        $scope.submitForm = function() {
          // Mostrar los datos en un mensaje de alerta
          var message = "Nombre: " + $scope.formData.name + "\nCorreo electrónico: " + $scope.formData.email;
          var name = $scope.formData.name;
          var email2 = $scope.formData.email;
          alert(message);
        };
      });
  </script>
  <?php
        $name22 = "<script> document.writeln(name); </script>"; // igualar el valor de la variable JavaScript a PHP 

        $email22 = "<script> document.writeln(email2); </script>"; // igualar el valor de la variable JavaScript a PHP 

        echo $name22;
        echo $email22;   // muestra el resultado 

    ?>




<form action="save_data.php" method="POST">
<input type="text" name="caja_valor" id="caja_valor" value="">
<input type="submit" value="Guardar">
</form>
</html>

<script>
let valor = 4;
document.getElementById("caja_valor").value = valor;
</script>

</body>

</html>