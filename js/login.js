window.onload = function(){
  let form = document.querySelector('#auth-form')
  form.addEventListener('submit', authUser)
}

function authUser(ev){
  ev.preventDefault()
  let xhr = new XMLHttpRequest()
  let email = document.querySelector('#auth-form__in-email')
  let senha = document.querySelector('#auth-form__in-senha')

  let responset = document.querySelector('#auth-responsetext')
  let dados = {
    'email': email.value,
    'senha': senha.value
  }
  console.log(dados)
  xhr.open('POST', 'server/data-process/AutenticarUsuario.php')
  xhr.setRequestHeader('Content-Type', 'application/json')
  xhr.send(JSON.stringify(dados))
  xhr.onerror = function(){
    responset.innerHTML = xhr.statusText
  }
  xhr.onreadystatechange = function(){
    if (xhr.readyState === xhr.DONE && xhr.status === 200){
      if (xhr.responseText === 'index')
        location.href = ''
      responset.innerHTML = xhr.responseText
    }
  }
}