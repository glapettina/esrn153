

/*=============================================
EDITAR INFORME CIENTIFICA
=============================================*/

$(".tablas").on("click", ".btnEditarInformeCientifica", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");
	

	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);
	


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	



			$("#idAlumno").val(respuesta["id"]);
			$("#saberesCientifica").val(respuesta["saberes_cientifica"]);
			$("#apreciaCientifica").val(respuesta["aprecia_cientifica"]);
			$("#asistenciaCientifica").val(respuesta["asistencia_cientifica"]);
			$("#observaCientifica").val(respuesta["observa_cientifica"]);			


								
		}
	})

	
})

/*=============================================
EDITAR INFORME SOCIALES
=============================================*/

$(".tablas").on("click", ".btnEditarInformeSociales", function(){


	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesSociales").val(respuesta["saberes_sociales"]);
			$("#apreciaSociales").val(respuesta["aprecia_sociales"]);
			$("#asistenciaSociales").val(respuesta["asistencia_sociales"]);
			$("#observaSociales").val(respuesta["observa_sociales"]);			


								
		}
	})

	
})

/*=============================================
EDITAR INFORME LENGUA
=============================================*/

$(".tablas").on("click", ".btnEditarInformeLengua", function(){


	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesLengua").val(respuesta["saberes_lengua"]);
			$("#apreciaLengua").val(respuesta["aprecia_lengua"]);
			$("#asistenciaLengua").val(respuesta["asistencia_lengua"]);
			$("#observaLengua").val(respuesta["observa_lengua"]);			


								
		}
	})

	
})

/*=============================================
EDITAR INFORME MATEMATICA
=============================================*/

$(".tablas").on("click", ".btnEditarInformeMatematica", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesMatematica").val(respuesta["saberes_matematica"]);
			$("#apreciaMatematica").val(respuesta["aprecia_matematica"]);
			$("#asistenciaMatematica").val(respuesta["asistencia_matematica"]);
			$("#observaMatematica").val(respuesta["observa_matematica"]);			


								
		}
	})

	
})

/*=============================================
EDITAR INFORME INGLES
=============================================*/

$(".tablas").on("click", ".btnEditarInformeIngles", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesIngles").val(respuesta["saberes_ingles"]);
			$("#apreciaIngles").val(respuesta["aprecia_ingles"]);
			$("#asistenciaIngles").val(respuesta["asistencia_ingles"]);
			$("#observaIngles").val(respuesta["observa_ingles"]);			


								
		}
	})

	
})

/*=============================================
EDITAR INFORME EDUCACIÓN FISICA
=============================================*/

$(".tablas").on("click", ".btnEditarInformeFisica", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesFisica").val(respuesta["saberes_fisica"]);
			$("#apreciaFisica").val(respuesta["aprecia_fisica"]);
			$("#asistenciaFisica").val(respuesta["asistencia_fisica"]);
			$("#observaFisica").val(respuesta["observa_fisica"]);			


								
		}
	})

	
})


/*=============================================
EDITAR INFORME EDUCACIÓN ARTÍSTICA
=============================================*/

$(".tablas").on("click", ".btnEditarInformeArtistica", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesArtistica").val(respuesta["saberes_artistica"]);
			$("#apreciaArtistica").val(respuesta["aprecia_artistica"]);
			$("#asistenciaArtistica").val(respuesta["asistencia_artistica"]);
			$("#observaArtistica").val(respuesta["observa_artistica"]);			


								
		}
	})

	
})


/*=============================================
EDITAR INFORME FOTOGRAFÍA
=============================================*/

$(".tablas").on("click", ".btnEditarInformeFotografia", function(){


	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesFotografia").val(respuesta["saberes_fotografia"]);
			$("#apreciaFotografia").val(respuesta["aprecia_fotografia"]);
			$("#asistenciaFotografia").val(respuesta["asistencia_fotografia"]);
			$("#observaFotografia").val(respuesta["observa_fotografia"]);			


								
		}
	})

	
})


/*=============================================
EDITAR INFORME REALIZACIÓN
=============================================*/

$(".tablas").on("click", ".btnEditarInformeRealizacion", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesRealizacion").val(respuesta["saberes_realizacion"]);
			$("#apreciaRealizacion").val(respuesta["aprecia_realizacion"]);
			$("#asistenciaRealizacion").val(respuesta["asistencia_realizacion"]);
			$("#observaRealizacion").val(respuesta["observa_realizacion"]);			


								
		}
	})

	
})


/*=============================================
EDITAR INFORME GUION
=============================================*/

$(".tablas").on("click", ".btnEditarInformeGuion", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesGuion").val(respuesta["saberes_guion"]);
			$("#apreciaGuion").val(respuesta["aprecia_guion"]);
			$("#asistenciaGuion").val(respuesta["asistencia_guion"]);
			$("#observaGuion").val(respuesta["observa_guion"]);			


								
		}
	})

	
})


/*=============================================
EDITAR INFORME SONIDO
=============================================*/

$(".tablas").on("click", ".btnEditarInformeSonido", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesSonido").val(respuesta["saberes_sonido"]);
			$("#apreciaSonido").val(respuesta["aprecia_sonido"]);
			$("#asistenciaSonido").val(respuesta["asistencia_sonido"]);
			$("#observaSonido").val(respuesta["observa_sonido"]);			


								
		}
	})

	
})


/*=============================================
EDITAR INFORME TALLER
=============================================*/

$(".tablas").on("click", ".btnEditarInformeTaller", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesTaller").val(respuesta["saberes_taller"]);
			$("#apreciaTaller").val(respuesta["aprecia_taller"]);
			$("#asistenciaTaller").val(respuesta["asistencia_taller"]);
			$("#observaTaller").val(respuesta["observa_taller"]);			


								
		}
	})

	
})

/*=============================================
EDITAR INFORME SEMIÓTICA
=============================================*/

$(".tablas").on("click", ".btnEditarInformeSemiotica", function(){


	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	var datos = new FormData();
	datos.append("idAlumno", idAlumno);
	datos.append("tabla", tabla);	
	datos.append("periodo", periodo);


	$.ajax({
		url: "ajax/informes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){	




			$("#idAlumno").val(respuesta["id"]);
			$("#saberesSemiotica").val(respuesta["saberes_semiotica"]);
			$("#apreciaSemiotica").val(respuesta["aprecia_semiotica"]);
			$("#asistenciaSemiotica").val(respuesta["asistencia_semiotica"]);
			$("#observaSemiotica").val(respuesta["observa_semiotica"]);			


								
		}
	})

	
})




/*=============================================
IMPRIMIR INFORME INDIVIDUAL
=============================================*/

$(".tablas").on("click", ".btnImprimirInformeIndividual", function(){



	var idAlumno = $(this).attr("idAlumno");
	var informe = $(this).attr("informe");
	var area = $(this).attr("area");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");


	window.open("extensiones/tcpdf/pdf/"+informe+".php?id="+idAlumno+"&informe="+informe+"&area="+area+"&tabla="+tabla+"&periodo="+periodo, "_blank");

})


/*=============================================
IMPRIMIR INFORME X ÁREA
=============================================*/

$(".btnInformeArea").click(function(){

//$(".tablas").on("click", ".btnInformeArea", function(){


	var idCurso = $(this).attr("idCurso");
	var idCurso2 = $(this).attr("idCurso2");
	var idCurso3 = $(this).attr("idCurso3");
	var informe = $(this).attr("informe");
	var area = $(this).attr("area");
	var tabla = $(this).attr("tabla");
	var periodo = $(this).attr("periodo");
	

	window.open("extensiones/tcpdf/pdf/"+informe+".php?informe="+informe+"&area="+area+"&tabla="+tabla+"&idCurso="+idCurso+"&idCurso2="+idCurso2+"&idCurso3="+idCurso3+"&periodo="+periodo, "_blank");

})

/*=============================================
IMPRIMIR INFORME CICLO BASICO
=============================================*/

$(".tablas").on("click", ".btnImprimirInformeCb", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var informe = $(this).attr("informe");
	var periodo = $(this).attr("periodo");


	window.open("extensiones/tcpdf/pdf/"+informe+".php?id="+idAlumno+"&tabla="+tabla+"&informe="+informe+"&periodo="+periodo, "_blank");

})

/*=============================================
  DESCARGAR INFORME GLOBAL CICLO BASICO
  =============================================*/


  $(".btnDescargaInformeGlobalCb").click(function(){

    var idCurso = $(this).attr("idCurso");
    var tabla = $(this).attr("tabla");
    var informe = $(this).attr("informe");
    var periodo = $(this).attr("periodo");


    window.open("extensiones/tcpdf/pdf/"+informe+".php?tabla="+tabla+"&informe="+informe+"&idCurso="+idCurso+"&periodo="+periodo, "_blank");

  })




/*=============================================
IMPRIMIR INFORME CICLO ORIENTADO 3ER. AÑO
=============================================*/

$(".tablas").on("click", ".btnImprimirInformeCo3", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var informe = $(this).attr("informe");
	var periodo = $(this).attr("periodo");




	window.open("extensiones/tcpdf/pdf/"+informe+".php?id="+idAlumno+"&tabla="+tabla+"&informe="+informe+"&periodo="+periodo, "_blank");

})


/*=============================================
IMPRIMIR INFORME CICLO ORIENTADO 4TO. AÑO
=============================================*/

$(".tablas").on("click", ".btnImprimirInformeCo4", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var informe = $(this).attr("informe");
	var periodo = $(this).attr("periodo");




	window.open("extensiones/tcpdf/pdf/"+informe+".php?id="+idAlumno+"&tabla="+tabla+"&informe="+informe+"&periodo="+periodo, "_blank");

})


/*=============================================
IMPRIMIR INFORME CICLO ORIENTADO 5TO. AÑO
=============================================*/

$(".tablas").on("click", ".btnImprimirInformeCo5", function(){



	var idAlumno = $(this).attr("idAlumno");
	var tabla = $(this).attr("tabla");
	var informe = $(this).attr("informe");
	var periodo = $(this).attr("periodo");




	window.open("extensiones/tcpdf/pdf/"+informe+".php?id="+idAlumno+"&tabla="+tabla+"&informe="+informe+"&periodo="+periodo, "_blank");

})