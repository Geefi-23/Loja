import notifys from './notifys.js'
import request from '../ajax-request.js'

export default (function(){
  let container
  let btnWishList
  let btnBuy
  let btnQtdForward
  let btnQtdBack
  let qtdContainer
  const qtdCountMin = 1
  const qtdCountMax = 5
  let qtdCount = qtdCountMin

  function init(){
    loadElements()
    configElements()
  }
  function loadElements(){
    container = $('#produto-view')

    btnWishList = container.find('.btn-wishlist')
    btnBuy = container.find('.btn-buy')
    btnQtdForward = container.find('#forward')
    btnQtdBack = container.find('#back')
    qtdContainer = container.find('#container-qtd')
    qtdCount
  }
  function configElements(){
    btnBuy.click(function(){
      //pega os parametros da url
      let data = {}
      let url = location.search.slice(1)
      let params = url.split('&')
      params.forEach(function(param){
        let chaveValor = param.split('=')
        let chave = chaveValor[0]
        let valor = chaveValor[1]
        data[chave] = valor
      })
      //requisita as informações do produto
      request('GET', '../../server/data-process/BuscarProduto.php', data, 
      function(res){
        //adiciona o produto no carrinho de compras
        let produto = JSON.parse(res)
        let carrinho = []

        if (localStorage.getItem('buyCart') != undefined)
          carrinho = JSON.parse(localStorage.getItem('buyCart'))
        carrinho.push(produto)
        localStorage.setItem('buyCart', JSON.stringify(carrinho))
      }, null)
      
      $(this).prop('disabled', true)
      notifys.dispatch('Você adicionou esse item ao carrinho de compras!')
      setTimeout(() => {
        $(this).prop('disabled', false)
      }, 4000);
    })

    btnWishList.click(function(){
      //pega os parametros da url
      let data = {}
      let url = location.search.slice(1)
      let params = url.split('&')
      params.forEach(function(param){
        let chaveValor = param.split('=')
        let chave = chaveValor[0]
        let valor = chaveValor[1]
        data[chave] = valor
      })
      //requisita as informações do produto
      request('GET', '../../server/data-process/BuscarProduto.php', data, 
      function(res){
        //adiciona o produto na lista de desejos
        let produto = JSON.parse(res)
        let list = []

        if (localStorage.getItem('wishList') != undefined)
          list = JSON.parse(localStorage.getItem('wishList'))
        list.push(produto)
        localStorage.setItem('wishList', JSON.stringify(list))
      }, null)
      
      $(this).prop('disabled', true)
      notifys.dispatch('Item adicionado com sucesso!')
      setTimeout(() => {
        $(this).prop('disabled', false)
      }, 4000);
    })

    btnQtdForward.click(function(){
      if (qtdCount != qtdCountMax)
        qtdCount++
      qtdContainer.html(qtdCount)
    })
    btnQtdBack.click(function(){
      if (qtdCount != qtdCountMin)
        qtdCount--
      qtdContainer.html(qtdCount)
    })
  }
  return {
    init
  }
})()