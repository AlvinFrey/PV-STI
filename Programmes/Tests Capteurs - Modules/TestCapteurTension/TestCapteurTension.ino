
#define PIN_TENSION_BATTERIE A0
#define PIN_TENSION_PANNEAU A2

void setup() {

	Serial.begin(9600);

}

void loop() {

	int tensionBatterie = ((analogRead(PIN_TENSION_BATTERIE) - 512)  * 0.073170)-2.55+1.60-2+0.5;
	Serial.println("Tension Batterie : " + String(tensionBatterie) + "V");

  if(tensionBatterie == 0 || tensionBatterie == -1){

    int tensionPanneau = ((analogRead(PIN_TENSION_PANNEAU) - 512) * 0.073170)+21.6-6-17;
    Serial.println("Tension Panneau : " + String(tensionPanneau) + "V");
    
  }else{

    int tensionPanneau = ((analogRead(PIN_TENSION_PANNEAU) - 512) * 0.073170)+21.6-6;
    Serial.println("Tension Panneau : " + String(tensionPanneau) + "V");
    
  }

  Serial.println("");

  delay(2000);


}
