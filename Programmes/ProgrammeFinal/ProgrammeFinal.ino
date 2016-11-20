#include "ArduinoJson.h"

#include "Variables.h"
#include "FonctionsUtiles.h"
#include "FonctionsESP.h"

void setup(){

	Serial.begin(1200);
	Serial1.begin(115200);
	Serial2.begin(1200, SERIAL_7E1);

}

void loop(){

  int tensionBatterie = ((analogRead(PIN_TENSION_BATTERIE) - 512)  * 0.073170)-2.55+1.60-2+0.5;

  if(tensionBatterie>=0.99){

    battery["tensionBatterie"] = tensionBatterie;

  }

  float courantBatterieAnalogique = map(analogRead(PIN_COURANT_BATTERIE), 0, 1023, 0, 5000);
  courantBatterieAnalogique = courantBatterieAnalogique / 1000; 
  float courantBatterie = abs((((courantBatterieAnalogique * 125) - 312.5)/7.5)-3+2.15+0.3);    

  if(courantBatterie>=0.99){

    battery["courantBatterie"] = courantBatterie;

  }

  if(tensionBatterie == 0 || tensionBatterie == -1){

    int tensionPanneau = ((analogRead(PIN_TENSION_PANNEAU) - 512) * 0.073170)+21.6-6-17;

    if(tensionPanneau>=0.99){

      panel["tensionPanneau"] = tensionPanneau;

    }
    
  }else{

    int tensionPanneau = ((analogRead(PIN_TENSION_PANNEAU) - 512) * 0.073170)+21.6-6;
    
    if(tensionPanneau>=0.99){

      panel["tensionPanneau"] = tensionPanneau;

    }
  
  }

    float courantAnalogique = map(analogRead(PIN_COURANT_PANNEAU), 0, 1023, 0, 5000);
    courantAnalogique = courantAnalogique / 1000; 
    int courantPanneau = abs((((courantAnalogique * 125) - 312.5)/7.5)-33+5);           

  if(courantPanneau>=0.99){

    panel["courantPanneau"] = courantPanneau;

  }
    
  panel["puissancePanneau"] = computePower(panel["tensionPanneau"], panel["courantPanneau"]);

	while (charIn != startFrame)  { 
        if (Serial2.available()){
            charIn = Serial2.read();
        }
    }

    while (charIn != endFrame) {

      if (Serial2.available()) {

          charIn = Serial2.read(); 

          if(charIn == startLine) {

              nbCharLigne = 0;
              memset(bufferLigne, 0, sizeof(bufferLigne));
     
          } 

          bufferLigne[nbCharLigne] = charIn;

          if (charIn == endLine) {
          
              int in = String(bufferLigne).indexOf("BASE");
              if (in==1) {

				        teleinfo["teleinfoBASE"] = atol(&bufferLigne[5]); 
           
              }

              in = String(bufferLigne).indexOf("IINST");
              if (in==1) {

               teleinfo["teleinfoIINST"] = atoi(&bufferLigne[6]); 
           
              }

              in = String(bufferLigne).indexOf("PAPP");
              if (in==1) {

               teleinfo["teleinfoPAPP"] = atoi(&bufferLigne[5]); 
           
              }

          } else {
            nbCharLigne++;
          }
      }
    
    }

	other["authentification"] = REQUEST_KEY;

	char bufferOk[270];
	root.printTo(bufferOk, sizeof(bufferOk));

	Serial.println(bufferOk);

	ESPInit();

	JSONsend("GET /api/dataParser?json="+String(bufferOk)+" HTTP/1.1\r\nHost: "+ String(PANEL_IP) +"\r\n\r\n");
  ESPReceive(2000);

  delay(sleepTime);

  jsonBuffer = StaticJsonBuffer<200>();

}
