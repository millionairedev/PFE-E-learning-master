<a href="{{route('thread.show', $notification->data['thread']['id'])}}">

    {{$notification->data['user']['name']}} A commenté sur <strong> {{$notification->data['thread']['subject']}}</strong>
</a>
