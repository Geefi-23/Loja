import request from './modules/ajax-request.js'

$(document).ready(function(){
  let form = $('#auth-form')
  let email = form.find('#email')
  let senha = form.find('#senha')
  form.on('submit', function(e){
    e.preventDefault()
    let dados = {
      'email': email.val(),
      'senha': senha.val()
    }
    authUser(JSON.stringify(dados))
  })
})

function authUser(data){
  request('POST', 'server/data-process/AutenticarUsuario.php', data,
  function(res){
    let responset = $('#auth-responsetext')
    if (res != 'index')
      return responset.html(res)
    location.href = ''
    
  }, null)
}