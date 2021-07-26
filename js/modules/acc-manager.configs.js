import main from './main.configs.js'

let configs = (function(){
  let interactable = {
    my_solds: document.querySelector('.dropdown-option.mysolds'),
    cart: document.querySelector('.dropdown-option.cart')
  }
  function configure(){
    if (interactable.cart != null)
    interactable.cart.onclick = function(){
      console.log(localStorage)
    }
    if (interactable.my_solds != null){
      interactable.my_solds.onclick = function(){
        let xhr = new XMLHttpRequest()
        xhr.open('GET', '../../server/data-process/MinhasVendas.php')
        xhr.send()
        xhr.onreadystatechange = function(){
          if (xhr.readyState === xhr.DONE && xhr.status === 200){
            main.conteiner_content.innerHTML = xhr.responseText
          }
        }
      }
    }
  }
  return {
    configure: configure
  }
})()
export default configs