-- PARA LISTAR CLIENTES QUE ALCANZARON LAS RECOMPENSAS

SELECT p.nombres, p.apellidos, p.correo, lp.totpuntos, p.celular, lp.local_id
FROM localpersonas AS lp
INNER JOIN personas as p ON lp.persona_id = p.id
WHERE lp.local_id = 14 AND lp.totpuntos >= 400
ORDER BY lp.totpuntos DESC

-- DDAVID
SELECT p.nombres, p.apellidos, p.correo, lp.totpuntos, p.celular, lp.local_id
FROM localpersonas AS lp
INNER JOIN personas as p ON lp.persona_id = p.id
WHERE lp.local_id = 21 AND lp.totpuntos >= 110
ORDER BY lp.totpuntos DESC