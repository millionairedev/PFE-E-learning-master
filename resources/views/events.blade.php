@extends('layouts.front')

@section('category')
 
@endsection

@section('content')



<div class="container">
<div class="response"></div>
<div id='calendar'></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
$(document).ready(function () {
var SITEURL = "{{url('/')}}";
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var calendar = $('#calendar').fullCalendar({
editable: false,
events: SITEURL + "/fullcalendareventmaster",
displayEventTime: true,
editable: false,
eventRender: function (event, element, view) {
if (event.allDay === 'true') {
event.allDay = true;
} else {
event.allDay = false;
}
},
selectable: false,
selectHelper: false,



});
});

</script>

@endsection