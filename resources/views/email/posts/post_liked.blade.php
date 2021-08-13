@component('mail::message')
# أحدهم اعجب بمنشورك

{{ $liker->name }} اعجب بمنشور لك

@component('mail::button', ['url' => route('posts.show', $post)])
عرض المنشور
@endcomponent

شكراً لك<br>
{{ config('app.name') }}
@endcomponent