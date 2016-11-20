
#ifndef Moteur_H
#define Moteur_H

#if ARDUINO >= 100
 #include "Arduino.h"
#else
 #include "WProgram.h"
#endif

class Moteur {
    
  public:
   initialisation(int DIR1A, int DIR1B, int ENABLE1, int DIR2A, int DIR2B, int ENABLE2);
   gauche(int MOTOR_NUM, int MOTOR_SPEED);
   droite(int MOTOR_NUM, int MOTOR_SPEED);
   stop(int MOTOR_NUM);
};

#endif