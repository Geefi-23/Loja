let nome
let email
let datanasc
let senha
window.onload = function(){
  let form = document.querySelector('#auth-form')
  nome = document.querySelector('#auth-form__in-nome')
  email = document.querySelector('#auth-form__in-email')
  datanasc = document.querySelector('#auth-form__in-datanasc')
  senha = document.querySelector('#auth-form__in-senha')
  let submit = document.querySelector('#auth-form__in-submit')

  form.addEventListener('submit', saveUser)
  nome.oninput = function(){
    submit.disabled = formIsValid()
  }
  email.oninput = function(){
    submit.disabled = formIsValid()
  }
  senha.oninput = function(){
    submit.disabled = formIsValid()
  }
}

function formIsValid(){
  let regex = {
    nome: /^[a-zA-Z]{6,20}$/,
    email: /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
    senha: /^.{6,16}$/
  }
  if(nome.value.match(regex.nome) && email.value.match(regex.email) && senha.value.match(regex.senha))
      return false
  else return true
}
function saveUser(ev){
  ev.preventDefault()
  let xhr = new XMLHttpRequest()

  let responset = document.querySelector('#auth-responsetext')
  let dados = {
    'nome': nome.value,
    'email': email.value,
    'datanasc': datanasc.value,
    'senha': senha.value
  }
  console.log(dados)
  xhr.open('POST', 'server/data-process/SalvarUsuario.php')
  xhr.setRequestHeader('Content-Type', 'application/json')
  xhr.send(JSON.stringify(dados))
  xhr.onerror = function(){
    responset.innerHTML = xhr.statusText
  }
  xhr.onreadystatechange = function(){
    if (xhr.readyState === xhr.DONE && xhr.status === 200){
      responset.innerHTML = xhr.responseText
    }
  }
}