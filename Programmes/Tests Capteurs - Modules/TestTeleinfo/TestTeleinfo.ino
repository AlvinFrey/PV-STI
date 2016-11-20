
#define startFrame 0x02 
#define endFrame 0x03
#define startLine 0x0A 
#define endLine 0x0D 

char charIn; 
int nbCharLigne = 0;
char bufferLigne[21] = "";
int checkSum; 
unsigned long previousMillis=0;

void setup(){

  Serial.begin(9600);
  Serial2.begin(1200,SERIAL_7E1);

}
 
void loop(){

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

              Serial.println("BASE : " + atoi(&bufferLigne[5]));  
         
            }

            in =  String(bufferLigne).indexOf("PAPP");
            if (in==1) {

              Serial.println("PAPP : " + atoi(&bufferLigne[5]));  

            }

            in =  String(bufferLigne).indexOf("IINST");
            if (in==1) {

              Serial.println("IINST : " + atoi(&bufferLigne[6]));  

            }

          } else {
            nbCharLigne++;
          }
        }
      }
 }
