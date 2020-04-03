@echo off
set /p dump_path=Escribe la direccion de la ubicacion de pg_dump (ejemplo: C:\Program Files\PostgreSQL\9.6\bin):
set /p db=Escribe el nombre de la base de datos:
set /p backup_path=Escribe la ubicacion de donde quieres guardar el respaldo (deja en blanco para generarla en el directorio actual):
set /p backup_name=Escribe el nombre del archivo del respaldo:
set /p usuario=Escribe el nombre de usuario de la base de datos:

cd .

%dump_path%\pg_dump.exe -U %usuario% -d %db% > %backup_path%%backup_name%

ECHO Respaldo generado en: %backup_path%%backup_name%

PAUSE