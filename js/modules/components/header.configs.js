import products from './product-preview.configs.js'
//import accManager from './acc-manager.configs.js'

let configs = (function(){
  let header = $('#header-top')
  let interactable = {
    buttons: {
      accManager: header.find('#btn-toggle-account-manager'),
      /*home: document.querySelector('.menu-option'),
      more_sold:  document.querySelector('.menu-option.more-sold'),
      categories: document.querySelector('.menu-option.categories')*/
    },
    search_form: {
      input: header.find('#search-box #input'),
      submit: header.find('#search-box #submit')
    }
  }

  function init(){
    interactable.search_form['input'].on('input', function(){
      interactable.search_form['submit'].prop('disabled', interactable.search_form['input'].value == '')
    })
  }

  return {
    init,
    products
  }
})()
export default configs