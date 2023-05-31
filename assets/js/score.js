var modalFormAction = "add"

function setModalForm(id, team, point, action = null) {
  const inputId = document.getElementById("formActionId")
  const inputTeam = document.getElementById("formActionTeam")
  const inputPoint = document.getElementById("formActionPoint")

  inputId.value = id
  inputTeam.value = team
  newPoint = 0
  point = parseInt(point)

  if (action) {
    modalFormAction = action
    const addPoint = parseInt(document.getElementById("addPoint").value)
    const addMethodPlus = document.getElementById("addMethodPlus").checked
    const addMethodTimes = document.getElementById("addMethodTimes").checked

    const subtractPoint = parseInt(document.getElementById("subtractPoint").value)
    const subtractMethodMinus = document.getElementById("subtractMethodMinus").checked
    const subtractMethodDivide = document.getElementById("subtractMethodDivide").checked

    const addLogo = document.getElementById("addLogo")
    const subtractLogo = document.getElementById("subtractLogo")

    switch (action) {
      case 'add':
        if (addMethodPlus) {
          newPoint = point + addPoint
        } else if (addMethodTimes) {
          newPoint = point * addPoint
        }
        addLogo.classList.remove("hidden")
        subtractLogo.classList.add("hidden")
        break

      case 'subtract':
        if (subtractMethodMinus) {
          newPoint = point - subtractPoint
        } else if (subtractMethodDivide) {
          newPoint = point / subtractPoint
        }
        addLogo.classList.add("hidden")
        subtractLogo.classList.remove("hidden")
        break

      default:
        break
    }

    const oldPointEl = document.getElementById("oldPoint")
    const newPointEl = document.getElementById("newPoint")

    oldPointEl.innerText = point
    newPointEl.innerText = newPoint
  }

  inputPoint.value = newPoint
}

async function handleSubmit(e) {
  toggleLoading("on")

  const id = document.getElementById(e.name == "form-action" ? "formActionId" : "formEditId").value
  const point = document.getElementById(e.name == "form-action" ? "formActionPoint" : "formEditPoint").value

  const xml = new XMLHttpRequest()
  xml.open("post", "./controller/?action=edit_team_point", true)
  xml.setRequestHeader("content-type", "application/x-www-form-urlencoded")
  xml.send(`id=${id}&point=${point}`)

  xml.onreadystatechange = await async function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        toggleLoading("off")
        const btnCloseModal = document.getElementById("close-modal-" + e.name)
        await btnCloseModal.click()
        location.reload()
      } else {
        console.log(this.responseText)
      }
    }
  }
}