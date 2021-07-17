window.onload = function(){
  let form = document.querySelector('#auth-form')
  form.addEventListener('submit', saveUser)
}

function saveUser(ev){
  ev.preventDefault()
  let xhr = new XMLHttpRequest()
  let nome = document.querySelector('#auth-form-in-nome')
  let email = document.querySelector('#auth-form-in-email')
  let datanasc = document.querySelector('#auth-form-in-datanasc')
  let senha = document.querySelector('#auth-form-in-senha')

  let responset = document.querySelector('#auth-responsetext')
  let dados = {
    'nome': nome.value,
    'email': email.value,
    'datanasc': datanasc.value,
    'senha': senha.value
  }
  console.log(dados)
  xhr.open('POST', 'server/process/SalvarUsuario.php')
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