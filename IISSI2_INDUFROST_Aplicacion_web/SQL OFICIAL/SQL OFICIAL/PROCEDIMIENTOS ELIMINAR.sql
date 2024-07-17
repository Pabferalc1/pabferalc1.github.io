/****** DELETE *****/

--Cliente 

CREATE OR REPLACE PROCEDURE eliminarCliente(

    IdCliente IN Cliente.IdCliente%TYPE)
    IS
    BEGIN
    DELETE FROM Cliente
    WHERE IdCliente = IdCliente;
    COMMIT WORK;
    END eliminarCliente;
/

--Trabajador

CREATE OR REPLACE PROCEDURE eliminarTrabajador(

    IdTrabajador IN Trabajador.IdTrabajador%TYPE)
    IS
    BEGIN
    DELETE FROM Trabajador
    WHERE IdTrabajador= IdTrabajador;
    COMMIT WORK;
    END eliminarTrabajador;
/

--HORARIO

CREATE OR REPLACE PROCEDURE eliminarHorario(

    IdHorario IN Horario.IdHorario%TYPE)
    IS
    BEGIN
    DELETE FROM Horario
    WHERE IdHorario = IdHorario;
    COMMIT WORK;
    END eliminarHorario;
/

--GUARDIA

CREATE OR REPLACE PROCEDURE eliminarGuardia(

    IdGuardia IN Guardia.IdGuardia%TYPE)
    IS 
    BEGIN
    DELETE FROM Guardia
    WHERE IdGuardia = IdGuardia;
    COMMIT WORK;
    END eliminarGuardia;
/

--SUGERENCIAS

CREATE OR REPLACE PROCEDURE eliminarSugerencias(

    IdSugerencias IN Sugerencias.IdSugerencias%TYPE)
    IS 
    BEGIN
    DELETE FROM Sugerencias
    WHERE IdSugerencias = IdSugerencias;
    COMMIT WORK;
    END eliminarSugerencias;
/    

--VALORACIONCLIENTE

CREATE OR REPLACE PROCEDURE eliminarValoracionCliente(

    IdValoracionCliente IN ValoracionCliente.IdValoracionCliente%TYPE)
    IS
    BEGIN
    DELETE FROM ValoracionCliente
    WHERE IdValoracionCliente = IdValoracionCliente;
    COMMIT WORK;
    END eliminarValoracionCliente;
/

--MANTENIMIENTO

CREATE OR REPLACE PROCEDURE eliminarMantenimiento(

    IdMantenimiento IN Mantenimiento.IdMantenimiento%TYPE)
    IS
    BEGIN 
    DELETE FROM Mantenimiento
    WHERE IdMantenimiento=IdMantenimiento;
    COMMIT WORK;
    END eliminarMantenimiento;
/

--FACTURA

CREATE OR REPLACE PROCEDURE eliminarFactura(

    IdFactura IN Factura.IdFactura%TYPE)
    IS
    BEGIN
    DELETE FROM Factura
    WHERE IdFactura=IdFactura;
    COMMIT WORK;
    END eliminarFactura;
/

--GARANTIA

CREATE OR REPLACE PROCEDURE eliminarGarantia(

    IdGarantia IN Garantia.IdGarantia%TYPE)
    IS
    BEGIN
    DELETE FROM Garantia
    WHERE IdGarantia=IdGarantia;
    COMMIT WORK;
    END eliminarGarantia;
/


