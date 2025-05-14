@extends('layouts.app')

@section('content')
  <div class="container px-8 md:px-0 pt-14 mt-4w-full mx-auto pb-10 ">
    <div class="">
        <livewire:actual-exhibition/>
        <livewire:past-exhibitions/>
    </div>
    <div class="mt-10 border-t border-[#D1D1D1] pt-10">
        <livewire:newsletter />
    </div>
  </div>
@endsection