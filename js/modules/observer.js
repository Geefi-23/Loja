export default (function(){
  let observers = []

  function subscribe(f){
    observers.push(f)
  }

  function notifyAll(data){
    console.log('Notificando ' + observers.length + ' observers')
    observers.forEach(function(val){
      val()
    })
  }
  return {
    subscribe,
    notifyAll
  }
})()