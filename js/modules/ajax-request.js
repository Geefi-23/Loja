export default function (method, url, data, success, error){
  $.ajax({
    url,
    type: method,
    data,
    success,
    error,
    contentType: 'application/json;charset=utf-8'
  })
}