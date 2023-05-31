<?php
  if(isset($_POST["createTeam"])){
    $config->createTeam(["datas" => $_POST, "files" => $_FILES]);
  }else if(isset($_POST["editTeam"])){
    $config->editTeam(["datas" => $_POST, "files" => $_FILES]);
  }
?>
<table class="teams mt-4" width="100%">
  <thead>
    <tr>
      <td class="text-center w-0">#</td>
      <td>Team</td>
      <td class="w-[200px]">Actions</td>
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
            <div class="">
              <?= $data["name"] ?><br>
              <small><?= $data["organization"] ?></small>
            </div>
          </td>
          <td style="white-space: nowrap;">
            <button class="bg-[#52BD95] py-2 text-xs font-semibold text-white px-6 rounded mr-1" data-te-toggle="modal" data-te-target="#modalEditTeam" data-te-ripple-init data-te-ripple-color="light" onclick="showEditForm(<?= $data["id"] ?>, '<?= $data["name"] ?>', '<?= $data["organization"] ?>', '<?= $data["logo"] ?>')">Edit</button>
            <button class="bg-[#D14343] py-2 text-xs font-semibold text-white px-6 rounded" data-te-ripple-init data-te-ripple-color="light" onclick="handleDelete(<?= $data["id"] ?>, '<?= $data["name"] ?>')">Delete</button>
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
<div class="flex justify-center">
  <button class="border border-[#52BD95] py-2 text-xs font-semibold text-[#52BD95] px-6 rounded mr-1 mt-4" data-te-toggle="modal" data-te-target="#modalAddTeam" data-te-ripple-init data-te-ripple-color="light">Create Team</button>
</div>

<!-- Modal -->
<div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="modalAddTeam" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
    <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
          <!--Modal title-->
          <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
            Create Team
          </h5>
          <!--Close button-->
          <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
  
        <!--Modal body-->
        <div data-te-modal-body-ref class="relative p-4">
          <div class="input-group">
            <h6 class="text-sm">Team Name *</h6>
            <h6 class="text-xs text-gray-400 mb-2 mt-1">The team name is required.</h6>
            <input type="text" name="name" autocomplete="off" required>
          </div>
          <div class="input-group">
            <h6 class="text-sm">Team Organization *</h6>
            <h6 class="text-xs text-gray-400 mb-2 mt-1">The team organization is required.</h6>
            <input type="text" name="organization" autocomplete="off" required>
          </div>
          <div class="input-group">
            <h6 class="text-sm">Team Logo *</h6>
            <h6 class="text-xs text-gray-400 mb-2 mt-1">The team logo is required.</h6>
            <input type="file" name="logo" autocomplete="off" required>
          </div>
        </div>
  
        <!--Modal footer-->
        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
          <button type="button" class="inline-block rounded bg-primary-100 px-6 py-2 text-xs font-medium uppercase leading-normal text-[#D14343] border border-[#D14343] transition duration-150 ease-in-out" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
            Cancel
          </button>
          <button type="submit" name="createTeam" class="ml-1 inline-block rounded bg-[#52BD95] px-6 py-2 text-xs font-medium uppercase leading-normal text-white border border-[#52BD95]" data-te-ripple-init data-te-ripple-color="light">
            Create
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="modalEditTeam" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
    <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
          <!--Modal title-->
          <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
            Edit Team
          </h5>
          <!--Close button-->
          <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!--Modal body-->
        <div data-te-modal-body-ref class="relative p-4">
          <div class="input-group">
            <h6 class="text-sm">Team Name *</h6>
            <h6 class="text-xs text-gray-400 mb-2 mt-1">The team name is required.</h6>
            <input type="text" name="name" id="editTeamName" autocomplete="off" required>
          </div>
          <div class="input-group">
            <h6 class="text-sm">Team Organization *</h6>
            <h6 class="text-xs text-gray-400 mb-2 mt-1">The team organization is required.</h6>
            <input type="text" name="organization" id="editTeamOrganization" autocomplete="off" required>
          </div>
          <div class="input-group">
            <h6 class="text-sm">Team Logo *</h6>
            <h6 class="text-xs text-gray-400 mb-2 mt-1">The team logo is required, Max. 2 MB.</h6>
            <input type="file" name="logo" autocomplete="off">
          </div>
          <input type="hidden" name="id" id="editTeamId">
          <input type="hidden" name="old_logo" id="editTeamOldLogo">
        </div>

        <!--Modal footer-->
        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
          <button type="button" class="inline-block rounded bg-primary-100 px-6 py-2 text-xs font-medium uppercase leading-normal text-[#D14343] border border-[#D14343] transition duration-150 ease-in-out" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
            Cancel
          </button>
          <button type="submit" name="editTeam" class="ml-1 inline-block rounded bg-[#52BD95] px-6 py-2 text-xs font-medium uppercase leading-normal text-white border border-[#52BD95]" data-te-ripple-init data-te-ripple-color="light">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="./assets/js/teams.js"></script>