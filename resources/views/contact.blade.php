@extends('layouts.app')

@section('content')
{{-- {{var_dump($final_views[0])}} --}}
<div class="container mt-5">


    <div class="row d-flex justify-content-center">
        
        <div class="col-md-9">
            
            <div class="card p-3 py-4">
                
                        <div class="text-center">
                            <img src="{{asset('storage/contacts/user.png')}}" width="100" class="rounded-circle">
                        </div>
                        
                        <div class="text-center mt-3">
                            <h3 class="mt-2 mb-0">{{$contact->first_name}} {{$contact->middle_name}} {{$contact->last_name}}</h3>
                        </div>

                        <div>
                            <ul>
                            <li class="pb-2">Mobile : {{$contact->mobile}}</li>
                            <li class="pb-2">Landline : {{$contact->landline}}</li>
                            <li class="pb-2">Email : {{$contact->email}}</li>
                            <li class="pb-2">Created At : {{$contact->created_at}}</li>
                            <li class="pb-2">Edited At : {{$contact->edited_at}}</li>
                            <li class="pb-2">Number of Views : {{$contact->views}}</li>
                            </ul>
                        </div>
                                     
                        <div class="px-4 mt-1">
                            <span>Note :</span>
                            <p class="text-wrap">{{$contact->notes}}</p>
                        
                        </div>
                        
                        <div class="buttons text-center">
                            
                            <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-outline-primary">Edit</a>
                        </div>
                    

                    
                </div>
                
                <div class="card p-3 py-4 mt-3">
                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                </div>
                
                
            </div>

            
        </div>
        
    </div>

    
            {{-- <div id="columnchart_material" style="width: 800px; height: 500px;"></div> --}}
   
</div>



@endsection

@section('page-level-scripts')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dates', 'Views'],
          ['27-03-2023', <?php echo $final_views[0]?>],
          ['26-03-2023', <?php echo $final_views[1]?>],
          ['25-03-2023', <?php echo $final_views[2]?>],
          ['24-03-2023', <?php echo $final_views[3]?>],
          ['23-03-2023', <?php echo $final_views[4]?>],
          ['22-03-2023', <?php echo $final_views[5]?>],
          ['21-03-2023', <?php echo $final_views[6]?>],
        ]);


        var options = {
          chart: {
            title: 'Total views in the past 7 days',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

@endsection