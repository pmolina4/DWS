import flask_sqlalchemy
from sqlalchemy import *
from sqlalchemy.sql import *

#crear la base de datos 
engine = create_engine('sqlite:///coches.db', echo=True)

meta = MetaData()


#Crear tabla estudiantes 
coches = Table(
    'coches',meta,
    Column('id',Integer,primary_key=True),
    Column('brand',String),
    Column('model',String),
    Column('price',Integer),
    Column('engine',String),
    Column('year',Integer),
    Column('mileage',Integer),
    Column('fuel',String),
    Column('gearbox',String),
    Column('location',String)
)

meta.create_all(engine)

#Conexion
conn = engine.connect()

#Insertar un array en la bd
conn.execute(coches.insert(),[
    {'brand' : 'SEAT', 
    'model' : 'Ibiza',
    'price' : 8990,
    'engine' : 'SC 1.2 TSI 90cv Style',
    'year' : 2016,
    'mileage' : 67000,
    'fuel' : 'Gasolina',
    'gearbox' : 'Manual',
    'location' : 'Granollers',
    },
    {'brand' : 'Audi', 
    'model' : 'Q5',
    'price' : 30490,
    'engine' : '2.0 TDI clean diesel 140kW quattro S tro',
    'year' : 2017,
    'mileage' : 122593,
    'fuel' : 'Diesel',
    'gearbox' : 'Automatica',
    'location' : 'Sabadell 2',
    },
    {'brand' : 'Volkswagen', 
    'model' : 'Polo',
    'price' : 9990,
    'engine' : 'Advance 1.0 75CV BMT',
    'year' : 2015,
    'mileage' : 46347,
    'fuel' : 'Gasolina',
    'gearbox' : 'Manual',
    'location' : 'Viladecans',
    },
    {'brand' : 'Hyundai', 
    'model' : 'Tucson',
    'price' : 16990,
    'engine' : '1.6 GDi Tecno 4x2',
    'year' : 2018,
    'mileage' : 43390,
    'fuel' : 'Gasolina',
    'gearbox' : 'Manual',
    'location' : 'Gava',
    },
    {'brand' : 'Kia', 
    'model' : 'Sorento',
    'price' : 22490,
    'engine' : '2.2 CRDi 147kW (200CV) Drive Auto 4x2',
    'year' : 2017,
    'mileage' : 115601,
    'fuel' : 'Diesel',
    'gearbox' : 'Automatica',
    'location' : 'Esplugas',
    }
])