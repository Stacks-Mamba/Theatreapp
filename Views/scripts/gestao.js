//Campos do formulário modal
let addBtn = $("#add-btn")
let fila_input = $("#input-fila")
let lugar_input = $("#input-lugar")
let submit_button = $("#submit-btn")
let input_hint = $(".form-group > .invalid-feedback")
let reservado_input = $("#reservado-input")
let tipo_input = $("#tipo-input")
//Campos do form para pesquisar
let fila_s = $("#search-fila-input")
let lugar_s = $("#search-lugar-input")
let tipo_s = $("#search-tipo-select")
//Formulário de editar
let edit_modal = $("#edit-modal")
//Diálogo pop up
let result_modal = $("#result-modal")
let text = $("#result-modal-alert")
//Ver se parâmetros de pesquisa são válidos
fila_s_valid = false
lugar_s_valid = false
//Tipo de lugar procurado
let tipo_lugar = -1;

/*form functions*/
function pesquisaLugar(){
  if(fila_s_valid && lugar_s_valid){
    //Send AJAX request
    sendAjaxRequestGet();
  }
  else{
    checkLugar()
    checkFila()
  }
}
function checkFila(){
  if(fila_s.val().length>0){
    fila_s.removeClass("is-invalid").addClass("is-valid")
    fila_s_valid = true
  }
  else{
    fila_s.removeClass("is-valid").addClass("is-invalid")
    fila_s_valid = false
  }
}

function checkLugar(){
  if(lugar_s.val().length>0){
    lugar_s.removeClass("is-invalid").addClass("is-valid")
    lugar_s_valid = true
  }
  else{
    lugar_s.removeClass("is-valid").addClass("is-invalid")
    lugar_s_valid = false
  }
}

function clearFormFields(){
  for(field of [fila_s,lugar_s]){
    field.val("")
    field.removeClass("is-valid")
  }
}

//Abrir diálogo de edição e atribuir as opções com base em tipos
function openEditModal(data,type){
  fila_input.val(data.fila)
  lugar_input.val(data.lugar)
  if(type=="LugarBalcao"){
    $("#secb-input").val(data.balcao)
    $("#opt-1").html("Fumador")
    $("#opt-2").html("Não fumador")
    tipo_lugar = 2

  }
  else{
    $("#input-secb").val(data.seccao)
    $("#opt-1").html("Protocolar")
    $("#opt-2").html("Não Protocolar")
    tipo_lugar = 1
  }
  edit_modal.modal();
}

//Funções para as requisições AJAX
function processGetResponse(response){
  if(response.result == 1){
    openEditModal(response.data,response.tipo)
    clearFormFields()
  }
  else{
    text.addClass("alert-danger")
    text.html("Impossível editar.Lugar inexistente!");
    result_modal.modal();
    clearFormFields();
  }
}

function processDeleteResponse(response){
  if(response.result == 1){
    edit_modal.modal("hide");
    text.addClass("alert-success")
    text.html("Lugar removido com sucesso!");
    result_modal.modal();
    clearFormFields();
  }
  else{
    edit_modal.modal("hide");
    text.addClass("alert-danger")
    text.html("Impossível apagar. Ocorreu um erro no servidor!");
    result_modal.modal();
    clearFormFields();
  }
}

function processUpdateResponse(response){
  if(response.result == 1){
    edit_modal.modal("hide");
    text.addClass("alert-success")
    text.html("Lugar Editado com sucesso!");
    result_modal.modal();
    clearFormFields();
  }
  else{
    edit_modal.modal("hide");
    text.addClass("alert-danger")
    text.html("Impossível Editar. Ocorreu um erro no servidor!");
    result_modal.modal();
    clearFormFields();
  }
}



function sendAjaxRequestGet(){
  fields = {fila : fila_s.val(),lugar: lugar_s.val(),tipo : tipo_s.val()}
  $.ajax({url:"../../index.php/gestao/get",
  dataType:"json",
  data:fields,
  success:processGetResponse,
  error:function(jq,text,error){
    console.log(jq)
    console.log(text)
    console.log(error)
  },
  type:"GET"
})
}

function sendAjaxRequestUpdate(){
  fields = {fila : fila_input.val(),lugar: lugar_input.val(),tipo : tipo_lugar,
  vendido:$("#reservado-input").val() ,subtipo: $("#tipo-input").val()}
  $.ajax({url:"../../index.php/gestao/update",
  dataType:"json",
  data:fields,
  success:processUpdateResponse,
  error:function(jq,text,error){
    console.log(jq)
    console.log(text)
    console.log(error)
  },
  type:"POST"
  })
}

function sendAjaxRequestDelete(){
  fields = {fila : fila_input.val(),lugar: lugar_input.val(),tipo : tipo_lugar}
  $.ajax({url:"../../index.php/gestao/delete",
  dataType:"json",
  data:fields,
  success:processDeleteResponse,
  error:function(jq,text,error){
    console.log(jq)
    console.log(text)
    console.log(error)
  },
  type:"POST"
  })
}

function main(){
  $("#pesquisa-btn").click(pesquisaLugar)
  $("#delete-btn").click(sendAjaxRequestDelete)
  $("#submit-btn").click(sendAjaxRequestUpdate)
  fila_s.on("input",checkFila)
  lugar_s.on("input",checkLugar)
}


main()
