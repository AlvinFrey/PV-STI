
#include <ArduinoJson.h>

String SSID="SSID";
String PASSWORD="PASSWORD";

void setup(){

  Serial.begin(9600);
  Serial3.begin(115200);  
  ESPInit();

}

void loop(){

  while(Serial3.available()){    
    Serial.println(Serial3.readString());
  }   

}

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

  StaticJsonBuffer<200> jsonBuffer;

	JsonObject& array = jsonBuffer.createObject();
	array["tensionBatterie"] = 1;
	array["tensionPanneaux"] = random(0, 25);
	array["intensiteBatterie"] = random(0, 25);
	array["intensitePanneaux"] = random(0, 25);

	char bufferOk[256];
	array.printTo(bufferOk, sizeof(bufferOk));

  JSONsend("GET /api/dataParser?json="+String(bufferOk)+" HTTP/1.1\r\nHost: IP\r\n\r\n");
  ESPReceive(2000);

}

void JSONsend(String postData){

	int postDataLength = postData.length();
	ESPSend("AT+CIPSTART=4,\"TCP\",\"IP\",80");
	ESPReceive(4000);
	ESPSend("AT+CIPSEND=4,"+ String(postDataLength) +"");
	ESPReceive(2000);
	Serial3.print(postData);
	ESPReceive(2000);
	ESPSend("AT+CIPCLOSE=4");
	ESPReceive(2000);

}

void ESPSend(String commande){

   Serial3.println(commande);

}

void ESPReceive(const int timeout){

  String reponse = "";
  long int time = millis();
  while( (time+timeout) > millis()){
    while(Serial3.available()){
      char c = Serial3.read();
      reponse+=c;
    }
  }
  Serial.print(reponse);  

}
