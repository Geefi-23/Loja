export default (function(){
  let container = $('#dialogs-container')

  function dispatch(text, bstr1 = 'Ok', bstr2 = 'Cancelar'){
    container.html(`<div class="dialog text">
      <div>${text}</div>
      <div id="buttons-container" class="d-flex justify-content-around">
        <button id="btn1">${bstr1}</button>
        <button id="btn2">${bstr2}</button>
      </div>
    </div>`)
    let dialog = container.find('.dialog')
    let btn1 = dialog.find('#btn1')
    let btn2 = dialog.find('#btn2')
    btn2.click(function(){
      container.hide()
      container.html('')
    })
    container.fadeIn()
    dialog.slideDown()

    let dialogObj = {
      close: function(){
        container.hide()
        container.html('')
      },
      buttons:{}
    }
    dialogObj.buttons[bstr1] = btn1
    dialogObj.buttons[bstr2] = btn2

    return dialogObj
  }
  function dispatchLoader(){
    container.html(`<div class="dialog-loader">
              <div id="loader"></div>
            </div>`)
    container.show()
    let dialogObj = {
      close: function(){
        container.hide()
        container.html('')
      }
    }
    return dialogObj
  }
  return {
    dispatch,
    dispatchLoader
  }
})()