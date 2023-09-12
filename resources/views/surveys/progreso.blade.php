<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <h1 class="centrar-h1"> ESTATUS DE PROGRESO</h1>
  <div class= "opcion">
    <div class="container">
       <h1>HOMBRE DEL CUESTIONARIO:</h1>
       <div class="for"><h1> frutas preferidas</h1></div>
       <div class="menuBottones">
        <input type="submit" class="botones2" name="agregar" id="agregar_encuesta" value="ver lista" onclick=" location.href='{{route('survey.index')}}'">
        <input type="submit" class="botones2" name="agregar" id="agregar_encuesta" value="Regresar" onclick=" location.href='{{route('survey.index')}}'">
      </div>

    </div>
    <div class="container">
       <h1>FECHA Y HORA DE VIGENCIA:</h1>
       <div class="for"><h1>12/23/4 13:00 pm</h1></div>
       <div class="menuBottones">
        <input type="submit" class="botones2" name="agregar" id="agregar_encuesta" value="ver encuesta" onclick=" location.href='{{route('survey.index')}}'">
        <input type="submit" class="botones2" name="agregar" id="agregar_encuesta" value="eliminar" onclick=" location.href='{{route('survey.index')}}'">
      </div>
    </div>
  </div>
  <div class="grafica3">
  <canvas id="canvas" height=60></canvas>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById('canvas').getContext('2d');

var myChart = new Chart(ctx, {
  type: 'horizontalBar',
  data: {
    labels: ['mazana','uva' ,'sandia','mango','fresa'],
    datasets: [{
      backgroundColor: ["green","red","purple","yellow","blue"],
      data: [5.5,3,5.2,4.2,4.2]
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        display: true,
        barPercentage: 1,
        ticks: {
          min: 0,
          max: 10
        }
      }, {
        display: false,
      }]
    }
  }
});
  </script>
</div>
<div class="grafica3">
    <canvas id="canvas2" height="60"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById('canvas2').getContext('2d');

      var myChart = new Chart(ctx, {
        type: 'scatter', // Cambiamos el tipo de gráfico a "scatter"
        data: {
          labels: ['manzana', 'uva', 'sandia', 'mango', 'fresa'],
          datasets: [{
            label: 'Puntos',
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: [{
              x: 5.5,
              y: 2
            }, {
              x: 3,
              y: 3
            }, {
              x: 5.2,
              y: 4
            }, {
              x: 4.2,
              y: 1
            }, {
              x: 4.2,
              y: 5
            }]
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              type: 'linear', // Eje x es lineal en un gráfico de puntos
              position: 'bottom',
              ticks: {
                min: 0,
                max: 10
              }
            }],
            yAxes: [{
              type: 'linear', // Eje y es lineal en un gráfico de puntos
              ticks: {
                min: 0,
                max: 10
              }
            }]
          }
        }
      });
    </script>

</div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>