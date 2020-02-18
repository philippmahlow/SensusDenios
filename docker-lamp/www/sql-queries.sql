# select all cars of Audi

SELECT *
FROM car AS c
INNER JOIN model AS mo
ON c.model_id = mo.id
INNER JOIN manufacturer AS ma
ON ma.id = mo.manufacturer_id
WHERE ma.name LIKE "AUDI"

# select all cars which were not driven by driver 1
SELECT c.*
FROM car AS c
LEFT JOIN drivelog AS dl
ON dl.car_id = c.id AND dl.driver_id = 1
WHERE dl.id IS NULL


