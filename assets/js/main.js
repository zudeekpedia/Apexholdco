var dAmount = document.querySelector('#dAmount')
function openSideBarSm(){
    var toggleDrawer = document.querySelector('#toggleDrawer')

    $('#overlayDiv').show()
    $('#sideBarSm').show('slide', {direction: 'right'}, 400)
    toggleDrawer.onclick = hideSideBarSm
}

function hideSideBarSm(){
    var toggleDrawer = document.querySelector('#toggleDrawer')

    $('#overlayDiv').hide()
    $('#sideBarSm').hide('slide', {direction: 'right'}, 400)
    toggleDrawer.onclick = openSideBarSm
}


// set escrow role
function setRole(e, role){
    var traderRole = document.querySelector('#traderRole')

    $('.r-btn').addClass('polygon-btn-blank');
    traderRole.value = role;
    $(e).removeClass('polygon-btn-blank')
}


const dismissMessage = ()=>{
    $('#msg-notify').fadeOut(200)
}
const dismissDialog = ()=>{
    $('.dialog').fadeOut(200)
}


// -----------------------------
// Copy To Clipboard
// -----------------------------
function copyToClipboard(text){
    if (!navigator.clipboard) {
        copyToClipboardFallback(text);
        return;
      }
    navigator.clipboard.writeText(text);
  }

  function copyToClipboardFallback(text){
    var textArea = document.createElement("textarea");
    textArea.value = text;
    // Avoid scrolling to bottom ==/
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
  }

function toggleContextMenu(elem) {
    elem = $(`${elem}`)[0]
    if (elem.classList.contains('context-menu-active')){
        $(elem).fadeOut(150);
        $(elem).removeClass('context-menu-active');
    }
    else{
        $(elem).fadeIn(150);
        $(elem).addClass('context-menu-active');
    }
 }

function showToastError(msg){
    iziToast.error({
        title: 'Error',
        message: msg,
        position: 'topRight',
    });
}