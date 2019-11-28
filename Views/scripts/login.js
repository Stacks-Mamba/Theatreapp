//Buscar campos
let user_field = $("#username")
let pass_field = $("#password")
//Get button
let send_btn = $("#sendBtn")
//Validacoes
name_valid = false
pass_valid = false
///Funções de validação
//Validar campo fila
function checkName(){
  if(user_field.val().length>0){
    user_field.removeClass("is-invalid").addClass("is-valid")
    name_valid = true
  }
  else{
    user_field.removeClass("is-valid").addClass("is-invalid")
    name_valid = false
  }
}

function checkPass(){
  if(pass_field.val().length>0){
    pass_field.removeClass("is-invalid").addClass("is-valid")
    pass_valid = true
  }
  else{
    pass_field.removeClass("is-valid").addClass("is-invalid")
    pass_valid = false
  }
}


function processLogin(data){
  if(data.result==0){
    alert("Erro ao iniciar sessão, verifique as suas credencias");
    pass_field.val("")
    user_field.val("")
    checkName()
    checkPass()
  }
  else{
    window.location = data.result
  }
}

function sendLoginCredentials(){
  fields = {
    user:user_field.val(),password: pass_field.val()
  }

  $.ajax({
    url: "http://127.0.0.1/TheatreApp/controllers/LoginController.php",
    dataType:"json",
    data:fields,
    success:processLogin,
    error: function(jq,text,error){
      console.log(jq)
      console.log(text)
      console.log(error)
    },
    type:"POST"
  })
}


function main(){
  user_field.on("input",checkName)
  pass_field.on("input",checkPass)
  send_btn.on("click",sendLoginCredentials)
}

main()
