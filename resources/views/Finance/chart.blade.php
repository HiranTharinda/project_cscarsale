@extends('layouts.adminapp')
@section('chart-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

@endsection
@section('content')

<div class="container">
    <canvas id="myChart"></canvas>
  </div>


  




  <script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'horizontalBar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Sedans', 'Minivans', 'Vans', 'Hatchb-backs', 'Wagons', 'Trucks'],
        datasets:[{
          label:'Sold amount',
          data:[
            61,
            8,
            15,
            10,
            1,
            45
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(79, 202, 255, 0.7)',
            'rgba(42, 51, 56, 0.7)',
            'rgba(79, 202, 255, 0.7)',
            'rgba(42, 51, 56, 0.7)',
            'rgba(79, 202, 255, 0.7)',
            'rgba(42, 51, 56, 0.7)',
            'rgba(79, 202, 255, 0.7)'

          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Last Month Sales',
          FontFamily:"Arial",
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
@endsection
