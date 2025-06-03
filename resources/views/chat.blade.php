@extends('layouts.app')

@section('content')
<div id="app">
    <chat-component 
        :users='@json($users ?? [])' 
        :auth-user='@json(auth()->user())' 
        :messages='@json($messages ?? [])'>
    </chat-component>
</div>
@endsection
