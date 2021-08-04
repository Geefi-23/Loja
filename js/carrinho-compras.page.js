import notifys from './modules/components/notifys.js'
import dialogs from './modules/components/dialogs.js'

import request from './modules/ajax-request.js'

export default (function(){
  let btnClearCart
  let btnRemove
  let container

  function load(){
    loadElements()
    loadList()
    configItems()
  }
  function loadElements(){
    btnRemove = $('#remove')
    btnClearCart = $('#clear')
    container = $('#product-list')

    btnRemove.click(function(){
      let dialog = dialogs.dispatch('Tem certeza?', 'Sim')
      let carrinho = JSON.parse(localStorage.getItem('buyCart'))
      console.log(carrinho)
      dialog.buttons['Sim'].click(function(){
        let checkItems = $('.select').toArray()
        $.each(checkItems, function(i, checkElem){
          if ($(checkElem).prop('checked')){
            let productid = $(this).closest('.row').attr('productid')
            $.each(carrinho, function(i, item){
              if (item.id === productid){
                carrinho.splice(i, 1)
                return false
              }
            })
          }
        })

        localStorage.setItem('buyCart', JSON.stringify(carrinho))
        btnRemove.prop('disabled', true)
        clearList()
        loadList()
        dialog.close()
        notifys.dispatch('Carrinho de compras: Itens removidos!')
      })
    })

    btnClearCart.click(function(){
      if (localStorage.getItem('buyCart') == null)
          return notifys.dispatch('Você não tem itens no carrinho de compras!')
      let dialog = dialogs.dispatch('Tem certeza que deseja limpar o carrinho de compras?', 'Sim')
      dialog.buttons['Sim'].click(function(){
        dialog.close()
        localStorage.removeItem('buyCart')
        clearList()
        notifys.dispatch('Carrinho de compras apagado')
      })
    })
  }
  function loadList(){
    let buyCart = JSON.parse(localStorage.getItem('buyCart'))
    if (buyCart != null)
        buyCart.forEach(function(produto){
        container.html(container.html() + 
        `<div class="row" productid="${produto.id}">
          <div class="col col-sm-1"><input class="select" type="checkbox"></div>
          <div class="col">${produto.nome}</div>
          <div class="col">${produto.categoria}</div>
          <div class="col">${produto.preco}</div>
          <div class="col col-sm-1"><button>Ver</button></div>
        </div>`)
      })
  }
  function configItems(){
    let checkItem = container.find('.select')
    let checkStack = 0
    checkItem.click(function(){
      btnRemove.prop('disabled', false)
      if ($(this).prop('checked')){
        checkStack++
        return $(this).closest('.row').addClass('selected')
      }
      checkStack--
      $(this).closest('.row').removeClass('selected')
      if (checkStack === 0)
        btnRemove.prop('disabled', true)
    })
  }
  function clearList(){
    container.html('<div class="row">\
        <div class="col col-sm-1"></div>\
        <div class="col">Nome</div>\
        <div class="col">Categoria</div>\
        <div class="col">Preco</div>\
        <div class="col col-sm-1"></div>\
      </div>')
  }
  return {
    load
  }
})()

