import produto from './product.entity.js'
var configs = (function(){
  let buttons_buy = document.querySelectorAll('#produto.botao.comprar')
  let buttons_cart = document.querySelectorAll('#produto.botao.cart')
  let carrinho = [];

  let configure = function(){
    buttons_buy.forEach(function(val){
      val.onclick = function(){
        console.log('Comprou')
      }
    })
    buttons_cart.forEach(function(val){
      val.onclick = function(){
        let gambiarra = document.querySelector('#GAMBIARRA')
        let objeto = JSON.parse(gambiarra.innerHTML)
        if (localStorage.hasOwnProperty('carrinho_compras'))
          carrinho = JSON.parse(localStorage.getItem('carrinho_compras'))
        produto.nome = objeto.nome
        produto.descricao = objeto.descricao
        produto.preco = objeto.preco
        carrinho.push(produto)
        localStorage.setItem('carrinho_compras', JSON.stringify(carrinho))
      }
    })
  }
  let clique = function(nome, desc, preco){
    if (localStorage.hasOwnProperty('carrinho_compras'))
      carrinho = JSON.parse(localStorage.getItem('carrinho_compras'))
    produto.nome = nome
    produto.descricao = desc
    produto.preco = preco
    carrinho.push(produto)
    localStorage.setItem('carrinho_compras', JSON.stringify(carrinho))
  }
  return {
    configure,
    clique
  }
})()
export default configs