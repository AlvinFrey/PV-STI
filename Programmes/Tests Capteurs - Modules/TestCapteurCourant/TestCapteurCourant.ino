
#define PIN_COURANT_BATTERIE A1
#define PIN_COURANT_PANNEAU A3

void setup() {
  Serial.begin(9600);      
}

void loop() {


	float courantBatterieAnalogique = map(analogRead(PIN_COURANT_BATTERIE), 0, 1023, 0, 5000);
  	courantBatterieAnalogique = courantBatterieAnalogique / 1000; 
  	float courantBatterie = abs((((courantBatterieAnalogique * 125) - 312.5)/7.5)-3+2.15+0.3);    

  	Serial.println("Courant Batterie : " + String(courantBatterie) + "A");    

  	float courantAnalogique = map(analogRead(PIN_COURANT_PANNEAU), 0, 1023, 0, 5000);
  	courantAnalogique = courantAnalogique / 1000; 
  	int courantPanneau = abs((((courantAnalogique * 125) - 312.5)/7.5)-33+5);              
       
  	Serial.println("Courant Panneau : " + String(courantPanneau) + "A");   

    Serial.println("");

  	delay(2000); 

}
