--Sccript de creación de funciones y procedimientos
/****** INSERT INTO   ******/
--Cliente "Registrar un nuevo cliente"

CREATE OR REPLACE PROCEDURE registrarCliente(
    
    Nombre IN Cliente.Nombre%TYPE,
    Dni IN Cliente.Dni%TYPE,
    Apellidos IN Cliente.Apellidos%TYPE,
    Direccion IN Cliente.Direccion%TYPE,
    Contra IN Cliente.Contra%TYPE,
    Telefono IN Cliente.Telefono%TYPE)
    IS
    BEGIN
    INSERT INTO Cliente
    VALUES (SEC_CLIENTE.NEXTVAL, Nombre, Dni, Apellidos, Direccion, Contra, Telefono);
    COMMIT WORK;
    END registrarCliente;
 /   
    
--TRABAJADOR "Insertar trabajador"

CREATE OR REPLACE PROCEDURE insertarTrabajador(

    Dni IN Trabajador.Dni%TYPE,
    Nombre IN Trabajador.Nombre%TYPE,
    Apellidos IN Trabajador.Apellidos%TYPE,
    Domicilio IN Trabajador.Domicilio%TYPE,
    Email IN Trabajador.Email%TYPE,
    Contra IN Trabajador.Contra%TYPE,
    Telefono IN Trabajador.Telefono%TYPE)
    IS
    BEGIN
    INSERT INTO Trabajador
    VALUES (SEC_TRABAJADOR.NEXTVAL, Dni, Nombre, Apellidos, Contra, Domicilio,
    Email,Telefono);
    COMMIT WORK;
    END insertarTrabajador;
 /   
--FACTURA "Insertar factura"

CREATE OR REPLACE PROCEDURE insertarFactura(

    Cantidad IN Factura.Cantidad%TYPE,
    FechaEmision IN Factura.FechaEmision%TYPE,
    Descripcion IN Factura.Descripcion%TYPE,
    FkIdMantenimiento IN Factura.FkIdMantenimiento%TYPE)
    IS 
    BEGIN
    INSERT INTO Factura
    VALUES(SEC_FACTURA.NEXTVAL, Cantidad, FechaEmision, Descripcion, FkIdMantenimiento);
    COMMIT WORK;
    END insertarFactura;
 /   
--mantenimiento "servir de un mantenimiento al cliente"

CREATE OR REPLACE PROCEDURE hacerMantenimiento(

  Descripcion IN Mantenimiento.Descripcion%TYPE,
  FechaProximaRevision IN Mantenimiento.FechaProximaRevision%TYPE,
  Fecha IN Mantenimiento.Fecha%TYPE,
  Tipo IN Mantenimiento.Tipo%TYPE,
  FkIdTrabajador IN Mantenimiento.FkIdTrabajador%TYPE,
  FkIdCliente IN Mantenimiento.FkIdCliente%TYPE
  )IS
BEGIN
  INSERT INTO Mantenimiento 
  VALUES(SEC_MANTENIMIENTO.NEXTVAL, Descripcion, FechaProximaRevision, Fecha, Tipo, FkIdTrabajador, FkIdCliente);
  COMMIT WORK;
END hacerMantenimiento;
/
--garantia "proporcionar una garantia al cliente"

CREATE OR REPLACE PROCEDURE crearGarantia(

  FechaInicio IN Garantia.FechaInicio%TYPE,
  FechaFin IN Garantia.FechaFin%TYPE,
  FkIdMantenimiento IN Garantia.FkIdMantenimiento%TYPE
  )IS
BEGIN
  INSERT INTO Garantia
  VALUES(SEC_GARANTIA.NEXTVAL, FechaInicio, FechaFin, FkIdMantenimiento);
  COMMIT WORK;
END crearGarantia;
/
--horario "horarios del trabajador"

CREATE OR REPLACE PROCEDURE implantarHorario(

  Dias IN Horario.Dias%TYPE, 
  HoraInicio IN Horario.HoraInicio%TYPE,
  HoraFin IN Horario.HoraFin%TYPE,
  FkIdTrabajador IN Horario.FkIdTrabajador%TYPE
  )IS
BEGIN
  INSERT INTO Horario
  VALUES(SEC_HORARIO.NEXTVAL,Dias, HoraInicio, HoraFin, FkIdTrabajador);
  COMMIT WORK;
END implantarHorario;
/

--guardia "guardia del trabajador"

CREATE OR REPLACE PROCEDURE implantarGuardia(
  Dias IN Guardia.Dias%TYPE, 
  FechaInicio IN Guardia.FechaInicio%TYPE,
  FechaFin IN Guardia.FechaFin%TYPE,
  FkIdTrabajador IN Guardia.FkIdTrabajador%TYPE
  )IS
BEGIN
  INSERT INTO Guardia
  VALUES(SEC_GUARDIA.NEXTVAL, Dias, FechaInicio, FechaFin, FkIdTrabajador);
  COMMIT WORK;
END implantarGuardia;
/
--SUGERENCIAS "dar la opinion del trabajador sobre el planing de la semana"

CREATE OR REPLACE PROCEDURE insertarSugerencias(
  Descripcion IN Sugerencias.Descripcion%TYPE ,
  FechaDescripcion IN Sugerencias.FechaDescripcion%TYPE,
  FkIdTrabajador IN Sugerencias.FkIdTrabajador%TYPE
  )IS
BEGIN
  INSERT INTO Sugerencias
  VALUES(SEC_SUGERENCIAS.NEXTVAL, Descripcion ,FechaDescripcion ,FkIdTrabajador);
  COMMIT WORK;
END insertarSugerencias;
/

--ValoracionCliente "valorar la atencion y el trabajo del trabajador"

CREATE OR REPLACE PROCEDURE insertarValoracionCliente(
  Nota IN ValoracionCliente.Nota%TYPE,
  Descripcion IN ValoracionCliente.Descripcion%TYPE,
  FkIdCliente IN ValoracionCliente.FkIdCliente%TYPE,
  FechaDescripcion IN ValoracionCliente.FechaDescripcion%TYPE
  )IS
BEGIN
  INSERT INTO ValoracionCliente
  VALUES(SEC_VALORACIONCLIENTE.NEXTVAL, Nota, Descripcion, FkIdCliente, FechaDescripcion);
  COMMIT WORK;
END insertarValoracionCliente;

/
