@extends('layouts.app')

@section('content')
  <div class="px-8 md:px-10 lg:px-6 xl:px-4 pt-14 mt-4 max-w-[1440px] w-full mx-auto pb-10  bg-black">
    <div class="mt-20">
        <livewire:actual-exhibition/>
        <livewire:past-exhibitions/>
    </div>
  </div>
@endsection