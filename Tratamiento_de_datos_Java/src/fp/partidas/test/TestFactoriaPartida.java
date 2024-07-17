package fp.partidas.test;

import fp.partidas.FactoriaPartida;
import fp.partidas.Partida;
import fp.partidas.PartidaContenedor;

public class TestFactoriaPartida {
	
	public static void main (String[] args) {
		testCreacionPartidas();
		
	}
	
	private static void testCreacionPartidas() {
		System.out.println("\nTest de la creación de partidas");
		try {
			PartidaContenedor partidas = FactoriaPartida.leerPartidas("data/Counter Strike.csv");
			System.out.println("\tNúmero de Partidas: "+ partidas);
			
			//Mostrar numero de partidas y las 5 primeras
			System.out.println("Leídas " + partidas.obtenerNumeroPartidas() + " Partidas");
			System.out.println("Mostrando los primeros 5 elementos");
			Integer cont = 0;
			for (Partida p: partidas.getPartidaContenedor()) {
				System.out.println(p);
				cont++;
				if (cont.equals(5)) {
					break;
				}
			}
			
		} catch(Exception e) {
			System.out.println("Excepcion capturada:\n    " + e);
		}
	}

}
