--TRIGGERS NO ASOCIADOS

create or replace trigger DosAnyosGarantia
before insert or update on Garantia
FOR EACH ROW
begin
   :NEW.FECHAFIN:=:NEW.FECHAINICIO+730;
end;
/

create or replace trigger FechProxRevAlAnyo
before insert or update on Mantenimiento
FOR EACH ROW 
begin
    IF(:NEW.FechaProximaRevision < :New.Fecha +365)
    THEN raise_application_error
    (-20100,'Tiene que haber como minimo un año entre fechas de revision');
    end if;
end;
/

create or replace trigger IgualFechasFactYMant
before insert or update on Factura
FOR EACH ROW 
DECLARE
FH DATE; 
begin
    Select fecha INTO FH from Mantenimiento where idMantenimiento= :NEW.FKIDMANTENIMIENTO; 
    IF(:NEW.fechaemision != FH) 
    THEN raise_application_error
    (-20200,'La fecha de emision de la factura no coincide con la fecha en que se realiza el mantenimiento');
    end if;
end;
/
create or replace trigger IgualFechasGarYMant
before insert or update on Garantia
FOR EACH ROW 
DECLARE
FH DATE; 
begin
    Select fecha INTO FH from Mantenimiento where idMantenimiento= :NEW.FKIDMANTENIMIENTO; 
    IF(:NEW.fechainicio != FH) 
    THEN raise_application_error
    (-20300,'La fecha de emision de garantia no coincide con la fecha en que se realiza el mantenimiento');
    end if;
end;
/

create or replace TRIGGER noDosClientesIguales
BEFORE INSERT ON CLIENTE  
FOR EACH ROW 
DECLARE 
CLI NUMBER; 
BEGIN
SELECT COUNT(*) INTO CLI FROM CLIENTE
WHERE 
 DNI=:NEW.DNI;
IF CLI>0
THEN  raise_application_error 
(-20400,:NEW.DNI||'EL CLIENTE YA EXISTE');
END IF; 
END;
/ 

