import serial, time, keyboard, mysql.connector
from datetime import datetime

puerto = serial.Serial('COM3', 9600)
conect = mysql.connector.connect(host="localhost",
                                 user="root",
                                 passwd="",
                                 database="arduino")
saver = conect.cursor()
sql = "insert into sensor(humedad, temperatura, gas, tiempo) values (%s, %s,%s,%s)"
time.sleep(2)
while True:
    texto = puerto.readline().decode("utf-8").split()
    now = datetime.now()
    print(texto[0], texto[1], texto[2], now)
    datos = (texto[0], texto[1], texto[2], now)
    saver.execute(sql, datos)
    conect.commit()
    print(saver.rowcount, "registro insertado")

puerto.close()
