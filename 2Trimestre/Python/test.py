import flask_sqlalchemy
from sqlalchemy import *
from sqlalchemy.sql import *

#crear la base de datos 
engine = create_engine('sqlite:///college2.db', echo=True)

meta = MetaData()


#Crear tabla estudiantes 
students = Table(
    'students',meta,
    Column('id',Integer,primary_key=True),
    Column('name',String),
    Column('lastname',String)
)

meta.create_all(engine)

#Insertar valores
conn = engine.connect()
ins = students.insert().values(name='Pablo',lastname='Molina Conde')
res = conn.execute(ins)

#Insertar un array en la bd
conn.execute(students.insert(),[
    {'name' : 'Paco', 'lastname' : 'Lozano'},
    {'name' : 'Jose', 'lastname' : 'Conde'},
    {'name' : 'Jaime', 'lastname' : 'Terron'},
    {'name' : 'Edu', 'lastname' : 'Povea'}
])