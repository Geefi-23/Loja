import products from './products.configs.js'
import accmanager from './acc-manager.configs.js'

let configs = (function(){
  let conteiner_ajaxforms = document.querySelector('#conteiner.ajax-forms.hidden')
  let conteiner_maincontent = document.querySelector('#conteiner.main-content')
  let interactable = {
    main_buttons: {
      acc_manager: document.querySelector('#account-manager.dropdown-toggle'),
      home: document.querySelector('.menu-option'),
      more_sold:  document.querySelector('.menu-option.more-sold'),
      categories: document.querySelector('.menu-option.categories')
    },
    search_form: {
      input: document.querySelector('#search-box.input'),
      submit: document.querySelector('#search-box.submit')
    }
  }

  function init(){
    products.configure()
    accmanager.configure()
    configure()
  }

  function configure(){
    interactable.main_buttons.acc_manager.onclick = function(){
      console.log('Acessou o gerenciador da conta')
      let dropdown = document.querySelector('#account-manager.dropdown.hide')
      if (dropdown == null){
        dropdown = document.querySelector('#account-manager.dropdown.show')
        dropdown.className = 'dropdown hide'
      }else{
        dropdown.className = 'dropdown show'
      }
    }
    interactable.main_buttons['home'].onclick = function(){
      console.log('Foi para a pagina de inicio')
    }
    interactable.main_buttons['more_sold'].onclick = function(){
      console.log('Foi para a pagina de mais vendidos')
    }
    interactable.main_buttons['categories'].onclick = function(){
      console.log('Foi para a pagina de categorias')
    }
    interactable.search_form['input'].oninput = function(){
      interactable.search_form['submit'].disabled = interactable.search_form['input'].value == ''
    }
  }

  return {
    conteiner_ajaxforms: conteiner_ajaxforms,
    conteiner_content: conteiner_maincontent,
    init,
    products
  }
})()
export default configs