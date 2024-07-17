package fp.partidas.test;

import fp.partidas.PartidaContenedor;
import fp.partidas.FactoriaPartida;

public class TestContenedor {
	private static PartidaContenedor partidas;
	public static void main(String[] args) {
		partidas = FactoriaPartida.leerPartidas("data/Counter Strike.csv");
		testCalculaPartidasPorMapa();
		testExistePartidaMapaAño();
		testSumarPuntosPartidaMapa();
		testKillsMediasMapa();
		testCalcularMapaMayorPuntuacionDeAño();
		testObtenerJugadoresMasKills();
		testCalculaRondasPorMapa();
		testCalculaPartidaMasKillsMapa();
		testCalculaMediaMuertesMapa();
		testCalculaListaNPartidasPorAnyo();
		testCalcularMapaMasRondasEquipoBMayores();
	}
	
	
	private static void testCalculaPartidasPorMapa() {
		System.out.println("\nTEST de calculaPartidasPorMapa");
		try {
			System.out.println("  MAPA: " + "Mirage");
			System.out.println("  PARTIDAS: " + partidas.calculaPartidasPorMapa("Mirage"));
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testExistePartidaMapaAño() {
		System.out.println("\nTEST de existePartidaMapaAño");
		try {
			System.out.println("  MAPA: " + "Mirage");
			System.out.println("  AÑO: " + "2018");
			System.out.println("  PARTIDAS EN MIRAGE EN 2018: " + partidas.existePartidaMapaAño("Mirage", 2018));
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	
	private static void testSumarPuntosPartidaMapa() {
		System.out.println("\nTEST de sumarPuntosPartidaMapa");
		try {
			System.out.println("  MAPA: " + "Mirage");
			System.out.println("  PUNTOS: " + partidas.sumarPuntosPartidaMapa("Mirage"));
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testKillsMediasMapa() {
		System.out.println("\nTEST de killsMediasMapa");
		try {
			System.out.println("  MAPA: " + "Mirage");
			System.out.println("  Kills medias en ese mapa: " + partidas.killsMediasMapa("Mirage"));
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testCalcularMapaMayorPuntuacionDeAño() {
		System.out.println("\nTEST de calcularMapaMayorPuntuacionDeAño");
		try {
			System.out.println("  AÑO: " + "2018");
			System.out.println("  Mapa con más puntos: " + partidas.calcularMapaMayorPuntuacionDeAño(2018));
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testObtenerJugadoresMasKills() {
		System.out.println("\nTEST de obtenerJugadoresMasKills");
		try {
			System.out.println("  5 jugadores con más kills: " + partidas.obtenerJugadoresMasKills(5));
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testCalculaRondasPorMapa() {
		System.out.println("\nTEST de calculaRondasPorMapa");
		try {
			System.out.println("  Lista de partidas por mapa: " + partidas.calculaRondasPorMapa());
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testCalculaPartidaMasKillsMapa() {
		System.out.println("\nTEST de calculaPartidaMasKillsMapa");
		try {
			System.out.println("  Partida con más kills por mapa: " + partidas.calculaPartidaMasKillsMapa());
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testCalculaMediaMuertesMapa() {
		System.out.println("\nTEST de calculaMediaMuertesMapa");
		try {
			System.out.println("  Media de muertes por mapa: " + partidas.calculaMediaMuertesMapa());
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testCalculaListaNPartidasPorAnyo() {
		System.out.println("\nTEST de calculaListaNPartidasPorAnyo");
		try {
			System.out.println("  MAPA: " + "Mirage");
			System.out.println("  Jugadores y años ordenados por puntos conseguidos: " + partidas.calculaListaNPartidasPorAnyo(5));
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	private static void testCalcularMapaMasRondasEquipoBMayores() {
		System.out.println("\nTEST de calcularMapaMasRondasEquipoBMayores");
		try {
			System.out.println("  Mapa con más rondas ganadas por equipo B: " + partidas.calcularMapaMasRondasEquipoBMayores(5));
		} catch(Exception e) {
			System.out.println("Excepción capturada:\n   " + e);	
		}
	}
	
	







}









