
var dataURL;
var image="";
var url = getAbsolutePath();
var dataExam={};
var resultado="";
$(document).ready(function(){
   setupDatatables();
   setupValidator();
})
//display modal form for product editing
$(document).on('click','.open_modal',function(){
    
    var model = $(this).attr("model");
    var action = $(this).attr("action");
    var title = $(this).attr("title");
    var file = $(this).attr("file");
    var alter = $(this).attr("alter");
    if(file==1){
        $(".action").css("display","none");
    }

    $.get(url + model + action, function (data) {
        //success data
        
        $("#modal-content").html(data);
        
        
        setupValidator();

        $('.typeahead').ready(function(){
          var modsel = $(".typeahead").attr("model");
          var actsel = $(".typeahead").attr("action");
          $.get(modsel+".json",function(res){
            var  $input = $('.typeahead');
            $input.typeahead({
              source: res.exams,
              autoSelect: true
            });
            $input.change(function() {
              var current = $input.typeahead("getActive");
                if (current) {
                  // Some item from your model is active!
                  if (current.name == $input.val()) {
                    $("#"+modsel).val(current.id);
                    $.get(url + modsel+ "/" + actsel+ "/"+ current.id, function (data) {
                        console.log(data);
                        dataExam=data;
                    });
                  } else {
                    dataExam = {};
                  }
                }
            });
          });
        });

        $(".select2").select2({placeholder: 'Select an option'});


        $(".selectreturns").change(function(){
          var modsel = $(this).attr("model");
          var actsel = $(this).attr("action");
          var obj = $(this).attr("obj");
          $.get(url + modsel+ "/" + actsel+ "/"+ $(this).val(), function (data) {
            
            $("#"+obj).html("");
            for (var i = 0; i < data[obj].length; i++) {
              var option = "<option value='"+data[obj][i].id+"'>"+data[obj][i].name+"</option>";
              $("#"+obj).append(option);
            }
            
          });
        });

        if(alter=="ckedit"){
          CKEDITOR.replace( 'findings' );
          CKEDITOR.replace( 'secondoption' );
          CKEDITOR.replace( 'oneoption' );
          CKEDITOR.instances.findings.on('key', function(e) {
              var self = this;
              setTimeout(function() {
                  //console.log();
                  var word = self.getData().replace("<p>","").replace("</p>","");
                  word = word.replace("&nbsp;","").replace("&nbsp;","");
                  word = word.replace('<span style="display:none"></span>',"");
                  resultado =word;
                  if(resultado!=""){

                    $.get(url + "word/find/" + resultado , function (data) {
                        word  = word.replace(resultado,data.word.description).replace("*"," ");
                        word  = word.replace("*"," ");
                        CKEDITOR.instances['findings'].setData(word);
                    });
                  }else{
                    resultado="";
                  }
              }, 10);-1
          });
          CKEDITOR.instances.secondoption.on('key', function(e) {
              var self = this;
              setTimeout(function() {
                  //console.log();

                  var word = self.getData().replace("<p>","").replace("</p>","");
                  word = word.replace("&nbsp;","").replace("&nbsp;","");
                  word = word.replace('<span style="display:none"></span>',"");
                  resultado =word;
                  if(resultado!=""){

                    $.get(url + "word/find/" + resultado , function (data) {
                        word  = word.replace(resultado,data.word.description).replace("*"," ");
                        word  = word.replace("*"," ");
                        CKEDITOR.instances['secondoption'].setData(word);
                    });
                  }else{
                    resultado="";
                  }

                  /*var word = self.getData().replace("<p>","").replace("</p>","");
                  word = word.replace("&nbsp;","").replace("&nbsp;","");
                  resultado =word.split(" ");
                  if(resultado.length>0){
                   if(word!=""){

                    $.get(url + "word/find/" + word , function (data) {
                        word  = word.replace(resultado[resultado.length-1],data.word.description).replace("*"," ");
                        word  = word.replace("*"," ");
                        CKEDITOR.instances['secondoption'].setData(word);
                    });
                  }*/
              }, 10);
          });
          CKEDITOR.instances.oneoption.on('key', function(e) {
              var self = this;
              setTimeout(function() {
                  //console.log();
                  var word = self.getData().replace("<p>","").replace("</p>","");
                  word = word.replace("&nbsp;","").replace("&nbsp;","");
                  word = word.replace('<span style="display:none"></span>',"");
                  resultado =word;
                  if(resultado!=""){

                    $.get(url + "word/find/" + resultado , function (data) {
                        word  = word.replace(resultado,data.word.description).replace("*"," ");
                        word  = word.replace("*"," ");
                        CKEDITOR.instances['oneoption'].setData(word);
                    });
                  }else{
                    resultado="";
                  }
                  /*var word = self.getData().replace("<p>","").replace("</p>","");
                  word = word.replace("&nbsp;","").replace("&nbsp;","");
                  resultado =word.split(" ");
                  if(resultado.length>0){
                  if(word!=""){

                    $.get(url + "word/find/" + word , function (data) {
                        word  = word.replace(resultado[resultado.length-1],data.word.description).replace("*"," ");
                        word  = word.replace("*"," ");
                        CKEDITOR.instances['oneoption'].setData(word);
                    });
                  }*/
              }, 10);
          });
        }
        $(".typeaheadAsign").click(function(){
            CKEDITOR.instances['findings'].setData(dataExam.exams.description);
            CKEDITOR.instances['oneoption'].setData(dataExam.exams.oneoption);
            CKEDITOR.instances['secondoption'].setData(dataExam.exams.secondoption);
            $("#diagnostic").val(dataExam.exams.diagnostic);
            
        });

        $("#modal-title").html(title);
        $('#generalModal').modal('show');
        
    }) 
});

$(document).on('click','.favorite',function(){

      var action=$(this).attr('action');

      $.ajax({
        type: "POST",
        url: action,
        data: {id:$("#entitie_id").val(),_token:$("input[name='_token']").val()},
        success: function( response ) {

        }
      });
    return false;
});


$(document).on('click','.action2',function(){

    var form=$("form");
    var findings="";
    var oneoption="";
    var secondoption="";
    var firstname="";
    var lastname="";
    var dni="";
    var gender="";
    var date="";
    var exam="";
    var specialist="";
    var entitie="";
    var typeexam="";
    var diagnostic="";
    var exam="";
    var formalitie="";
    var name="";
    var description="";
    var comparative="";
    var opt={};
    if(form.attr('data-model')=="results" || form.attr('data-model')=="formalities" || form.attr('data-model')=="exams"){
      if(form.attr('method')!="DELETE" ){
          if(typeof CKEDITOR.instances['findings']!="undefined"){
                findings=CKEDITOR.instances['findings'].getData();
          }
          if(typeof CKEDITOR.instances['oneoption']!="undefined"){
            oneoption=CKEDITOR.instances['oneoption'].getData();
          }
          if(typeof CKEDITOR.instances['secondoption']!="undefined"){
            secondoption=CKEDITOR.instances['secondoption'].getData();
          }
          
      }
      firstname = $("input[name='firstname']").val();
      lastname = $("input[name='lastname']").val();
      dni = $("input[name='dni']").val();
      gender = $("select[name='gender']").val();
      date = $("input[name='date']").val();
      exam_id = $("input[name='exam_id']").val();
      exam = $("input[name='exam']").val();
      specialist = $("select[name='specialist_id']").val();
      entitie = $("select[name='entitie_id']").val();
      typeexam = $("select[name='typeexam_id']").val();
      diagnostic = $("input[name='diagnostic']").val();
      formalitie = $("input[name='formalitie_id']").val();
      name = $("input[name='name']").val();
      comparative = $("input[name='comparative']").is(':checked');
      
      //opt+="&findings="+findings+"&oneoption="+oneoption+"&s|econdoption="+secondoption+"";
      opt={findings:findings,
            oneoption : oneoption,
            secondoption : secondoption,
            firstname : firstname,
            lastname : lastname,
            dni : dni,
            gender : gender,
            date : date,
            exam_id : exam_id,
            exam: exam,
            specialist_id : specialist,
            entitie_id : entitie,
            typeexam_id : typeexam,
            diagnostic : diagnostic,
            formalitie_id:formalitie,
            name:name,
            description:findings,
            comparative:comparative,
            _token:$("input[name='_token']").val()
         };

    }
    var btn=this;
    $(btn).attr("disabled","disabled");
    $("form").validate();
    if($("form").isValid()){
      $.ajax( {
        type: form.attr('method'),
        url: form.attr('action'),
        data: opt,
        success: function( response ) {
           //
           $('#generalModal').modal('hide');
            if(form.attr('data-model')=="results" &&  form.attr('method')=="POST"){
              console.log(response.data);
              //for (var i = 0; i < response.data.length ;  i++) {
                $("#"+formalitie).addClass("success");
                $("#btn"+formalitie).css("visibility","hidden");
                $("#btn2"+formalitie).css("display","block");
                window.open(url+'results/certificate/'+response.data);
              //}
            }else{
              var rsponJson = form.attr("jresponse");
              if(rsponJson=='true'){
                console.log(response);
                $(".master_list").html(response.view);
              }else{
                $(".master_list").html(response);
              }
              window.open(url+'results/certificate/'+response.data);
              
              setupDatatables();
            }
            $(btn).removeAttr("disabled");
        }
      });
    }else{
      $(btn).removeAttr("disabled");
    }
    
    return false;
});

$(document).on('click','.action',function(){

    var form=$("form");
    var btn=this;
    $(btn).attr("disabled","disabled");
    $("form").validate();
    if($("form").isValid()){
      $.ajax( {
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function( response ) {
           $(".master_list").html(response);
           $('#generalModal').modal('hide');
           $(btn).removeAttr("disabled");
           setupDatatables();
        }
      });
    }else{
      $(btn).removeAttr("disabled");
    }

    return false;
});

$(document).on('click','.upload',function(){

    var form=$("form");

    var formData  = new FormData(form[0]);
    $.ajax( {
      type: form.attr('method'),
      url: form.attr('action'),
      processData: false,
      contentType: false,
      data: formData,
      success: function( response ) {
         $(".master_list").html(response);
         $('#generalModal').modal('hide');
      }
    });
    
    return false;
});

$(document).on('click','.nav_active',function(){
    $(".nav_active").removeClass("active");
    $(this).addClass("active");
});
$(document).on('change','.typeexamreport',function(){
  $("#fecinim").val("");
  $("#fecfin").val("");
  $("#fecinid").val("");
});
$(document).on('change','.selectAction',function(){
    reportView(this);
});
$(document).on('click','.selectDowloand',function(){
    reportDowloand(this);
});


function asignresults(element) {
  var model = $(element).attr("model");
  var action = $(element).attr("action");
  var id =$(element).val();
  $.get(url + model+ "/" + action+ "/"+ id, function (data) {
      console.log(data);
      $("#findings").html(data.exams.description);
      $("#oneoption").val(data.exams.oneoption);
      $("#secondoption").val(data.exams.secondoption);
  });
}

var openFile = function(event) {
  var input = event.target;

  var reader = new FileReader();
  reader.onload = function(){
    dataURL = reader.result;
    var output = document.getElementById('output');
    output.src = dataURL;
    image="&image="+dataURL;
  };
  reader.readAsDataURL(input.files[0]);
};


function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}

function setupDatatables(){
  $('.example2').DataTable({
      "language": {
            "lengthMenu": "_MENU_ registros por página",
            "zeroRecords": "Nada Encontrado - lo sentimos",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "search": "Buscar:",
            "infoFiltered":   "(filtrada a partir de  _MAX_ entradas totales)",
            "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
          },
        },
        "pageLength": 25,
    });

  $(".select2").select2({placeholder: 'Select an option'});
}



function setupValidator(){
  $.validate({
    lang: 'es'
  });

  $('.datepicker').datepicker({
    
    format: 'yyyy-mm-dd'
  });


}

function reportView(element){
  var model = $(element).attr("model");
    var action = $(element).attr("action");
    var type = $(element).attr("types");
    var token = $("input[name='_token']").val();
    var fechaini = $("#fecinim").val();
    var typeexam_id1 = $("#typeexam_id1").val();
    var typeexam_id2= $("#typeexam_id2").val();
    

    $.post(url + model + action,{fecha:$(element).val(),fecini:fechaini,typeexam_id1:typeexam_id1,typeexam_id2:typeexam_id2,type:type,_token:token}, function (data) {
        //success data
        $("#select-content2").html("");
        $("#select-content1").html("");
        
        if(type=="1"){
          $("#select-content1").html(data);
        }else{
          $("#select-content2").html(data);
        }

        setupDatatables();
        
    });
}

function reportDowloand(element){
   var model = $(element).attr("model");
    var action = $(element).attr("action");
    var type = $(element).attr("types");
    var format = $(element).attr("format");
    var token = $("input[name='_token']").val();
    var fechaini = $("#fecinim").val();
    var fecha = $("#fecfin").val();
    var typeexam_id1 = $("#typeexam_id1").val();
    var typeexam_id2= $("#typeexam_id2").val();
    
    if(type=="2"){
      fechaini = $("#fecinid").val();
    }

    $.get(url + model + action,{fecha:fecha,fecini:fechaini,format:format,typeexam_id1:typeexam_id1,typeexam_id2:typeexam_id2,type:type,_token:token}, function (data) {
        //success data
        window.open(data, '_blank');
        return false;
    })
}

function searchChart(word){
  const regex = /\*([^"]*)\*/g,
          texto = word;
    var   grupo,
          resultado = [];
    
    while ((grupo = regex.exec(texto)) !== null) {
        //si coincide con comillas dobles, el contenido estará en el
        //   grupo[1], con el grupo[2] undefined, y viceversa
        resultado.push(grupo[1]);
    }
    
    //resultado es un array con todas las coincidencias
    // mostramos los valores separados con saltos de línea
    console.log(resultado);
    return resultado;
}