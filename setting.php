<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fasttekno LCC</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./assets/js/script.js"></script>
</head>
<?php
  include "./controller/config.php";
  $config = new Config;
?>
<body>
  <div id="loading" style="z-index: 1999;" class="flex items-center justify-center w-full h-screen fixed top-0 left-0 bg-[#00000077] hidden">
    <div class="inline-block h-8 w-8 animate-[spinner-grow_0.75s_linear_infinite] rounded-full bg-current align-[-0.125em] text-neutral-100 opacity-0 motion-reduce:animate-[spinner-grow_1.5s_linear_infinite]" role="status">
      <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
    </div>
  </div>
  <div class="container mx-auto px-12 py-8">
    <h6 class="text-2xl font-bold">Setting</h6>
    <h6 class="text-sm text-gray-500 my-3">Visit realtime score preview page <a href="/" class="text-blue-400 font-semibold underline" target="_blank">click here</a>.</h6>
    <!--Tabs navigation-->
    <ul class="mb-2 flex list-none flex-row flex-wrap border-b-0 pl-0" role="tablist" data-te-nav-ref>
      <li role="presentation">
        <a href="#tabs-home" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate data-[te-nav-active]:bg-neutral-100 focus:isolate  data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-home" role="tab" aria-controls="tabs-home" aria-selected="false">
          Teams
        </a>
      </li>
      <li role="presentation">
        <a href="#tabs-profile" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate data-[te-nav-active]:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-profile" role="tab" aria-controls="tabs-profile" aria-selected="true" data-te-nav-active>
          Score
        </a>
      </li>
    </ul>

    <!--Tabs content-->
    <div class="mb-6 w-full">
      <div class="hidden w-full opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab">
        <?php include './components/teams.php'; ?>
      </div>
      <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab" data-te-tab-active>
        <?php include './components/score.php'; ?>
      </div>
      <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-messages" role="tabpanel" aria-labelledby="tabs-profile-tab">
        Tab 3 content
      </div>
      <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-contact" role="tabpanel" aria-labelledby="tabs-contact-tab">
        Tab 4 content
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
  <!-- <script src="./assets//js/teams.js"></script> -->
</body>

</html>