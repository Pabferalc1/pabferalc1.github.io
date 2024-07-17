/****** BODY PACKAGE ****************/

--CLIENTE

CREATE OR REPLACE PACKAGE BODY PRUEBA_CLIENTE AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM Cliente;
END INICIALIZAR;



PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Nom Cliente.Nombre%TYPE,
xDni Cliente.Dni%TYPE, Apell Cliente.Apellidos%TYPE, Direc Cliente.Direccion%TYPE,
Cont Cliente.Contra%TYPE, Tele Cliente.Telefono%TYPE,  SalidaEsperada BOOLEAN) AS

Salida BOOLEAN := TRUE;
Clt Cliente%ROWTYPE;
wIdCliente INTEGER;

BEGIN

INSERT INTO Cliente VALUES(SEC_CLIENTE.NEXTVAL, Nom, xDni, Apell, Direc, Cont, Tele);

wIdCliente:=SEC_CLIENTE.CURRVAL;
SELECT * INTO Clt FROM Cliente WHERE IdCliente = wIdCliente;
IF(Clt.Nombre<>Nom OR Clt.Dni<>xDni OR Clt.Apellidos<>Apell
OR Clt.Direccion<>Direc OR Clt.Contra<>Cont OR Clt.Telefono<>Tele)THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;


PROCEDURE ACTUALIZARDireccion(NombrePrueba VARCHAR2, IdClt Cliente.IdCliente%TYPE,
Direc Cliente.Direccion%TYPE, SalidaEsperada BOOLEAN)AS
Salida BOOLEAN :=TRUE;
Clt Cliente%ROWTYPE;


BEGIN

UPDATE Cliente SET Direccion = Direc WHERE IdCliente=IdClt;

SELECT *  INTO Clt FROM Cliente WHERE IdCliente=IdClt;
IF (Clt.Direccion<>Direc) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARDireccion;

PROCEDURE ACTUALIZARContra(NombrePrueba VARCHAR2, IdClt Cliente.IdCliente%TYPE,
Cont Cliente.Contra%TYPE, SalidaEsperada BOOLEAN)AS
Salida BOOLEAN :=TRUE;
Clt Cliente%ROWTYPE;


BEGIN

UPDATE Cliente SET Contra = Cont WHERE IdCliente=IdClt;

SELECT *  INTO Clt FROM Cliente WHERE IdCliente=IdClt;
IF (Clt.Contra<>Cont) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARContra;



PROCEDURE ACTUALIZARTelefono(NombrePrueba VARCHAR2, IdClt Cliente.IdCliente%TYPE,
Tele Cliente.Telefono%TYPE, SalidaEsperada BOOLEAN)AS

Salida BOOLEAN :=TRUE;
Clt Cliente%ROWTYPE;


BEGIN

UPDATE Cliente SET Telefono = Tele WHERE IdCliente=IdClt;

SELECT *  INTO Clt FROM Cliente WHERE IdCliente=IdClt;
IF (Clt.Telefono<>Tele) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARTelefono;

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdClt Cliente.IdCliente%TYPE,
SalidaEsperada BOOLEAN)AS
Salida Boolean := TRUE;
NClt INTEGER;
BEGIN
DELETE FROM Cliente WHERE IdCliente = IdClt;
SELECT COUNT(*) INTO NClt FROM Cliente WHERE
IdCliente = IdClt;
IF(NClt<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;

END;
/

--TRABAJADOR

CREATE OR REPLACE PACKAGE BODY PRUEBA_TRABAJADOR AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM Trabajador;
END INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, xDni Trabajador.Dni%TYPE, Nom Trabajador.Nombre%TYPE,
Apell Trabajador.Apellidos%TYPE, Domi Trabajador.Domicilio%TYPE, Ema Trabajador.Email%TYPE, Cont Cliente.Contra%TYPE, Tele Trabajador.Telefono%TYPE,
SalidaEsperada BOOLEAN) AS

Salida BOOLEAN := TRUE;
Tra Trabajador%ROWTYPE;
wIdTrabajador INTEGER;

BEGIN

INSERT INTO Trabajador VALUES(SEC_TRABAJADOR.NEXTVAL,  xDni, Nom, Apell, Domi, Ema, Cont, Tele);

wIdTrabajador:=SEC_TRABAJADOR.CURRVAL;
SELECT * INTO Tra FROM Trabajador WHERE IdTrabajador = wIdTrabajador;
IF(Tra.Dni<>xDni OR Tra.Nombre<>Nom OR Tra.Apellidos<>Apell OR Tra.Domicilio<>Domi
OR Tra.Email<>Ema OR Tra.Contra<>Cont OR Tra.Telefono<>Tele)THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE ACTUALIZARDomicilio(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, Domi Trabajador.Domicilio%TYPE,
SalidaEsperada BOOLEAN)AS
Salida BOOLEAN :=TRUE;
Tra Trabajador%ROWTYPE;

BEGIN

UPDATE Trabajador SET Domicilio = Domi WHERE IdTrabajador=IdTra;

SELECT *  INTO Tra FROM Trabajador WHERE IdTrabajador=IdTra;
IF (Tra.Domicilio<>Domi) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARDomicilio;

PROCEDURE ACTUALIZAREmail(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, Ema Trabajador.Email%TYPE,
SalidaEsperada BOOLEAN) AS

Salida BOOLEAN :=TRUE;
Tra Trabajador%ROWTYPE;

BEGIN

UPDATE Trabajador SET Email = Ema WHERE IdTrabajador=IdTra;

SELECT *  INTO Tra FROM Trabajador WHERE IdTrabajador=IdTra;
IF (Tra.Email<>Ema) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZAREmail;

PROCEDURE ACTUALIZARContra(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, Cont Trabajador.Contra%TYPE,
SalidaEsperada BOOLEAN)AS
Salida BOOLEAN :=TRUE;
Tra Trabajador%ROWTYPE;

BEGIN

UPDATE Trabajador SET Contra = Cont WHERE IdTrabajador=IdTra;

SELECT *  INTO Tra FROM Trabajador WHERE IdTrabajador=IdTra;
IF (Tra.Contra<>Cont) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARContra;

PROCEDURE ACTUALIZARTelefono(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, Tele Trabajador.Telefono%TYPE,
SalidaEsperada BOOLEAN)AS

Salida BOOLEAN :=TRUE;
Tra Trabajador%ROWTYPE;

BEGIN

UPDATE Trabajador SET Telefono = Tele WHERE IdTrabajador=IdTra;

SELECT *  INTO Tra FROM Trabajador WHERE IdTrabajador=IdTra;
IF (Tra.Telefono<>Tele) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARTelefono;

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, SalidaEsperada BOOLEAN)AS

Salida Boolean := TRUE;
NTra INTEGER;
BEGIN
DELETE FROM Trabajador WHERE IdTrabajador = IdTra;
SELECT COUNT(*) INTO NTra FROM Trabajador WHERE
IdTrabajador = IdTra;
IF(NTra<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;

END;
/

--HORARIO

CREATE OR REPLACE PACKAGE BODY PRUEBA_HORARIO AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM Horario;
END INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Dia Horario.Dias%TYPE, HoraInic Horario.HoraInicio%TYPE,
HoraFi Horario.HoraFin%TYPE, Id_Traba Horario.FkIdTrabajador%TYPE, SalidaEsperada BOOLEAN)AS

Salida BOOLEAN := TRUE;
Hor Horario%ROWTYPE;
wIdHorario INTEGER;

BEGIN

INSERT INTO Horario VALUES(SEC_HORARIO.NEXTVAL, Dia, HoraInic, HoraFi, Id_Traba);

wIdHorario:=SEC_HORARIO.CURRVAL;
SELECT * INTO Hor FROM Horario WHERE IdHorario = wIdHorario;
IF(Hor.Dias<>Dia OR Hor.HoraInicio<>HoraInic OR Hor.HoraFin<>HoraFi OR Hor.FkIdTrabajador<>Id_Traba)
THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE ACTUALIZARInicio(NombrePrueba VARCHAR2, IdHora Horario.IdHorario%TYPE, HoraInic Horario.HoraInicio%TYPE,
SalidaEsperada BOOLEAN)AS

Salida BOOLEAN :=TRUE;
Hor Horario%ROWTYPE;


BEGIN

UPDATE Horario SET HoraInicio = HoraInic WHERE IdHorario=IdHora;

SELECT *  INTO Hor FROM Horario WHERE IdHorario=IdHora;
IF (Hor.HoraInicio<>HoraInic) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARInicio;

PROCEDURE ACTUALIZARFin(NombrePrueba VARCHAR2, IdHora Horario.IdHorario%TYPE, HoraFi Horario.HoraFin%TYPE,
SalidaEsperada BOOLEAN)AS

Salida BOOLEAN :=TRUE;
Hor Horario%ROWTYPE;


BEGIN

UPDATE Horario SET HoraFin = HoraFi WHERE IdHorario=IdHora;

SELECT *  INTO Hor FROM Horario WHERE IdHorario=IdHora;
IF (Hor.HoraFin<>HoraFi) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARFin;

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdHora Horario.IdHorario%TYPE, SalidaEsperada BOOLEAN)AS

Salida Boolean := TRUE;
NHor INTEGER;
BEGIN
DELETE FROM Horario WHERE IdHorario=IdHora;
SELECT COUNT(*) INTO NHor FROM Horario WHERE
IdHorario=IdHora;
IF(NHor<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;
END;
/

--GUARDIA

CREATE OR REPLACE PACKAGE BODY PRUEBA_GUARDIA AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM Guardia;
END INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Dia Guardia.Dias%TYPE, FechaInic Guardia.FechaInicio%TYPE,
FechaFi Guardia.FechaFin%TYPE, Id_Traba Guardia.FkIdTrabajador%TYPE, SalidaEsperada BOOLEAN)AS

Salida BOOLEAN := TRUE;
Gua Guardia%ROWTYPE;
wIdGuardia INTEGER;

BEGIN

INSERT INTO Guardia VALUES(SEC_GUARDIA.NEXTVAL, Dia, FechaInic, FechaFi, Id_Traba);

wIdGuardia:=SEC_GUARDIA.CURRVAL;
SELECT * INTO Gua FROM Guardia WHERE IdGuardia = wIdGuardia;
IF(Gua.Dias<>Dia OR Gua.FechaInicio<>FechaInic OR Gua.FechaFin<>FechaFi OR Gua.FkIdTrabajador<>Id_Traba)
THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE ACTUALIZARFechaInicio(NombrePrueba VARCHAR2, IdGuard Guardia.IdGuardia%TYPE, FechaInic Guardia.FechaInicio%TYPE,
SalidaEsperada BOOLEAN)AS

Salida BOOLEAN :=TRUE;
Gua Guardia%ROWTYPE;


BEGIN

UPDATE Guardia SET FechaInicio = FechaInic WHERE IdGuardia=IdGuard;

SELECT *  INTO Gua FROM Guardia WHERE IdGuardia=IdGuard;
IF (Gua.FechaInicio<>FechaInic) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARFechaInicio;

PROCEDURE ACTUALIZARFechaFin(NombrePrueba VARCHAR2, IdGuard Guardia.IdGuardia%TYPE, FechaFi Guardia.FechaFin%TYPE,
SalidaEsperada BOOLEAN)AS

Salida BOOLEAN :=TRUE;
Gua Guardia%ROWTYPE;


BEGIN

UPDATE Guardia SET FechaFin = FechaFi WHERE IdGuardia=IdGuard;

SELECT *  INTO Gua FROM Guardia WHERE IdGuardia=IdGuard;
IF (Gua.FechaFin<>FechaFi) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARFechaFin;

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdGuard Guardia.IdGuardia%TYPE, SalidaEsperada BOOLEAN)AS

Salida Boolean := TRUE;
NGua INTEGER;
BEGIN
DELETE FROM Guardia WHERE IdGuardia=IdGuard;
SELECT COUNT(*) INTO NGua FROM Guardia WHERE
IdGuardia=IdGuard;
IF(NGua<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;
END;
/
--Mantenimiento

CREATE OR REPLACE PACKAGE BODY PRUEBA_MANTENIMIENTO AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM Mantenimiento;
END INICIALIZAR;



PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Descrip Mantenimiento.Descripcion%TYPE, 
FechaNext Mantenimiento.FechaProximaRevision%TYPE, Fech Mantenimiento.Fecha%TYPE, Tip Mantenimiento.Tipo%TYPE,
Id_Clien Mantenimiento.FkIdCliente%TYPE, Id_Traba Mantenimiento.FkIdTrabajador%TYPE, SalidaEsperada BOOLEAN) AS

Salida BOOLEAN := TRUE;
Mnt Mantenimiento%ROWTYPE;
wIdMantenimiento INTEGER;

BEGIN

INSERT INTO Mantenimiento VALUES(SEC_MANTENIMIENTO.NEXTVAL, Descrip, FechaNext, Fech, Tip, Id_Traba, Id_Clien);

wIdMantenimiento:=SEC_MANTENIMIENTO.CURRVAL;
SELECT * INTO Mnt FROM Mantenimiento WHERE IdMantenimiento = wIdMantenimiento;
IF(Mnt.Descripcion<>Descrip OR Mnt.FechaProximaRevision<>FechaNext OR Mnt.Fecha<>Fech 
OR Mnt.Tipo<>Tip OR Mnt.FkIdTrabajador<>Id_Traba OR Mnt.FkIdCliente<>Id_Clien)THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;


PROCEDURE ACTUALIZARFecha(NombrePrueba VARCHAR2, IdMant Mantenimiento.IdMantenimiento%TYPE,
Fech Mantenimiento.Fecha%TYPE, SalidaEsperada BOOLEAN)AS
Salida BOOLEAN :=TRUE;
Mnt Mantenimiento%ROWTYPE;
BEGIN
UPDATE Mantenimiento SET fecha = Fech WHERE IdMantenimiento=IdMant;

SELECT *  INTO Mnt FROM Mantenimiento WHERE IdMantenimiento=IdMant;
IF (Mnt.Fecha<>Fech) THEN
Salida := FALSE;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARFecha;


PROCEDURE ACTUALIZARRevision(NombrePrueba VARCHAR2, IdMant Mantenimiento.IdMantenimiento%TYPE,
FechaNext Mantenimiento.FechaProximaRevision%TYPE, SalidaEsperada BOOLEAN)AS
Salida BOOLEAN :=TRUE;
Mnt Mantenimiento%ROWTYPE;
BEGIN
UPDATE Mantenimiento SET FechaProximaRevision = FechaNext WHERE IdMantenimiento=IdMant;
SELECT *  INTO Mnt FROM Mantenimiento WHERE IdMantenimiento=IdMant;
IF (Mnt.FechaProximaRevision<>FechaNext) THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARRevision;


PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdMant Mantenimiento.IdMantenimiento%TYPE, SalidaEsperada BOOLEAN)AS
Salida Boolean := TRUE;
NMant INTEGER;
BEGIN
DELETE FROM Mantenimiento WHERE IdMantenimiento = IdMant;
SELECT COUNT(*) INTO NMant FROM Mantenimiento WHERE
IdMantenimiento = IdMant;
IF(NMant<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;

END;
/

--VALORACION CLIENTE

CREATE OR REPLACE PACKAGE BODY PRUEBA_VALORACIONCLIENTE AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM ValoracionCliente;
END INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Descrip ValoracionCliente.Descripcion%TYPE, Cali ValoracionCliente.Nota%TYPE,
Id_Clien ValoracionCliente.FkIdCliente%TYPE, FechaDescrip ValoracionCliente.FechaDescripcion%TYPE, SalidaEsperada BOOLEAN)AS

Salida BOOLEAN := TRUE;
Val ValoracionCliente%ROWTYPE;
wIdValoracionCliente INTEGER;

BEGIN

INSERT INTO ValoracionCliente VALUES(SEC_VALORACIONCLIENTE.NEXTVAL, Descrip, Cali, Id_Clien, FechaDescrip);

wIdValoracionCliente:=SEC_VALORACIONCLIENTE.CURRVAL;
SELECT * INTO Val FROM ValoracionCliente WHERE IdValoracionCliente = wIdValoracionCliente;
IF(Val.Descripcion<>Descrip OR Val.Nota<>Cali OR Val.FkIdCliente<>Id_Clien OR Val.FechaDescripcion<>FechaDescrip)THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdVal ValoracionCLiente.IdValoracionCliente%TYPE, SalidaEsperada BOOLEAN)AS
Salida Boolean := TRUE;
NVal INTEGER;
BEGIN
DELETE FROM ValoracionCliente WHERE IdValoracionCliente = IdVal;
SELECT COUNT(*) INTO NVal FROM ValoracionCliente WHERE
IdValoracionCliente = IdVal;
IF(NVal<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;

END;
/

CREATE OR REPLACE PACKAGE BODY PRUEBA_SUGERENCIAS AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM Sugerencias;
END INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Descrip Sugerencias.Descripcion%TYPE, FechaDescrip Sugerencias.FechaDescripcion%TYPE,
Id_Traba Sugerencias.FkIdTrabajador%TYPE, SalidaEsperada BOOLEAN)AS

Salida BOOLEAN := TRUE;
Sug Sugerencias%ROWTYPE;
wIdSugerencias INTEGER;

BEGIN

INSERT INTO Sugerencias VALUES(SEC_SUGERENCIAS.NEXTVAL, Descrip, FechaDescrip, Id_Traba);

wIdSugerencias:=SEC_SUGERENCIAS.CURRVAL;
SELECT * INTO Sug FROM Sugerencias WHERE IdSugerencias = wIdSugerencias;
IF(Sug.Descripcion<>Descrip OR Sug.FechaDescripcion<>FechaDescrip OR Sug.FkIdTrabajador<>Id_Traba)THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdSuge Sugerencias.IdSugerencias%TYPE, SalidaEsperada BOOLEAN)AS

Salida Boolean := TRUE;
NSug INTEGER;
BEGIN
DELETE FROM Sugerencias WHERE IdSugerencias = IdSuge;
SELECT COUNT(*) INTO NSug FROM Sugerencias WHERE
IdSugerencias = IdSuge;
IF(NSug<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;

END;
/

--FACTURA


CREATE OR REPLACE PACKAGE BODY PRUEBA_FACTURA AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM Factura;
END INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Cant Factura.Cantidad%TYPE, FechaEmi Factura.FechaEmision%TYPE,
Descrip Factura.Descripcion%TYPE, Id_Mante Factura.FkIdMantenimiento%TYPE, SalidaEsperada BOOLEAN)AS

Salida BOOLEAN := TRUE;
Fac Factura%ROWTYPE;
wIdFactura INTEGER;

BEGIN

INSERT INTO Factura VALUES(SEC_FACTURA.NEXTVAL, Cant, FechaEmi, Descrip, Id_Mante);

wIdFactura:=SEC_FACTURA.CURRVAL;
SELECT * INTO Fac FROM Factura WHERE IdFactura = wIdFactura;
IF(Fac.Cantidad<>Cant OR Fac.FechaEmision<>FechaEmi OR Fac.Descripcion<>Descrip OR Fac.FkIdMantenimiento<>Id_Mante)THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE ACTUALIZAR(NombrePrueba VARCHAR2, IdFact Factura.IdFactura%TYPE, Cant Factura.Cantidad%TYPE,
SalidaEsperada BOOLEAN)AS

Salida BOOLEAN :=TRUE;
Fac Factura%ROWTYPE;
BEGIN
UPDATE Factura SET Cantidad = Cant WHERE IdFactura=IdFact;
SELECT *  INTO Fac FROM Factura WHERE IdFactura=IdFact;
IF (Fac.Cantidad<>Cant) THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZAR;

PROCEDURE ACTUALIZARFecha(NombrePrueba VARCHAR2, IdFact Factura.IdFactura%TYPE, FechaEmi Factura.FechaEmision%TYPE,
SalidaEsperada BOOLEAN)AS
Salida BOOLEAN :=TRUE;
Fac Factura%ROWTYPE;
BEGIN
UPDATE Factura SET FechaEmision = FechaEmi WHERE IdFactura=IdFact;
SELECT *  INTO Fac FROM Factura WHERE IdFactura=IdFact;
IF (Fac.FechaEmision<>FechaEmi) THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARFecha;


PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdFact Factura.IdFactura%TYPE, SalidaEsperada BOOLEAN)AS

Salida Boolean := TRUE;
NFac INTEGER;
BEGIN
DELETE FROM Factura WHERE IdFactura = IdFact;
SELECT COUNT(*) INTO NFac FROM Factura WHERE
IdFactura = IdFact;
IF(NFac<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;

END;
/

--GARANTIA

CREATE OR REPLACE PACKAGE BODY PRUEBA_GARANTIA AS
PROCEDURE INICIALIZAR AS
BEGIN
DELETE FROM Garantia;
END INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, FechaIn Garantia.FechaInicio%TYPE, FechaF Garantia.FechaFin%TYPE,
Id_Mante Garantia.FkIdMantenimiento%TYPE, SalidaEsperada BOOLEAN)AS

Salida BOOLEAN := TRUE;
Gar Garantia%ROWTYPE;
wIdGarantia INTEGER;

BEGIN

INSERT INTO Garantia VALUES(SEC_GARANTIA.NEXTVAL, FechaIn, FechaF,  Id_Mante);
 
wIdGarantia:=SEC_GARANTIA.CURRVAL;
SELECT * INTO Gar FROM Garantia WHERE IdGarantia = wIdGarantia;
IF(Gar.FechaInicio<>FechaIn OR Gar.FechaFin<>FechaF OR Gar.FkIdMantenimiento<>Id_Mante)THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE ACTUALIZARFechaInicial(NombrePrueba VARCHAR2, IdGara Garantia.IdGarantia%TYPE, FechaIn Garantia.FechaInicio%TYPE,
SalidaEsperada BOOLEAN)AS

Salida BOOLEAN :=TRUE;
Gar Garantia%ROWTYPE;
BEGIN
UPDATE Garantia SET FechaInicio = FechaIn WHERE IdGarantia=IdGara;
SELECT *  INTO Gar FROM Garantia WHERE IdGarantia=IdGara;
IF (Gar.FechaInicio<>FechaIn) THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARFechaInicial;

PROCEDURE ACTUALIZARFechaFinal(NombrePrueba VARCHAR2, IdGara Garantia.IdGarantia%TYPE, FechaF Garantia.FechaFin%TYPE,
SalidaEsperada BOOLEAN)AS


Salida BOOLEAN :=TRUE;
Gar Garantia%ROWTYPE;
BEGIN
UPDATE Garantia SET FechaFin = FechaF WHERE IdGarantia=IdGara;
SELECT *  INTO Gar FROM Garantia WHERE IdGarantia=IdGara;
IF (Gar.FechaFin<>FechaF) THEN
Salida := FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':'|| ASSERT_EQUALS(FALSE,SalidaEsperada));
ROLLBACK;
END ACTUALIZARFechaFinal;

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2,  IdGara Garantia.IdGarantia%TYPE, SalidaEsperada BOOLEAN)AS

Salida Boolean := TRUE;
NGar INTEGER;
BEGIN
DELETE FROM Garantia WHERE IdGarantia = IdGara;
SELECT COUNT(*) INTO NGar FROM Garantia WHERE
IdGarantia = IdGara;
IF(NGar<>0)THEN
Salida:=FALSE;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(Salida, SalidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(NombrePrueba || ':' || ASSERT_EQUALS(FALSE, SalidaEsperada));
ROLLBACK;
END ELIMINAR;

END;


