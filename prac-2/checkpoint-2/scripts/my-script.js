function init()
{
    const player= document.getElementById("player-name");
    player.innerHTML=getUrlParam("name");
    console.log(getUrlParam("name"))
}
function getUrlParam(name)
{
    const params = new URLSearchParams(window.location.search);
    return params.has(name) ? params.get(name) : "";
}
init();
