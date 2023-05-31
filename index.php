<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Realtime Rank</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<style>
  .teams>div {
    transition: .3s;
    top: -5rem;
  }

  .pos-1 {
    top: 0rem !important;
  }

  .pos-2 {
    top: 5rem !important;
  }

  .pos-3 {
    top: 10rem !important;
  }

  .pos-4 {
    top: 15rem !important;
  }
</style>

<body>
  <div class="container mx-auto px-12 py-8">
    <h6 class="text-2xl font-bold">Lomba Cerdas Cermat - SMA</h6>
    <h6 class="text-sm text-gray-500 my-3">Fasttekno 2023 - BEM ITB STIKOM BALI</h6>
    <div class="mt-8 flex">
      <div class="min-w-[6rem]">
        <div class="w-16 h-16 bg-[#008EDE] mb-4 rounded-lg flex items-center justify-center">
          <h6 class="font-extrabold text-xl text-white">1</h6>
        </div>
        <div class="w-16 h-16 bg-[#F3BB65] mb-4 rounded-lg flex items-center justify-center">
          <h6 class="font-extrabold text-xl text-white">2</h6>
        </div>
        <div class="w-16 h-16 bg-[#DCD9D6] mb-4 rounded-lg flex items-center justify-center">
          <h6 class="font-extrabold text-xl text-white">3</h6>
        </div>
        <div class="w-16 h-16 bg-[#AF4A34] mb-4 rounded-lg flex items-center justify-center">
          <h6 class="font-extrabold text-xl text-white">4</h6>
        </div>
      </div>
      <div class="relative w-full teams overflow-hidden">

        <div id="team1" class="absolute pos-1 w-full h-16 mb-4 flex items-center justify-between">
          <div class="flex items-center">
            <img id="team1Logo" src="./assets/img/nothing.png" alt="" class="w-16 h-16 object-contain" style="">
            <div class="ml-6">
              <h6 class="font-extrabold text-lg mb-1" id="team1Name">Loading...</h6>
              <h6 class="text-gray-500 text-sm" id="team1Organization">Loading...</h6>
            </div>
          </div>
          <h6 class="font-extrabold text-3xl" id="team1Point">0</h6>
        </div>

        <div id="team2" class="absolute pos-2 w-full h-16 mb-4 flex items-center justify-between">
          <div class="flex items-center">
            <img id="team2Logo" src="./assets/img/nothing.png" alt="" class="w-16 h-16 object-contain" style="">
            <div class="ml-6">
              <h6 class="font-extrabold text-lg mb-1" id="team2Name">Loading...</h6>
              <h6 class="text-gray-500 text-sm" id="team2Organization">Loading...</h6>
            </div>
          </div>
          <h6 class="font-extrabold text-3xl" id="team2Point">0</h6>
        </div>

        <div id="team3" class="absolute pos-3 w-full h-16 mb-4 flex items-center justify-between">
          <div class="flex items-center">
            <img id="team3Logo" src="./assets/img/nothing.png" alt="" class="w-16 h-16 object-contain" style="">
            <div class="ml-6">
              <h6 class="font-extrabold text-lg mb-1" id="team3Name">Loading...</h6>
              <h6 class="text-gray-500 text-sm" id="team3Organization">Loading...</h6>
            </div>
          </div>
          <h6 class="font-extrabold text-3xl" id="team3Point">0</h6>
        </div>

        <div id="team4" class="absolute pos-4 w-full h-16 mb-4 flex items-center justify-between">
          <div class="flex items-center">
            <img id="team4Logo" src="./assets/img/nothing.png" alt="" class="w-16 h-16 object-contain" style="">
            <div class="ml-6">
              <h6 class="font-extrabold text-lg mb-1" id="team4Name">Loading...</h6>
              <h6 class="text-gray-500 text-sm" id="team4Organization">Loading...</h6>
            </div>
          </div>
          <h6 class="font-extrabold text-3xl" id="team4Point">0</h6>
        </div>

      </div>
    </div>
    <script src="./assets/js/index.js"></script>
</body>

</html>