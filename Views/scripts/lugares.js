//Campos do formulário_modal
let addBtn = $("#add-btn")
let fila_input = $("#input-fila")
let lugar_input = $("#input-lugar")
let secb_input = $("#input-secb")
let submit_button = $("#submit-btn")
let input_hint = $(".form-group > .invalid-feedback")
let reservado_input = $("#reservado-input")
let tipo_input = $("#tipo-input")
//Diálogo pop up
let result_modal = $("#result-modal")
let text = $("#result-modal-alert")
//Se formulários válidos
let numsecb_valid = false
let fila_valid = false
let lugar_valid = false



//Função para abrir a janela de registro de cadeira
function showModal(){
  $("#formModal").modal()
}

///Funções de validação
//Validar campo fila
function checkFila(){
  if(fila_input.val().length>0){
    fila_input.removeClass("is-invalid").addClass("is-valid")
    fila_valid = true
  }
  else{
    fila_input.removeClass("is-valid").addClass("is-invalid")
    fila_valid = false
  }
}

function clearFormFields(){
  for(field of [fila_input,lugar_input,secb_input]){
    field.val("")
    field.removeClass("is-valid")
  }
}


//Validar campo lugar
function checkLugar(){
  if(lugar_input.val().length>0){
    lugar_input.removeClass("is-invalid").addClass("is-valid")
    lugar_valid = true
  }
  else{
    lugar_input.removeClass("is-valid").addClass("is-invalid")
    lugar_valid = false
  }

}

//Validar o campo com a expressão regular
function checkNumSecB(){
  //Se os outros campos estiverem preenchidos, o campo é validado
  if(lugar_valid && fila_valid){
    let regex = new RegExp("^"+fila_input.val()+"[A-Z]{2}"+lugar_input.val()+"$")
    if(secb_input.val().match(regex)){
      numsecb_valid = true;
      secb_input.removeClass("is-invalid").addClass("is-valid")
    }
    else{
      //Se n bater com a expressão regular, mostrar dica Sobre preenchimento
      secb_input.removeClass("is-valid").addClass("is-invalid")
      input_hint.html("Este campo deve começar com o número da fila seguido de duas letras maiúsculas e por fim o número do lugar")
      numsecb_valid = false
    }
  }
  else{
    secb_input.removeClass("is-valid").addClass("is-invalid")
    checkLugar()
    checkFila()
    input_hint.html("Por favor preencha primeiramente a fila e o lugar")
  }
}


function processAddResponse(data){
  console.log(data)
  if(data.result == 1){
    $("#formModal").modal("hide");
    text.addClass("alert-success")
    text.html("O lugar foi inserido com sucesso !")
    result_modal.modal()
    $("tbody").append(data.data)
    clearFormFields()
  }
  else{
    $("#formModal").modal("hide");
    text.addClass("alert-danger")
    text.html("Impossível inserir registro. Ocorreu um erro fatal.")
    result_modal.modal();
    clearFormFields();
  }
}


//Função que envia a requisição ajax
function sendAjaxRequestAdd(){
  //Campos do formulário
  fields = {
    fila:fila_input.val(),lugar: lugar_input.val(),
    seccao_balcao:secb_input.val(),tipo:tipo_input.val(),
    reservado:reservado_input.val()
  }

  $.ajax({
    url: "../../index.php/lugares/add",
    dataType:"json",
    data:fields,
    success:processAddResponse,
    error: function(jq,text,error){
      console.log(jq)
      console.log(text)
      console.log(error)
    },
    type:"POST"
  })

}



//Função que adiciona o lugar enviando uma requisição ajax
function addLugar(){
  if(numsecb_valid && fila_valid && lugar_valid){
    //Enviar requisição AJAX
    sendAjaxRequestAdd();
  }
  else{
    //Executar a funcão de validação de campos
    checkNumSecB()
  }
}


function main(){
  addBtn.click(showModal)
  secb_input.on("input",checkNumSecB)
  lugar_input.on("input",checkLugar)
  fila_input.on("input",checkFila)
  submit_button.click(addLugar);
}


main()
