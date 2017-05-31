
#include "Moteur.h"

 #if defined(ARDUINO) && ARDUINO >= 100
      #include "Arduino.h"
    #else
      #include "WProgram.h"
    #endif

Moteur::Moteur(int DIR1A, int DIR1B, int ENABLE1, int DIR2A, int DIR2B, int ENABLE2){

  _dir1a = DIR1A; 
  _dir1b = DIR1B;
  _e1 = ENABLE1;  

  _dir2a = DIR2A; 
  _dir2b = DIR2B;
  _e2 = ENABLE2;  

  pinMode(_dir1a, OUTPUT);
  pinMode(_dir1b, OUTPUT);
  pinMode(_e1, OUTPUT);
 
  pinMode(_dir2a, OUTPUT);
  pinMode(_dir2b, OUTPUT);
  pinMode(_e2, OUTPUT); 

}

void Moteur::gauche(int MOTOR_NUM, int MOTOR_SPEED){

  if(MOTOR_NUM == 1){
    
    digitalWrite(_e1, HIGH);
    digitalWrite(_dir1a, HIGH);
    digitalWrite(_dir1b, LOW);

    if(MOTOR_SPEED != 0){

	   analogWrite(_e1, MOTOR_SPEED);

    } 
    
  }else if(MOTOR_NUM == 2){

    digitalWrite(_e2, HIGH);
    digitalWrite(_dir2a, HIGH);
    digitalWrite(_dir2b, LOW);
	
    if(MOTOR_SPEED != 0){

	   analogWrite(_e2, MOTOR_SPEED);

    } 

  }

}

void Moteur::droite(int MOTOR_NUM, int MOTOR_SPEED){

  if(MOTOR_NUM == 1){
    
    digitalWrite(_e1, HIGH);
    digitalWrite(_dir1a, LOW);
    digitalWrite(_dir1b, HIGH); 

    if(MOTOR_SPEED != 0){

	   analogWrite(_e1, MOTOR_SPEED);

    } 
    
  }else if(MOTOR_NUM == 2){

    digitalWrite(_e2, HIGH);
    digitalWrite(_dir2a, LOW);
    digitalWrite(_dir2b, HIGH);

    if(MOTOR_SPEED != 0){

	   analogWrite(_e2, MOTOR_SPEED);

    } 
   
  }
  
}


void Moteur::stop(int MOTOR_NUM){

  if(MOTOR_NUM == 1){
    
    digitalWrite(_e1, HIGH);
    digitalWrite(_dir1a, HIGH);
    digitalWrite(_dir1b, HIGH); 
    
  }else if(MOTOR_NUM == 2){

    digitalWrite(_e2, HIGH);
    digitalWrite(_dir2a, HIGH);
    digitalWrite(_dir2b, HIGH);
   
  }else if(MOTOR_NUM == 3){

    digitalWrite(_e1, HIGH);
    digitalWrite(_dir1a, HIGH);
    digitalWrite(_dir1b, HIGH);
      
    digitalWrite(_e2, HIGH);
    digitalWrite(_dir2a, HIGH);
    digitalWrite(_dir2b, HIGH);
    
  }

}
