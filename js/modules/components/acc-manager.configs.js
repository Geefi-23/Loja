import request from '../ajax-request.js'
import main from './main.configs.js'

let configs = (function(){
  let accManager = $('#account-manager')
  let buttons = {
    mySolds: accManager.find('#btn-mysolds'),
    cart: accManager.find('#btn-cart'),
    wishList: accManager.find('#btn-wishlist')
  }
  function init(){
    buttons.cart.click(function(e){
      e.preventDefault()
      request('GET', '../../carrinho-compras.php', null, 
      function(res){
        main.mainContent.html($(res).find('#main-content').html())
        history.replaceState(null, '', 'carrinho-compras.php')
      }, 
      function(xhr, text, errorText){
        console.log(errorText)
      })
    })
    buttons.mySolds.click(function(e){
      e.preventDefault()
      request('GET', '../../server/ajax-pages/minhas-vendas.html', null,
      function(res){
        main.mainContent.html('')
        main.mainContent.html(res)
      },
      function(xhr, text, errorText){
        console.log(errorText)
      })
    })
    buttons.wishList.click(function(e){
      e.preventDefault()
      request('GET', '../../lista-desejos.php', null,
      function(res){
        main.mainContent.html($(res).find('#main-content').html())
        history.replaceState(null, '', 'lista-desejos.php')
      },
      function(xhr, text, errorText){
        console.log(errorText)
      })
    })
  }
  return {
    init
  }
})()

export default configs