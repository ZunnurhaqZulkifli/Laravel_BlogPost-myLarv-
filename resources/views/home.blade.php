@extends('layout')

@section('title' , 'Home Page')

@section('content')

{{-- <img src="https://static.wixstatic.com/media/431fca_3d1fc35d344a4b148204e39414bbb051~mv2.png/v1/fill/w_490,h_769,al_c,q_90,usm_0.66_1.00_0.01,
    enc_auto/431fca_3d1fc35d344a4b148204e39414bbb051~mv2.png" alt="a fimiliar face" style="width:50px;height:80px;"> --}}
<div class="container">
  <p class="display-1 text-light mb-0">{{ __('messages.Main Home') }}</p>
   
    <hr class="text-orange">
      <p class="text-light">{{ __('messages.A wide variety of things and items, feel free to click some buttons') }}</p>

      @guest
        <p class="text-light">{{ __('messages.example_with_value', ['name'=> $user ]) }}</p>  
      @endguest
      
      @auth
        <p class="text-light">{{ __('messages.example_with_value', ['name' => $user->name]) }} !</p>  
      @endauth
          
        
      <p class="text-light">{{ trans_choice('messages.plural', 0) }}</p>
      <p class="text-light">{{ trans_choice('messages.plural', 1) }}</p>
      <p class="text-light">{{ trans_choice('messages.plural', 2) }}</p>


      <p class="text-light">Using JSON {{ __('Main Home') }}</p>
      <p class="text-light">Using JSON {{ __('Testing') }}</p>

      <p class="text-light">Using JSON: {{ __('Hello :name', ['name' => 'Zunnur']) }}</p>

      

      {{-- <div class="card bg-transparent">
        <a href="{{ route('contect') }}" class="text-dark">This is a link to your contact</a>
      </div> --}}
    
      
    {{-- @include('components.proc') --}}

</div>

@endsection('content')