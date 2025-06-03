@extends('layouts.app')

@section('content')
  <div class="container-kobbi md:px-0 pt-14 mx-auto pb-10 ">
    <h2 class="header-title-spacing text-3xl text-gray-950 font-light">EXPOSIÇÕES</h2>
    <div class="">
        <livewire:actual-exhibition/>
        <livewire:past-exhibitions/>
    </div>
    <div class="mt-10 pt-10">
        <livewire:newsletter-form />
    </div>
  </div>
@endsection