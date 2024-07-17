/**** ACTUALIZAR ***/

--Cliente 

--"Actualizar la direccion de un cliente"

CREATE OR REPLACE PROCEDURE actualizarDireccionCliente(

    P_IdCliente  IN Cliente.IdCliente%TYPE,
    P_Direccion  IN Cliente.Direccion%TYPE)
    
    IS
    BEGIN
    UPDATE Cliente
    SET Direccion = P_Direccion
    WHERE IdCliente = P_IdCLiente;
    COMMIT WORK;
    END actualizarDireccionCliente;
 /  
 
 CREATE OR REPLACE PROCEDURE actualizarContraCliente(

    P_IdCliente  IN Cliente.IdCliente%TYPE,
    P_Contra  IN Cliente.Contra%TYPE)
    
    IS
    BEGIN
    UPDATE Cliente
    SET Contra = P_Contra
    WHERE IdCliente = P_IdCLiente;
    COMMIT WORK;
    END actualizarContraCliente;

/
--"Actualizar telefono de un cliente"    
    
CREATE OR REPLACE PROCEDURE actualizarTelefonoCliente(

    P_IdCliente  IN Cliente.IdCliente%TYPE,
    P_Telefono  IN Cliente.Telefono%TYPE)
    
    IS
    BEGIN
    UPDATE Cliente
    SET Telefono= P_Telefono
    WHERE IdCliente = P_IdCLiente;
    COMMIT WORK;
    END actualizarTelefonoCliente;
 /   
--Mantenimiento

--"Actualizar la fecha en la que se realiza un mantenimiento"

CREATE OR REPLACE PROCEDURE actualizarFechaMantenimiento(

    P_IdMantenimiento IN Mantenimiento.IdMantenimiento%TYPE,
    P_Fecha IN Mantenimiento.Fecha%TYPE)
    IS
    BEGIN
    UPDATE Mantenimiento
    SET Fecha = P_Fecha
    WHERE IdMantenimiento = P_IdMantenimiento;
    COMMIT WORK;
    END actualizarFechaMantenimiento;
/  
--"Actualizar fecha de revision del mantenimiento"

CREATE OR REPLACE PROCEDURE actualizarFechaRevision(

    P_IdMantenimiento IN Mantenimiento.IdMantenimiento%TYPE,
    P_FechaProximaRevision IN Mantenimiento.FechaProximaRevision%TYPE)
    IS
    BEGIN
    UPDATE Mantenimiento
    SET FechaProximaRevision = P_FechaProximaRevision
    WHERE IdMantenimiento = P_IdMantenimiento;
    COMMIT WORK;
    END actualizarFechaRevision;
 /   
 
 
 --Guardia
 
 --"Actualizar fecha de inicio de una guardia"
 
 CREATE OR REPLACE PROCEDURE actualizarFechaInicioGuardia(
 
    P_IdGuardia IN Guardia.IdGuardia%TYPE,
    P_FechaInicio IN Guardia.FechaInicio%TYPE)
    IS
    BEGIN 
    UPDATE Guardia
    SET FechaInicio = P_FechaInicio
    WHERE IdGuardia = P_IdGuardia;
    COMMIT WORK;
    END actualizarFechaInicioGuardia;
/    
--"Actualizar fecha de fin de una guardia"

CREATE OR REPLACE PROCEDURE actualizarFechaFinGuardia(

    P_IdGuardia IN Guardia.IdGuardia%TYPE,
    P_FechaFin IN Guardia.FechaFin%TYPE)
    IS
    BEGIN 
    UPDATE Guardia
    SET FechaFin = P_FechaFin
    WHERE IdGuardia = P_IdGuardia;
    COMMIT WORK;
    END actualizarFechaFinGuardia;
/  

--trabajador 

-- "Actualizar Telefono" 

CREATE OR REPLACE PROCEDURE actualizarTrabajadorTelefono(     
  P_IdTrabajador IN Trabajador.IdTrabajador%TYPE,     
  P_Telefono IN Trabajador.Telefono%TYPE     
)IS 
BEGIN     
  UPDATE Trabajador     
  SET Telefono = P_Telefono    
  WHERE IdTrabajador = P_IdTrabajador;     
  COMMIT WORK;
END actualizarTrabajadorTelefono; 
/

CREATE OR REPLACE PROCEDURE actualizarTrabajadorContra(     
  P_IdTrabajador IN Trabajador.IdTrabajador%TYPE,     
  P_Contra IN Trabajador.Contra%TYPE     
)IS 
BEGIN     
  UPDATE Trabajador     
  SET Contra = P_Contra    
  WHERE IdTrabajador = P_IdTrabajador;     
  COMMIT WORK;
END actualizarTrabajadorContra; 
/

-- "Actualizar Domicilio" 

CREATE OR REPLACE PROCEDURE actualizarTrabajadorDomicilio(     
  P_IdTrabajador IN Trabajador.IdTrabajador%TYPE,     
  P_Domicilio IN Trabajador.Domicilio%TYPE     
)IS 
BEGIN     
  UPDATE Trabajador     
  SET Domicilio = P_Domicilio     
  WHERE IdTrabajador = P_IdTrabajador;          
  COMMIT WORK; 
END actualizarTrabajadorDomicilio;
/ 

-- "Actualizar Email" 

CREATE OR REPLACE PROCEDURE actualizarTrabajadorEmail(     
  P_IdTrabajador IN Trabajador.IdTrabajador%TYPE,     
  P_Email IN Trabajador.Email%TYPE     
)IS 
BEGIN     
  UPDATE Trabajador     
  SET Email = P_Email 
  WHERE IdTrabajador = P_IdTrabajador;          
  COMMIT WORK; 
END actualizarTrabajadorEmail; 
/ 

--horario



--"HoraInicio"

CREATE OR REPLACE PROCEDURE actualizarHoraInicio(     
  P_IdHorario IN Horario.IdHorario%TYPE,     
  P_HoraInicio IN Horario.HoraInicio%TYPE 
)IS
BEGIN
  UPDATE Horario
  SET HoraInicio = P_HoraInicio 
  WHERE IdHorario = P_IdHorario;
  COMMIT WORK;
END actualizarHoraInicio;
/

--"HoraInicioFin"

CREATE OR REPLACE PROCEDURE actualizarHoraFin(     
  P_IdHorario IN Horario.IdHorario%TYPE,     
  P_HoraFin IN Horario.HoraFin%TYPE 
)IS
BEGIN
  UPDATE Horario
  SET HoraFin = P_HoraFin 
  WHERE IdHorario = P_IdHorario;
  COMMIT WORK;
END actualizarHoraFin;
/

--ACTUALIZAR CANTIDAD FACTURA

CREATE OR REPLACE PROCEDURE actualizarCantidadFactura(

    P_IdFactura  IN Factura.IdFactura%TYPE,
    P_Cantidad IN Factura.Cantidad%TYPE)
    
    IS
    BEGIN
    UPDATE Factura
    SET Cantidad = P_Cantidad
    WHERE IdFactura = P_IdFactura;
    COMMIT WORK;
    END actualizarCantidadFactura;
 /  
 
 --ACTUALIZAR FECHAFIN GARANTIA
 
 CREATE OR REPLACE PROCEDURE actualizarFechaFinGarantia(

    P_IdGarantia  IN Garantia.IdGarantia%TYPE,
    P_FechaFin  IN Garantia.FechaFin%TYPE)
    
    IS
    BEGIN
    UPDATE Garantia
    SET FechaFin = P_FechaFin
    WHERE IdGarantia = P_IdGarantia;
    COMMIT WORK;
    END actualizarFechaFinGarantia;
/    

--ACTUALIZAR FECHA EMISION FACTURA
CREATE OR REPLACE PROCEDURE actualizarFechaFactura(

    P_IdFactura IN Factura.IdFactura%TYPE,
    P_FechaEmision IN Factura.FechaEmision%TYPE)
    
    IS 
    BEGIN
    UPDATE Factura
    SET FechaEmision= P_FechaEmision
    WHERE IdFactura= P_IdFactura;
    COMMIT WORK;
    END actualizarFechaFactura;
    
    
/
--ACTUALIZAR FECHA INICIO GARANTIA

CREATE OR REPLACE PROCEDURE actualizarFechaInicioGarantia(

    P_IdGarantia  IN Garantia.IdGarantia%TYPE,
    P_FechaInicio IN Garantia.FechaInicio%TYPE)
    
    IS
    BEGIN
    UPDATE Garantia
    SET FechaInicio = P_FechaInicio
    WHERE IdGarantia = P_IdGarantia;
    COMMIT WORK;
    END actualizarFechaInicioGarantia;
    
/

