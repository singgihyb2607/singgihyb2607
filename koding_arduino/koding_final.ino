#include <NTPClient.h>
#include <WiFiUdp.h>
#include <ESP8266WiFi.h>
#include <SPI.h>
#include <RFID.h>
#include <LiquidCrystal_PCF8574.h> //library penampil LCD

LiquidCrystal_PCF8574 lcd(0x27); //0x3f dapat dicari dengan i2c scanner

#define SS_PIN D4
#define RST_PIN D3
#define ledbuzz2 16
#define ledbuzz1 15

RFID rfid(SS_PIN, RST_PIN); 

// Setup variables:
    int serNum0;
    int serNum1;
    int serNum2;
    int serNum3;
    int serNum4;


const char* ssid     = "buat_ta";
const char* password = "12345678";
const char* host = "192.168.43.51";

//const char* ssid     = "ionah";
//const char* password = "jackjack";
//const char* host = "192.168.1.17";

String line;
const long utcOffsetInSeconds = 25200;
 
// Setting tanggal menjadi nama hari
char daysOfTheWeek[7][12] = {"Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"};
 
// Define NTP Client to get time
WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP, "id.pool.ntp.org", utcOffsetInSeconds);

WiFiClient client;
const int httpPort = 80;
String url;

unsigned long timeout;

void setup() {
  Serial.begin(9600);
  delay(10);
  pinMode(ledbuzz1, OUTPUT);
  pinMode(ledbuzz2, OUTPUT);

  SPI.begin(); 
  rfid.init();
  lcd.begin(16,2); //ukuran LCD 16 x 2
  lcd.setBacklight(255); //menghidupkan lampu latar LCD
  
  // We start by connecting to a WiFi network
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
    lcd.clear();
    lcd.setCursor (0,0);
    lcd.print("Menghubungkan Ke");
    lcd.setCursor (0,1);
    lcd.print(ssid);
    
  }
  timeClient.begin(); 
  
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  
  lcd.setCursor (0,0);
  lcd.print("   PROGRAM TA   ");
  lcd.setCursor (0,1);
  lcd.print("   SINGGIH YB   ");
  delay (2000);
  lcd.clear();
}

void loop() {
  timeClient.update();
  String hari   = daysOfTheWeek[timeClient.getDay()];
  int jam1      = timeClient.getHours();
  int menit1    = timeClient.getMinutes();
  String jam2   = String (jam1);
  String menit2 = String (menit1);
  String jam;String menit;
    if (jam1 <= 9){jam = "0"+jam2; }else{jam = jam2;}
    if (menit1 <= 9){menit = "0"+menit2; }else{menit = menit2;}
  String waktu1 = jam+menit;
  int waktu = waktu1.toInt();
  int telat  = waktu+30;
  
  lcd.setCursor(0, 0);
  lcd.print(hari);
  lcd.print(", ");
  if (timeClient.getHours() <= 9) {lcd.print("0");}
  lcd.print(timeClient.getHours());
  lcd.print(":");
  if (timeClient.getMinutes() <= 9) {lcd.print("0");}
  lcd.print(timeClient.getMinutes());
  lcd.print(":");
  if (timeClient.getSeconds() <= 9) {lcd.print("0");}
  lcd.println(timeClient.getSeconds());
  
  lcd.setCursor(0, 1);
  lcd.print("   LAB JARKOM   ");

  
  if (rfid.isCard()) {
      if (rfid.readCardSerial()) {
            if (rfid.serNum[4] != serNum4) {

          Serial.println(" ");Serial.println("Card found");
          serNum0 = rfid.serNum[0];serNum1 = rfid.serNum[1];serNum2 = rfid.serNum[2];serNum3 = rfid.serNum[3];serNum4 = rfid.serNum[4];
         
          //Serial.println(" ");
          Serial.println("Cardnumber:");Serial.print("Dec: ");Serial.print(rfid.serNum[0],DEC);Serial.print(", ");Serial.print(rfid.serNum[1],DEC);Serial.print(", ");Serial.print(rfid.serNum[2],DEC);Serial.print(", ");Serial.print(rfid.serNum[3],DEC);Serial.print(", ");Serial.print(rfid.serNum[4],DEC);Serial.println(" ");        
          Serial.print("Hex: ");Serial.print(rfid.serNum[0],HEX);Serial.print(", ");Serial.print(rfid.serNum[1],HEX);Serial.print(", ");Serial.print(rfid.serNum[2],HEX);Serial.print(", ");Serial.print(rfid.serNum[3],HEX);Serial.print(", ");Serial.print(rfid.serNum[4],HEX);Serial.println(" ");
          String kode_mhs = String(rfid.serNum[0],HEX) +"-"+ String(rfid.serNum[1],HEX) +"-"+ String(rfid.serNum[2],HEX) +"-"+ String(rfid.serNum[3],HEX) +"-"+ String(rfid.serNum[4],HEX);
            
          digitalWrite(ledbuzz2,HIGH);delay(500);
          digitalWrite(ledbuzz2,LOW);delay(100);
          Serial.print("connecting to ");Serial.println(host);
          
          if (!client.connect(host, httpPort)) {
            Serial.println("connection failed");
              lcd.clear();
              lcd.setCursor (0,0);
              lcd.print("Koneksi Gagal>>>");
              lcd.setCursor (0,1);
              lcd.print("Koneksi Gagal>>>");
            //return;
          }
        
          // We now create a URI for the request
          url = "/absensiTA/admin/absen/tambah?kode_mhs=";
          url += kode_mhs;
          
          Serial.print("Requesting URL: ");
          Serial.println(url);
        
          // This will send the request to the server
          client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                       "Host: " + host + "\r\n" + 
                       "Connection: close\r\n\r\n");
          timeout = millis();
          while (client.available() == 0) {
            if (millis() - timeout > 5000) {
              Serial.println(">>> Cli1ent Timeout !");
              lcd.clear();
              lcd.setCursor (0,0);
              lcd.print("Server Time Out!");
              lcd.setCursor (0,1);
              lcd.print("Server Time Out!");
              client.stop();
              delay(2500);
              return;
            }
          }
        
          // Read all the lines of the reply from server and print them to Serial
          while(client.available()){
            line = client.readStringUntil('\r');
            Serial.print(line);
          }

          if(line.indexOf("BERHASIL") >= 0) {
              lcd.clear();
              digitalWrite(ledbuzz2,HIGH);delay(100);
              digitalWrite(ledbuzz2,LOW);delay(100);    
              digitalWrite(ledbuzz2,HIGH);delay(100);
              digitalWrite(ledbuzz2,LOW);delay(100); 
              lcd.setCursor(0,0);lcd.print(" ABSEN BERHASIL ");
              lcd.setCursor(0,1);lcd.print(" SELAMAT DATANG ");
              delay(3000);
              lcd.clear();
           }

           else if(line.indexOf("TELAT") >= 0) {
               lcd.clear();
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);    
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);  
               lcd.setCursor(0, 0);lcd.print(" GAGAL!!! TELAT ");  
               lcd.setCursor(0, 1);lcd.print("Anda Telat Absen");
               delay(3000);
               lcd.clear();
            }

           else if(line.indexOf("RUANG") >= 0) {
               lcd.clear();
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);    
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);  
               lcd.setCursor(0, 0);lcd.print("Kesalahan,Jadwal");  
               lcd.setCursor(0, 1);lcd.print("Mu Bukan Disini!");
               delay(3000);
               lcd.clear();
            }

           else if(line.indexOf("JAM") >= 0) {
               lcd.clear();
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);    
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);  
               lcd.setCursor(0, 0);lcd.print("Kesalahan, BUKAN ");  
               lcd.setCursor(0, 1);lcd.print("Jam Kuliah Anda!");
               delay(3000);
               lcd.clear();
            }

           else if(line.indexOf("gagal") >= 0) {
               lcd.clear();
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);    
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);  
               lcd.setCursor(0, 0);lcd.print("Kesalahan, Anda");  
               lcd.setCursor(0, 1);lcd.print("Bukan Mahasiswa!");
               delay(3000);
               lcd.clear();
            }

           else if(line.indexOf("HARI") >= 0) {
               lcd.clear();
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);    
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);  
               lcd.setCursor(0, 0);lcd.print("GAGAL!, Hari Ini");  
               lcd.setCursor(0, 1);lcd.print("Tidak Ada Jadwal");
               delay(3000);
               lcd.clear();
            }

           else if(line.indexOf("kosong") >= 0) {
               lcd.clear();
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);    
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);
               digitalWrite(ledbuzz1,HIGH);delay(100);
               digitalWrite(ledbuzz1,LOW);delay(100);  
               lcd.setCursor(0, 0);lcd.print(" Kesalahan, Anda ");  
               lcd.setCursor(0, 1);lcd.print("Belum Ada Jadwal");
               delay(3000);
               lcd.clear();
            }

         } else {
               /* If we have the same ID, just write a dot. */
                lcd.clear(); 
                Serial.print(".");
                digitalWrite(ledbuzz1,HIGH);delay(100);
                digitalWrite(ledbuzz1,LOW);delay(100);    
                digitalWrite(ledbuzz1,HIGH);delay(100);
                digitalWrite(ledbuzz1,LOW);delay(100);
                digitalWrite(ledbuzz1,HIGH);delay(100);
                digitalWrite(ledbuzz1,LOW);delay(100);  
                lcd.setCursor(0, 0);lcd.print("Gagal,Anda Sudah");  
                lcd.setCursor(0, 1);lcd.print("Melakukan Absen!");
                delay(2000);
                Serial.print(".");
             }
        
      }
  }
}
