 @extends('Admin.main_admin')

@section('content')
<div class="container">
  
            
                <div class="card-header">Chartes</div>

                <div class="container card">
    <div class="row">
        <div class="col-md-4">
          <h2>{{ $chart1->options['chart_title'] }}</h2>
                    {!! $chart1->renderHtml() !!}
        </div>
        <div class="col-md-4">
           <h2>{{ $chart2->options['chart_title'] }}</h2>
                    {!! $chart2->renderHtml() !!}
        </div>
        <div class="col-md-4">
        <h2>{{ $chart3->options['chart_title'] }}</h2>
                    {!! $chart3->renderHtml() !!}

        </div>
    </div>
</div>

             

            
      
</div>
@endsection

@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}

{!! $chart1->renderJs() !!}
{!! $chart2->renderJs() !!}
{!! $chart3->renderJs() !!}
@endsection