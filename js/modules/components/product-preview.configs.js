import request from '../ajax-request.js'
import productView from './product-view.configs.js'

var configs = (function(){

  let buttonSee = $('.btn-see')

  let init = function(){
    buttonSee.click(function(e){
      e.preventDefault()
      history.pushState('Produto', 'titulo', e.target.href)
      let data = {}
      let url = location.search.slice(1)
      let params = url.split('&')
      params.forEach(function(param){
        let chaveValor = param.split('=')
        let chave = chaveValor[0]
        let valor = chaveValor[1]
        data[chave] = valor
      })
      request('GET', '../../produto.php', data, 
      function(res){
        let cont_res = $('#main-content')
        cont_res.html($(res).find('#produto-view'))
        productView.init()
      }, null)
    })
  }
  return {
    init
  }
})()
export default configs