@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="flex flex-col items-center justify-center min-h-screen bg-[#FAF5E9] p-4 pt-24">

    <!-- Div Dipsionary -->
    <div class="bg-[#C3B58E] text-center p-6 rounded-xl max-w-3xl mb-6">

      <!-- Logo di atas -->
      <img src="{{ asset('images/logo-dipsionary.png') }}" alt="Dipsionary Logo" class="w-[522.7px] h-[142px] object-contain mb-6 mx-auto">

      <!-- Paragraf penjelasan -->
      <p class="text-[17px] leading-relaxed text-[#535049]">
        Website Dipsionary merupakan Kamus Daring yang dibuat untuk memudahkan pencarian, penggunaan, dan pembacaan arti kata dalam dunia perkuliahan di Universitas Diponegoro. Berbeda dengan beberapa situs web sejenisnya, kami berusaha memberikan berbagai fitur lebih, seperti markah dan riwayat pencarian.
      </p>

    </div>

    <!-- Card Umum & Dips -->
    <!-- Card Umum -->
    <a href= "#">
    <div class="max-w-3xl w-full grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="bg-[#C3B58E] p-4 rounded-lg">
        <h2 class="font-semibold text-[17px] mb-2 text-[#535049]">Umum</h2>
        <p class="text-[17px] text-[#535049]">Mata kuliah, Dosen, Magang, …</p>
      </div>
    <a\>
    <!-- Card Dips! -->
    <a href= "#">
      <div class="bg-[#C3B58E] p-4 rounded-lg">
        <h2 class="font-semibold text-[17px] mb-2 text-[#535049]">Dips!</h2>
        <p class="text-[17px] text-[#535049]">Dipyo, Ganeo, ODM, SIAP, …</p>
      </div>
    </div>
    <a\>

</div>
@endsection
