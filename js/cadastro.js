import request from './modules/ajax-request.js'

$(document).ready(function(){
  let form = $('#auth-form')
  let input = form.find('.form-input')
  let nome = form.find('#nome')
  let email = form.find('#email')
  let datanasc = form.find('#datanasc')
  let senha = form.find('#senha')
  let submit = form.find('#submit')

  form.on('submit', function(e){
    e.preventDefault()
    let dados = {
      'nome': nome.val(),
      'email': email.val(),
      'datanasc': datanasc.val(),
      'senha': senha.val()
    }
    saveUser(JSON.stringify(dados))
  })
  input.on('input', function(){ submit.prop('disabled', formIsValid()) })

  function formIsValid(){
    let regex = {
      nome: /^[a-zA-Z]{6,20}$/,
      email: /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      senha: /^.{6,16}$/
    }
    if(nome.val().match(regex.nome) && email.val().match(regex.email) 
    && datanasc.val() != '' && senha.val().match(regex.senha))
        return false
    else return true
  }
})

function saveUser(data){
  request('POST', 'server/data-process/SalvarUsuario.php', data, 
  function(res){
    let responset = $('#auth-responsetext')
    responset.html(res)
  }, null)
}