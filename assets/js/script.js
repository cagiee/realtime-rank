var isLoading = false;

function toggleLoading(request) {
  if (request) {
    isLoading = request == "on" ? true : isLoading
    isLoading = request == "off" ? false : isLoading
  } else {
    isLoading = !isLoading
  }

  const loading = document.getElementById("loading")
  !isLoading ? loading.classList.add('hidden') : loading.classList.remove('hidden')
}