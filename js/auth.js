
function reqPage(page){
  console.log(location.pathname)
  let conteiner = document.getElementById('auth-conteiner')
  let xhr = new XMLHttpRequest()
  xhr.open('GET', 'server/pagina.php?page='+page)
  xhr.send()
  xhr.onerror = function(){
    conteiner.innerHTML = xhr.statusText
  }
  xhr.onreadystatechange = function(){
    if (xhr.readyState === xhr.DONE && xhr.status === 200){
      conteiner.innerHTML = xhr.responseText
    }
  }
}