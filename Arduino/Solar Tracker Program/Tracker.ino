#include <Moteur.h>

Moteur moteur(2,3,4,5,6,7);
bool mode = false; //false = automatic & true = manual
const int Bmode = 8; // Mode change button.
const int Tdroite = 9; // Button to the right manually.
const int Tgauche = 10; // Button left-handed manually.
int erreur = analogRead(A0)-analogRead(A1);

void setup() {
 
  Serial.begin(9600);
  pinMode(Bmode, INPUT_PULLUP);
  pinMode(Tdroite, INPUT_PULLUP);
  pinMode(Tgauche, INPUT_PULLUP);


}

void loop()
{
  Serial.println(digitalRead(Bmode));
	if(digitalRead(Bmode) == LOW){

	    if(mode == false){

	        mode = true;
          delay(500);
	    }
	    else
	    {
	    	mode = false;
        delay(500);
	    }

	}

  Serial.println(mode);
	if(mode == false){ //mode automatique

    Serial.println("Mode Automatique");
		int panneauDroit = (analogRead(A0)/2); // Retrieves the analogue value A0 and divides it by 2.
		int panneauGauche = (analogRead(A1)+erreur)/2; // Retrieves the analogue value A1 and divides it by 2.

		Serial.println("Droit");
		Serial.println(panneauDroit);
		Serial.println("Gauche");
		Serial.println(panneauGauche);

		if(digitalRead(Tdroite) == LOW){
		    if(digitalRead(Tgauche) == LOW){
		    	erreur = analogRead(A0)-analogRead(A1);		        
		    }
		}

		if (panneauDroit > panneauGauche){  

			moteur.droite(1, 512); // Turns to the right.

		}else if(panneauDroit < panneauGauche){ 

			moteur.gauche(1, 512); // Turns to the left.

		}else {   

			moteur.stop(1); // Stop engine.
  
		}

		delay(250);
	}

	else // Manual mode.

	{
    Serial.println("Mode Manuel");
		if(digitalRead(Tdroite) == LOW){ // The motor rotates manually to the right.

		    moteur.droite(1, 0);

		}else if(digitalRead(Tgauche) == LOW){ // The engine rotates manually to the left.

			moteur.gauche(1, 0);

		}else { // Stop engine.

			moteur.stop(1);
			
		}

	}

}
