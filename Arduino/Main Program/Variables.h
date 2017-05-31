
#include <Arduino.h>

#define PIN_TENSION_BATTERIE A0
#define PIN_COURANT_BATTERIE A1
#define PIN_TENSION_PANNEAU A2
#define PIN_COURANT_PANNEAU A3

#define startFrame 0x02 
#define endFrame 0x03
#define startLine 0x0A 
#define endLine 0x0D 

char charIn; 
int nbCharLigne = 0;
char bufferLigne[21] = "";
int checkSum; 
unsigned long sleepTime = 30000; 
unsigned long previousMillis=0;

String SSID = "SSID";
String PASSWORD = "PASSWORD";
String REQUEST_KEY = "AUTHKEY";
String PANEL_IP = "IP";

StaticJsonBuffer<200> jsonBuffer;
JsonObject& root = jsonBuffer.createObject();
JsonObject& battery = root.createNestedObject("batterie");
JsonObject& panel = root.createNestedObject("panneau");
JsonObject& teleinfo = root.createNestedObject("teleInfo");
JsonObject& other = root.createNestedObject("autre");