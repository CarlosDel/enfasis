
      var divRoot = $("#affdex_elements")[0]; //DEBEMOS CREAR UN DIV Y ASIGNARLE UN ID
      var width = 0; //MARCO QUE SE CAPTURA
      var height = 0;//MARCO QUE SE CAPTURA
      //CONFIGURACION DEL DETECTOR DE ROSTROS
      //LARGE_FACE PARA ROSTROS QUE OCUPAN GRAN PARTE DEL MARCO
      var faceMode = affdex.FaceDetectorMode.LARGE_FACES;
      //VARIABLES GLOBALES
      var contPositivo=0;
      var contNegativo=0;
      var contNeutral=0;
      var sumaPositivo=0;
      var sumaNegativo=0;
      var sumaNeutral=0;
      var muestras=0;
     
      //DATOS A ENVIAR A LA BASE DE DATOS
      var neutralCont = 0;//ALMACENA EL VALOR FINAL DE PUNTOS EN EL ESTADO NEUTRAL
      var entretenidoCont=0;//ALMACENA EL VALOR FINAL DE PUNTOS EN EL ESTADO ENTRETENIDO
      var aburridoCont=0;//ALMACENA EL VALOR FINAL DE PUNTOS EN EL ESTADO ABURRIDO
      var neutralInt=0;//ALMACENA LA INTENSIDAD DEL ESTADO NEUTRAL
      var entretenidoInt=0;//ALMACENA LA INTENSIDAD DEL ESTADO ENTRETENIDO
      var aburridoInt=0;//ALMACENA LA INTENSIDAD DEL ESTADO ABURRIDO
        
      //CONSTRUCCION DE UN DETECTOR DE CAMARA Y ESPECIFICACION DEL MARCO Y FACEMODE      
      var detector = new affdex.CameraDetector(divRoot, width, height, faceMode);
    
      //HABILITAMOS LA DETECCIÓN DE EXPRESIONES, EMOCIONES Y EMOJIS      
      detector.detectAllEmotions();
      //detector.detectAllExpressions();
      //detector.detectAllEmojis();
      //detector.detectAllAppearance();

      //AGREGAMOS UNA NOTIFICACION DE EN QUÉ MOMENTO SE HA INICIALIZADO EL DETECTOR Y       
      detector.addEventListener("onInitializeSuccess", function() {
        log('#logs', "El dectector ha sido inicializado");
        //PODEMOS CON ESTAS 2 LINEAS MOSTRAR LOS PUNTOS DETECTADOS EN EL ROSTRO
        $("#face_video_canvas").css("display", "block");
        $("#face_video").css("display", "none");
      });

      //FUNCION PARA MOSTRAR EN PANTALLA: RECIBE EL #ID DE UN DIV Y EL MENSAJE
      function log(id, msg) {
        $(id).append("<span>" + msg + "</span><br />")
      }

      //CUANDO TERMINA UN VIDE
      document.getElementById('affdex_elements').onended=function(){
      onSiguiente();
     }

      //ACCION DEL BOTON STAR
      function onStart() {   
          if(document.getElementById('affdex_elements').paused){            
		        playbtn.style.background = "url('dist/img/pause.png') no-repeat";
            document.getElementById('affdex_elements').play();
            if (detector && !detector.isRunning) {
              $("#logs").html("");
              detector.start();         
            };
            log('#logs', "Clicked En el boton Star"); 

          } else{
            document.getElementById('affdex_elements').pause();
            playbtn.style.background = "url('dist/img/play.png') no-repeat";
            log('#logs', "PAUSADO CON UN BOTON---");
            onStop(); 
          }    
              
      }

      //ACCION EN EL BOTON STOP
      function onStop() {
        if (detector && detector.isRunning) {        
            detector.stop();      
            document.getElementById("affdex_elements").pause();
            log('#logs', "se ha pausado----numero de muestras:----- "+  muestras );        
        }
      };
     

      //ACCION EN EL BOTON RESET
      function onSiguiente() {
        document.getElementById('affdex_elements').pause();
        var promedio=0;
        log('#logs', "Clicked En el boton Stop");        
        if(sumaPositivo>sumaNegativo){
          promedio = sumaPositivo/contPositivo;
          promedio = 2.5 + ((promedio*2.5)/100);
          log('#logs', "PROMEDIO POSITIVO: " + promedio+ "---MUESTRAS---"+contPositivo);
        }else if(sumaNegativo>sumaPositivo){
          promedio = sumaNegativo/contNegativo;
          promedio = 2.5 - ((promedio*2.5)/100);
          log('#logs', "PROMEDIO NEGATIVO: " + promedio+ "---MUESTRAS---"+contNegativo);
        }else{
          promedio = sumaNeutral/contNeutral;
          log('#logs', "PROMEDIO NEGATIVO: " + promedio+ "---MUESTRAS---"+contNeutral);
        }
        
        if(muestras>0){
            log('#logs', "javascript---OJO----: " + idUserJS+ "---y con video:---"+idVideoJS);
            var vector=[idUserJS,idVideoJS,catVideoJS,promedio];
            vector.toString();           
            $("#contenedor").load("registroBd.php",{var:vector});

        }else{
            log('#logs', "ALERTA NO HAY MUESTRAS");
        }       
        
        if (detector && detector.isRunning) {
          detector.removeEventListener();
          detector.stop();         
          document.getElementById("affdex_elements").pause();
          log('#logs', "se ha pausado: " );
       
        }

        
      };
     
      //AGREGAMOS UNA NOTIFICACIÓN DE QUE SE HAY ACCESO PERMITIDO DE CÁMARA
      detector.addEventListener("onWebcamConnectSuccess", function() {
        log('#logs', "Webcam Acceso Permitido");
      });

      //AGREGAMOS UNA NOTIFICACIÓN DE QUE SE HAY ACCESO DENEGADO DE CÁMARA
      detector.addEventListener("onWebcamConnectFailure", function() {
        log('#logs', "Webcam APP Denegada");
        console.log("Webcam access denegada");
      });

      //AGREGAMOS UNA NOTIFICACIÓN DE QUE EL DETECTOR SE HA DETENIDO
      detector.addEventListener("onStopSuccess", function() {
        log('#logs', "El detector ha sido detenido");
        $("#results").html("");
      });

     
      //RECIBIMOS LOS DATOS PROCESADOS DE LA IMAGEN
      //RESULT ES EL ID DE UN DIV
      detector.addEventListener("onImageResultsSuccess", function(faces, image, timestamp) {
        $('#results').html("");
        //MOSTRAMOS EL TIEMPO QUE TRANSCURRE CON TIMESTAMP
        //TOFIXED FORMATEA LOS NUMEROS CON NOTACION DE PUNTO 
        log('#results', "Timestamp: " + timestamp.toFixed(2));
        log('#results', "Numero de rostros encontrados: " + faces.length);

        //SI SE ENCUENTRA POR LO MENOS UN ROSTRO
        if (faces.length > 0) {
        //-----------------------MOSTRAMOS EN PANTALLA LOS DATOS DE APARIENCIA
        //-----------------------OBTENEMOS GENERO-GLASSES-RANGO DE EDAD
        //  log('#results', "Apariencia: " + JSON.stringify(faces[0].appearance));
        //-----------------------MOSTRAMOS EN PANTALLA LOS DATOS DE EMOCIONES
        //-----------------------OBTENEMOS JOY-SADNESS-DISGUST-CONTEMP-ANGER-FEAR-SURPRISE-VALENCE-GAGEMENT
          log('#results', "Emociones: " + JSON.stringify(faces[0].emotions, function(key, val) {            
            return val.toFixed ? Number(val.toFixed(0)) : val;
          }));
        //ALMACENAMOS LAS EMOCIONES EN UNA SOLA VARIABLE QUE SERÁ PROCESADA PARA PROMEDIOS
          var emotions = JSON.stringify(faces[0].emotions, function (key, val) {
                return val.toFixed ? Number(val.toFixed(0)) : val;
            })
        //-----------------------MOSTRAMOS EN PANTALLA LOS DATOS DE EXPRESIONES
        //-----------------------ENTRE ESOS DATOS SE OBTIENE LA SONRISA-BOCA ABIERTA-FRENTE-ATENCION ETC
        //  log('#results', "Expresiones " + JSON.stringify(faces[0].expressions, function(key, val) {
        //    return val.toFixed ? Number(val.toFixed(0)) : val;
        //  }));
          
        //-----------------------MOSTRAMOS EN PANTALLA LOS EMOJIS QUE REPRESENTAN NUESTRAS EMOCIONES
        // log('#results', "Emoji: " + faces[0].emojis.dominantEmoji);
        
          
          
          //DIBUJAMOS LOS PUNTOS SOBRE LA IMAGEN QUE SE TOMA DE LA CAMARA
          //drawFeaturePoints(image, faces[0].featurePoints);
          
          //DEBEMOS RECIBIR LAS EMOCIONES Y GUARDARLAS EN UNA VARIABLE QUE LUEGO SERÁ PARAMETRO
          //DE UNA FUNCIÓN

          var objEmociones = JSON.parse(emotions);//CONVIERTE LA CADENA EN UN OBJETO JAVASCRIPT
          CalcularPromedio(objEmociones);//LLAMAMOS A LA FUNCION
          log('#logs', "MUESTRAS EN TIEMPO REAL:----- "+  muestras );
          muestras=muestras+1;
        }
      });

      //DIBUJA LOS PUNTOS CARACTERÍSTICOS FACIALES DETECTADOS EN LA IMAGEN
   
       function CalcularPromedio(objEmociones){
        //CADA UNA DE LAS EMOCIONES SE ALMACENA EN UNA VARIABLE
        var joy = objEmociones.joy;//ALEGRIA
        var sadness = objEmociones.sadness;//TRISTEZA
        var disgust = objEmociones.disgust;//ASCO
        var contempt = objEmociones.contempt;//DESPRECIO
        var anger = objEmociones.anger;//ENFADO
        var fear = objEmociones.fear;//MIEDO
        var surprise = objEmociones.surprise;//SORPRESA

        var eAPositivo= (joy*0.8)+(fear*0.05)+(surprise*0.15);
        var eANegativo= (sadness*0.2)+(disgust*0.2)+(anger*0.2)+(contempt*0.2);
        var estadoAnimo=2.5;
        
        if(eAPositivo>eANegativo){
          sumaPositivo= sumaPositivo+eAPositivo;
          estadoAnimo= estadoAnimo + ((eAPositivo*(2.5)/100));
          log('#results', 'Estado de Animo Positivo: ' +estadoAnimo+'Algria:'+joy);
          contPositivo = contPositivo+ 1;
          
        }else if(eANegativo>eAPositivo){
          sumaNegativo = sumaNegativo + eANegativo;
          estadoAnimo= estadoAnimo - ((eANegativo*(2.5)/100));
          log('#results', 'Estado de Animo Negativo' +estadoAnimo+'Rabia'+anger);
          contNegativo=contNegativo+1;
          
        }else if(eANegativo==eAPositivo){
          sumaNeutral = sumaNeutral+eANegativo;          
        log('#results', 'Estado de Animo Neutral ' +estadoAnimo);
        contNeutral = contNeutral+1;
        
        }
        



       
        }

    
