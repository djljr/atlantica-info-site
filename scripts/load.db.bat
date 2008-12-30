del tmp.db
sqlite3 tmp.db < schema.sql
sqlite3 tmp.db < data.sql
copy tmp.db ..\data\db\atlantica.db
del tmp.db