
#include <Arduino.h>

/**
 * Cette fonction permet d'envoyer une commande AT sur l'ESP8266.
 * @param commande le message AT que l'on veut envoyer.
 */

void ESPSend(String commande){

  Serial1.println(commande);

}

/**
 * Cette fonction permet de lire ce que nous envoie l'ESP8266.
 * @param timeout le temps avant lequel nous recevons les données.
 * @returns la réponse du module ESP8266.
 */

void ESPReceive(const int timeout){

  String reponse = "";
  long int time = millis();
  while( (time+timeout) > millis()){
    while(Serial1.available()){
      char c = Serial1.read();
      reponse+=c;
    }
  }
  Serial.print(reponse);  

}

/**
 * Cette fonction permet d'initialiser proprement le module ESP8266.
 * @returns les différents messages de l'ESP8266.
 */

void ESPInit(){

  ESPSend("AT+RST");
  ESPReceive(2000);

  ESPSend("AT+CIOBAUD=115200");
  ESPReceive(2000);

  ESPSend("AT+CWMODE=1");
  ESPReceive(2000);

  ESPSend("AT+CWJAP=\""+ SSID + "\",\"" + PASSWORD +"\"");
  ESPReceive(9000);

  ESPSend("AT+CIPSTATUS");
  ESPReceive(4000);

  ESPSend("AT+CIFSR");
  ESPReceive(3000);

  ESPSend("AT+CIPMUX=1");
  ESPReceive(3000);

}

/**
 * Cette fonction permet d'envoyer un fichier JSON via l'ESP8266.
 * @param postData la requête HTTP à envoyer.
 * @returns les réponses du module ESP8266.
 */

void JSONsend(String postData){

	int postDataLength = postData.length();
	ESPSend("AT+CIPSTART=4,\"TCP\",\""+ String(PANEL_IP) +"\",80");
	ESPReceive(4000);
	ESPSend("AT+CIPSEND=4,"+ String(postDataLength) +"");
	ESPReceive(2000);
	Serial1.print(postData);
	ESPReceive(2000);
	ESPSend("AT+CIPCLOSE=4");
	ESPReceive(2000);
  Serial1.end();

}