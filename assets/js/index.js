(function () {
  load_data()
})()

function load_data() {
  const xml = new XMLHttpRequest()
  xml.open("post", "./controller/?action=get_team", true)
  xml.setRequestHeader("content-type", "application/x-www-form-urlencoded")
  xml.send()
  xml.onreadystatechange = async function () {
    if (this.readyState == 4 && this.status == 200) {
      const data = (JSON.parse(this.responseText))
      const sorted = (JSON.parse(this.responseText))
      let i = 0, j = 0;
      const rank = []
      data.forEach(x => {
        i++
        document.getElementById(`team${i}Name`).innerHTML = x['name']
        document.getElementById(`team${i}Point`).innerHTML = x['point']
        document.getElementById(`team${i}Organization`).innerHTML = x['organization']
        document.getElementById(`team${i}Logo`).setAttribute('src', `./assets/img/${x['logo']}`)
      });

      sorted.sort((a, b) => (parseFloat(a.point) < parseFloat(b.point)))
      sorted.forEach(x => {
        // const found = sorted.some(r => data.indexOf(r))
        rank.push(x.sort);
      })
      emptySortPosition()
      setSortPosition(rank[0], rank[1], rank[2], rank[3])
    }
  }
  setTimeout(() => {
    load_data();
  }, 500);
}

function emptySortPosition() {
  const team1 = document.getElementById("team1");
  const team2 = document.getElementById("team2");
  const team3 = document.getElementById("team3");
  const team4 = document.getElementById("team4");

  team1.classList.remove("pos-1")
  team2.classList.remove("pos-1")
  team3.classList.remove("pos-1")
  team4.classList.remove("pos-1")

  team1.classList.remove("pos-2")
  team2.classList.remove("pos-2")
  team3.classList.remove("pos-2")
  team4.classList.remove("pos-2")

  team1.classList.remove("pos-3")
  team2.classList.remove("pos-3")
  team3.classList.remove("pos-3")
  team4.classList.remove("pos-3")

  team1.classList.remove("pos-4")
  team2.classList.remove("pos-4")
  team3.classList.remove("pos-4")
  team4.classList.remove("pos-4")
}

function setSortPosition(pos1, pos2, pos3, pos4) {
  document.getElementById("team" + pos1).classList.add("pos-1");
  document.getElementById("team" + pos2).classList.add("pos-2");
  document.getElementById("team" + pos3).classList.add("pos-3");
  document.getElementById("team" + pos4).classList.add("pos-4");
}