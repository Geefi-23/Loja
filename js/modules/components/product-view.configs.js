import notifys from './notifys.js'
import request from '../ajax-request.js'

export default (function(){
  function init(){

    let buttonWishList = $('.btn-wishlist')
    let buttonBuy = $('.btn-buy')

    buttonBuy.click(function(){
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
      notifys.dispatch('Você comprou esse item!')
      setTimeout(() => {
        $(this).prop('disabled', false)
      }, 4000);
    })

    buttonWishList.click(function(){
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
  }

  return {
    init
  }
})()