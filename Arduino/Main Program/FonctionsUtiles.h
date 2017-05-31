
#include <Arduino.h>

/**
 * Cette fonction sert à calculer la puissance instantannée des capteurs du panneau.
 * @param voltage : valeur du capteur de tension / current : valeur du capteur de courant
 * @returns la puissance instantannée du panneau.
 */

float computePower(float voltage, float current){

	return voltage * current;

}