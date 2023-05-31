(function () {
  // if (isLoading) {

  // }
})();

async function handleDelete(id, name, logo) {
  const swal = await Swal.fire({
    icon: 'warning',
    title: 'Warning!',
    text: `The team "${name}" will permanently deleted. Are you sure want to delete this team?`,
    showCancelButton: true,
    confirmButtonText: 'Delete',
    confirmButtonColor: '#D14343'
  })

  if (swal.isConfirmed) {

    toggleLoading("on");
    const xml = new XMLHttpRequest();
    xml.open('post', './controller/?action=delete_team', true);
    xml.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    await xml.send(`id=${id}`);
    xml.onreadystatechange = await function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "success") {
          location.href = "setting.php";
        } else {
          console.log(this.responseText);
        }
      }
    };
    toggleLoading("off");
  }
}

function showEditForm(id, name, organization, oldLogo) {
  const inputId = document.getElementById('editTeamId');
  const inputName = document.getElementById('editTeamName');
  const inputOrganization = document.getElementById('editTeamOrganization');
  const inputOldLogo = document.getElementById('editTeamOldLogo');

  inputId.value = id
  inputName.value = name
  inputOrganization.value = organization
  inputOldLogo.value = oldLogo
}