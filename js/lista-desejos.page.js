import notifys from './/modules/components/notifys.js'
import dialogs from './modules/components/dialogs.js'

export default (function(){
  let btnRemove
  let btnClearList
  let container

  function load(){
    loadElements()
    loadList()
    configItems()
  }
  function loadElements(){
    btnRemove = $('#remove')
    btnClearList = $('#clear')
    container = $('#product-list')

    btnRemove.click(function(){
      let dialog = dialogs.dispatch('Tem certeza?', 'Sim')
      let wishList = JSON.parse(localStorage.getItem('wishList'))
      dialog.buttons['Sim'].click(function(){
        let checkItems = $('.select').toArray()
        $.each(checkItems, function(i, checkElem){
          if ($(checkElem).prop('checked')){
            let productid = $(this).closest('.row').attr('productid')
            $.each(wishList, function(i, item){
              if (item.id === productid){
                wishList.splice(i, 1)
                return false
              }
            })
          }
        })

        localStorage.setItem('wishList', JSON.stringify(wishList))
        btnRemove.prop('disabled', true)
        clearList()
        loadList()
        dialog.close()
        notifys.dispatch('Lista de desejos: Itens removidos!')
      })
    })

    btnClearList.click(function(){
      if (localStorage.getItem('wishList') == null)
        return notifys.dispatch('Você não tem itens na sua lista de desejos!')
      let dialog = dialogs.dispatch('Tem certeza que deseja apagar a sua lista de desejos?', 'Sim')
      dialog.buttons['Sim'].click(function(){
        dialog.close()
        localStorage.removeItem('wishList')
        clearList()
        notifys.dispatch('Lista de desejos apagada')
      })
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
  function loadList(){
    let wishList = JSON.parse(localStorage.getItem('wishList'))
    if (wishList != null)
      wishList.forEach(function(produto){
        container.html(container.html() + `<div class="row">
            <div class="col col-sm-1"><input class="select" type="checkbox"></div>
            <div class="col">${produto.nome}</div>
            <div class="col">${produto.categoria}</div>
            <div class="col">${produto.preco}</div>
            <div class="col col-sm-1"></div>
          </div>`)
      })
  }
  return {
    load
  }
})()