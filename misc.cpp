// [Yiu] [Jonathan] [9582764254]
#include <fstream>
#include <string>
#include <iostream>
#include <algorithm>
#include <cstdlib>
// put other includes here
using namespace std;

int main() {
    srand(0);

    string json, city, country;

    cout << "Name of json file: ";
    cin >> json;

    ofstream out(json);

    cout << "City: ";
    cin >> city;
    cout << "Country: ";
    cin >> country;

    out << '{' << endl;
    out << "\t\"farm\" : {" << endl;
    out << "\t\t\"city\" : \"" << city << "\"," << endl;
    out << "\t\t\"country\" : \"" << country << "\"" << endl;
    out << "\t}," << endl;

    out << "\t\"weeks\" : [" << endl;
    for(int i=0; i<51; i++) {
        out << "\t\t{" << endl;
        out << "\t\t\t\"dissolved_salts\" : " << (double)rand()/RAND_MAX + rand()%13 << "," << endl;
        out << "\t\t\t\"electrical_energy\" : " << (double)rand()/RAND_MAX + rand()%13 << "," << endl;
        out << "\t\t\t\"volume_of_irrigation_water\" : " << (double)rand()/RAND_MAX + rand()%13 << "," << endl;
        out << "\t\t\t\"soil_reaction_ph\" : " << (double)rand()/RAND_MAX + rand()%13 << "," << endl;
        out << "\t\t\t\"week_number\" : " << i+1 << endl;
        out << "\t\t}," << endl;
    }
        out << "\t\t{" << endl;
        out << "\t\t\t\"dissolved_salts\" : " << (double)rand()/RAND_MAX + rand()%13 << "," << endl;
        out << "\t\t\t\"electrical_energy\" : " << (double)rand()/RAND_MAX + rand()%13 << "," << endl;
        out << "\t\t\t\"volume_of_irrigation_water\" : " << (double)rand()/RAND_MAX + rand()%13 << "," << endl;
        out << "\t\t\t\"soil_reaction_ph\" : " << (double)rand()/RAND_MAX + rand()%13 << "," << endl;
        out << "\t\t\t\"week_number\" : " << 52 << endl;
        out << "\t\t}" << endl;
    out << "\t]" << endl;

    out << '}' << endl;
    return 0;
}