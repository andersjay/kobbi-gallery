@extends('layouts.app')

@section('content')
  <div class="container px-8 md:px-0 pt-14 mt-4w-full mx-auto pb-10 bg-black">
    <div class="">
        <livewire:actual-exhibition/>
        <livewire:past-exhibitions/>
    </div>
  </div>
@endsection