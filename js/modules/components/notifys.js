export default (function(){
  let notifyCont = $('#notifications-container')
  function dispatch(string){
    string = `<div class="notification text"><button class="fechar-not">fechar</button>${string}</div>`
    notifyCont.html(notifyCont.html() + string)
    $('.fechar-not').click(function(){
      $(this).closest('.notification').remove()
    })
    let notification = $('.notification')
    notification.fadeIn(50)//.delay(3000).fadeOut(1000)
    /*setTimeout(function(){
      notification.remove()
    }, 4050)*/
  }
  return {
    dispatch
  }
})()