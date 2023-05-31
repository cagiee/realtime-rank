<?php
  // if(isset($_POST["editTeamPoint"])){
  //   $config->editTeamPoint(["datas" => $_POST]);
  // }
?>

<div class="flex justify-between">
  <div class="w-[calc(50%-.5rem)]">
    <h4 class="font-bold">Add</h4>
    <div class="input-group mt-4">
      <h6 class="text-sm">Point</h6>
      <h6 class="text-xs text-gray-400 mb-2 mt-1">The number of points you want to add to the team.</h6>
      <input type="number" value="0" id="addPoint">
    </div>
    <div class="input-group mt-4">
      <h6 class="text-sm">Method</h6>
      <h6 class="text-xs text-gray-400 mb-2 mt-1">Method of adding points to the team.</h6>
      <div class="flex">
        <div class="mr-4">
          <input class="mr-1" type="radio" name="addMethod" value="plus" id="addMethodPlus" checked>
          <label for="addMethodPlus" class="text-sm">Plus</label>
        </div>
        <div class="">
          <input class="mr-1" type="radio" name="addMethod" value="times" id="addMethodTimes">
          <label for="addMethodTimes" class="text-sm">Times</label>
        </div>
      </div>
    </div>
  </div>
  <div class="w-[calc(50%-.5rem)]">
    <h4 class="font-bold">Subtract</h4>
    <div class="input-group mt-4">
      <h6 class="text-sm">Point</h6>
      <h6 class="text-xs text-gray-400 mb-2 mt-1">The number of points you want to subtract from the team.</h6>
      <input type="number" value="0" id="subtractPoint">
    </div>
    <div class="input-group mt-4">
      <h6 class="text-sm">Method</h6>
      <h6 class="text-xs text-gray-400 mb-2 mt-1">Method of deducting points to the team.</h6>
      <div class="flex">
        <div class="mr-4">
          <input class="mr-1" type="radio" name="subtractMethod" value="plus" id="subtractMethodMinus" checked>
          <label for="subtractMethodMinus" class="text-sm">Minus</label>
        </div>
        <div class="">
          <input class="mr-1" type="radio" name="subtractMethod" value="times" id="subtractMethodDivide">
          <label for="subtractMethodDivide" class="text-sm">Divide</label>
        </div>
      </div>
    </div>
  </div>
</div>

<table class="teams mt-4" width="100%">
  <thead>
    <tr>
      <td class="text-center w-0">#</td>
      <td>Team</td>
      <td class="w-[150px]">Point</td>
      <td class="w-[100px]">Actions</td>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = mysqli_query($config->con, "SELECT * FROM teams");
    $i = 0;
    while ($data = mysqli_fetch_assoc($sql)) {
      ?>
        <tr>
          <td class="text-center"><?= ++$i ?></td>
          <td class="flex items-center">
            <img src="./assets/img/<?= $data["logo"] ?>" class="w-8 h-8 mr-4" style="object-fit: cover;" alt="">
            <?= $data["name"] ?>
          </td>
          <td><?= number_format($data["point"]) ?></td>
          <td style="white-space: nowrap;">
            <button onclick="setModalForm('<?= $data['id'] ?>', '<?= $data['name'] ?>', '<?= $data['point'] ?>', 'add')" class="bg-[#52BD95] py-2 text-xs font-semibold text-white px-6 rounded mr-1" data-te-toggle="modal" data-te-target="#modalAction" data-te-ripple-init data-te-ripple-color="light">Add</button>
            <button onclick="setModalForm('<?= $data['id'] ?>', '<?= $data['name'] ?>', '<?= $data['point'] ?>', 'subtract')" class="bg-[#D14343] py-2 text-xs font-semibold text-white px-6 rounded mr-1" data-te-toggle="modal" data-te-target="#modalAction" data-te-ripple-init data-te-ripple-color="light">Subtract</button>
          </td>
        </tr>
      <?php
    }
    if (mysqli_num_rows($sql) == 0) {
      ?>
        <tr>
          <td colspan="99" class="text-sm text-center text-gray-500">No teams available</td>
        </tr>
      <?php
    }
    ?>
  </tbody>
</table>

<div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="modalAction" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
    <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
      <form action="javascript:;" method="post" onsubmit="handleSubmit(this)" name="form-action">
        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
          <!--Modal title-->
          <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
            Add or Subtract Point
          </h5>
          <!--Close button-->
          <button type="button" id="close-modal-form-action" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
  
        <!--Modal body-->
        <div data-te-modal-body-ref class="relative p-4">
          <div class="input-group">
            <h6 class="text-sm">Team Name *</h6>
            <h6 class="text-xs text-gray-400 mb-2 mt-1">The team name is readonly.</h6>
            <input type="text" id="formActionTeam" autocomplete="off" readonly>
            <input type="hidden" name="id" id="formActionId">
            <input type="hidden" name="point" id="formActionPoint">
          </div>
          <div class="w-64 mx-auto">
            <div class="flex justify-between items-center">
              <div class="w-full" align="left">
                <h6 class="text-xs text-gray-500">From</h6>
                <h6 id="oldPoint" class="text-4xl font-bold">0</h6>
              </div>
              <svg id="addLogo" width="40" height="20" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-4">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 0H12C11.45 0 11 0.45 11 1C11 1.55 11.45 2 12 2H12.59L8.8 5.78L5.45 4.11V4.12C5.31 4.05 5.16 4 5 4C4.84 4 4.69 4.05 4.56 4.11V4.1L0.56 6.1V6.11C0.23 6.28 0 6.61 0 7C0 7.55 0.45 8 1 8C1.16 8 1.31 7.95 1.44 7.89V7.9L5 6.12L8.55 7.9V7.89C8.69 7.95 8.84 8 9 8C9.28 8 9.53 7.89 9.71 7.71L14 3.41V4C14 4.55 14.45 5 15 5C15.55 5 16 4.55 16 4V1C16 0.45 15.55 0 15 0Z" fill="#52BD95"/>
              </svg>
              <svg id="subtractLogo" width="40" height="20" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-4">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 3C14.45 3 14 3.45 14 4V4.59L9.71 0.29C9.53 0.11 9.28 0 9 0C8.84 0 8.69 0.05 8.56 0.11V0.1L5 1.88L1.45 0.11V0.12C1.31 0.05 1.16 0 1 0C0.45 0 0 0.45 0 1C0 1.39 0.23 1.72 0.56 1.89V1.9L4.56 3.9V3.89C4.69 3.95 4.84 4 5 4C5.16 4 5.31 3.95 5.44 3.89V3.9L8.8 2.22L12.59 6H12C11.45 6 11 6.45 11 7C11 7.55 11.45 8 12 8H15C15.55 8 16 7.55 16 7V4C16 3.45 15.55 3 15 3Z" fill="#D14343"/>
              </svg>
              <div class="w-full" align="right">
                <h6 class="text-xs text-gray-500">To</h6>
                <h6 id="newPoint" class="text-4xl font-bold">100</h6>
              </div>
            </div>
          </div>
        </div>
  
        <!--Modal footer-->
        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
          <button type="button" class="inline-block rounded bg-primary-100 px-6 py-2 text-xs font-medium uppercase leading-normal text-[#D14343] border border-[#D14343] transition duration-150 ease-in-out" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
            Cancel
          </button>
          <button type="submit" name="editTeamPoint" class="ml-1 inline-block rounded bg-[#52BD95] px-6 py-2 text-xs font-medium uppercase leading-normal text-white border border-[#52BD95]" data-te-ripple-init data-te-ripple-color="light">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="./assets/js/score.js"></script>