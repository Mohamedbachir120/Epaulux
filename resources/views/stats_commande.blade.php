
@extends('layouts.app')


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

          <br>
      
<h3> Statistiques des Commandes par rapport aux types Disponibles </h3>


<div>
    
      
        <div id="can">
            <script>
                $(document).ready(function(){
                            var ctx = document.getElementById('myChart').getContext('2d');
                            
                        var myChart = new Chart(ctx, {
                                type: 'pie',
                            data: {
                                labels: [@foreach ($table2 as $item => $value)  '{{ $item }}', @endforeach],
                                datasets: [{
                                    label: 'Valeur de productions',
                                    data: [@foreach ($table2 as $item => $value)  {{ $value }}, @endforeach],
                                    backgroundColor: [
                                        'rgba(255, 99, 132 )',
                                        'rgba(54, 162, 235 )',
                                        'rgba(255, 206, 86 )',
                                        'rgba(75, 192, 192 )',
                                        'rgba(153, 102, 255 )',
                                        'rgba(255, 100, 64 )',
                                        'rgba(255, 159, 12 )',
                                        'rgba(255, 159, 64 )',
                                        'rgba(30, 159, 64 )',
                                        'rgba(60, 159, 64 )',
                                        'rgba(10, 70, 64 )',
                                        'rgba(64, 10, 70 )',
                                        'rgba(10, 0, 0 )',
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                        });
                
                </script>
             

           
    <canvas id="myChart" style="max-width: 800px; max-height:400px; margin-left:20%;" ></canvas>
        </div>
  
      </div>
        </div>
</div>    
    
@endsection