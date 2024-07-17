--Paquete Cliente 

CREATE OR REPLACE PACKAGE PRUEBA_CLIENTE AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Nom Cliente.Nombre%TYPE,
xDni Cliente.Dni%TYPE, Apell Cliente.Apellidos%TYPE, Direc Cliente.Direccion%TYPE, Cont Cliente.Contra%TYPE,
Tele Cliente.Telefono%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ACTUALIZARDireccion(NombrePrueba VARCHAR2, IdClt Cliente.IdCliente%TYPE,
Direc Cliente.Direccion%TYPE, SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARContra(NombrePrueba VARCHAR2, IdClt Cliente.IdCliente%TYPE,
Cont Cliente.Contra%TYPE, SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARTelefono(NombrePrueba VARCHAR2, IdClt Cliente.IdCliente%TYPE,
Tele Cliente.Telefono%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdClt Cliente.IdCliente%TYPE, SalidaEsperada BOOLEAN);
END PRUEBA_CLIENTE;
/


--Paquete Trabajador

CREATE OR REPLACE PACKAGE PRUEBA_TRABAJADOR AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, xDni Trabajador.Dni%TYPE, Nom Trabajador.Nombre%TYPE,
Apell Trabajador.Apellidos%TYPE, Domi Trabajador.Domicilio%TYPE, Ema Trabajador.Email%TYPE, Cont Cliente.Contra%TYPE, Tele Trabajador.Telefono%TYPE,
SalidaEsperada BOOLEAN);

PROCEDURE ACTUALIZARDomicilio(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, Domi Trabajador.Domicilio%TYPE,
SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZAREmail(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, Ema Trabajador.Email%TYPE,
SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARContra(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, Cont Trabajador.Contra%TYPE,
SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARTelefono(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, Tele Trabajador.Telefono%TYPE,
SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdTra Trabajador.IdTrabajador%TYPE, SalidaEsperada BOOLEAN);
END PRUEBA_TRABAJADOR;
/

--Paquete Horario

CREATE OR REPLACE PACKAGE PRUEBA_HORARIO AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Dia Horario.Dias%TYPE, HoraInic Horario.HoraInicio%TYPE,
HoraFi Horario.HoraFin%TYPE,Id_Traba Horario.FkIdTrabajador%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ACTUALIZARInicio(NombrePrueba VARCHAR2, IdHora Horario.IdHorario%TYPE, HoraInic Horario.HoraInicio%TYPE,
SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARFin(NombrePrueba VARCHAR2, IdHora Horario.IdHorario%TYPE, HoraFi Horario.HoraFin%TYPE,
SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdHora Horario.IdHorario%TYPE, SalidaEsperada BOOLEAN);
END PRUEBA_HORARIO;
/

--PAQUETE GUARDIA

CREATE OR REPLACE PACKAGE PRUEBA_GUARDIA AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Dia Guardia.Dias%TYPE, FechaInic Guardia.FechaInicio%TYPE,
FechaFi Guardia.FechaFin%TYPE, Id_Traba Guardia.FkIdTrabajador%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ACTUALIZARFechaInicio(NombrePrueba VARCHAR2, IdGuard Guardia.IdGuardia%TYPE, FechaInic Guardia.FechaInicio%TYPE,
SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARFechaFin(NombrePrueba VARCHAR2, IdGuard Guardia.IdGuardia%TYPE, FechaFi Guardia.FechaFin%TYPE,
SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdGuard Guardia.IdGuardia%TYPE, SalidaEsperada BOOLEAN);
END PRUEBA_GUARDIA;
/

--PAQUETE SUGERENCIAS

CREATE OR REPLACE PACKAGE PRUEBA_SUGERENCIAS AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Descrip Sugerencias.Descripcion%TYPE, FechaDescrip Sugerencias.FechaDescripcion%TYPE,
Id_Traba Sugerencias.FkIdTrabajador%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdSuge Sugerencias.IdSugerencias%TYPE, SalidaEsperada BOOLEAN);

END PRUEBA_SUGERENCIAS;
/

--PAQUETE VALORACION CLIENTE

CREATE OR REPLACE PACKAGE PRUEBA_VALORACIONCLIENTE AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Descrip ValoracionCliente.Descripcion%TYPE, Cali ValoracionCliente.Nota%TYPE,
Id_Clien ValoracionCliente.FkIdCliente%TYPE, FechaDescrip ValoracionCliente.FechaDescripcion%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdVal ValoracionCLiente.IdValoracionCliente%TYPE, SalidaEsperada BOOLEAN);

END PRUEBA_VALORACIONCLIENTE;
/

--PAQUETE MANTENIMIENTO

CREATE OR REPLACE PACKAGE PRUEBA_MANTENIMIENTO AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Descrip Mantenimiento.Descripcion%TYPE, 
FechaNext Mantenimiento.FechaProximaRevision%TYPE, Fech Mantenimiento.Fecha%TYPE, Tip Mantenimiento.Tipo%TYPE,
Id_Clien Mantenimiento.FkIdCliente%TYPE, Id_Traba Mantenimiento.FkIdTrabajador%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ACTUALIZARFecha(NombrePrueba VARCHAR2, IdMant Mantenimiento.IdMantenimiento%TYPE,
Fech Mantenimiento.Fecha%TYPE, SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARRevision(NombrePrueba VARCHAR2, IdMant Mantenimiento.IdMantenimiento%TYPE,
FechaNext Mantenimiento.FechaProximaRevision%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdMant Mantenimiento.IdMantenimiento%TYPE, SalidaEsperada BOOLEAN);

END PRUEBA_MANTENIMIENTO;
/

--PAQUETE FACTURA

CREATE OR REPLACE PACKAGE PRUEBA_FACTURA AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, Cant Factura.Cantidad%TYPE, FechaEmi Factura.FechaEmision%TYPE,
Descrip Factura.Descripcion%TYPE, Id_Mante Factura.FkIdMantenimiento%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ACTUALIZAR(NombrePrueba VARCHAR2, IdFact Factura.IdFactura%TYPE, Cant Factura.Cantidad%TYPE,
SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARFecha(NombrePrueba VARCHAR2, IdFact Factura.IdFactura%TYPE, FechaEmi Factura.FechaEmision%TYPE,
SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2, IdFact Factura.IdFactura%TYPE, SalidaEsperada BOOLEAN);

END PRUEBA_FACTURA;
/

--PAQUETE GARANTIA

CREATE OR REPLACE PACKAGE PRUEBA_GARANTIA AS PROCEDURE INICIALIZAR;

PROCEDURE INSERTAR(NombrePrueba VARCHAR2, FechaIn Garantia.FechaInicio%TYPE, FechaF Garantia.FechaFin%TYPE,
Id_Mante Garantia.FkIdMantenimiento%TYPE, SalidaEsperada BOOLEAN);

PROCEDURE ACTUALIZARFechaInicial(NombrePrueba VARCHAR2, IdGara Garantia.IdGarantia%TYPE, FechaIn Garantia.FechaInicio%TYPE,
SalidaEsperada BOOLEAN);
PROCEDURE ACTUALIZARFechaFinal(NombrePrueba VARCHAR2, IdGara Garantia.IdGarantia%TYPE, FechaF Garantia.FechaFin%TYPE,
SalidaEsperada BOOLEAN);

PROCEDURE ELIMINAR(NombrePrueba VARCHAR2,  IdGara Garantia.IdGarantia%TYPE, SalidaEsperada BOOLEAN);

END PRUEBA_GARANTIA;
/














