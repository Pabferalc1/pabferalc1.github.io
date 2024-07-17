package fp.partidas.test;

import java.time.LocalDate;

import fp.partidas.Partida;
import fp.partidas.Resultado;

public class Test {
	
	public static void main(String[] args) {
		
		Partida p = new Partida("Mirage", 2018, LocalDate.of(2018,3,8), 2906.0, 16, 13, 17, 21, 2, 45, Resultado.WIN, true, "pablo11");
		System.out.println(p);
		System.out.println("El mapa en el que se jugó la partida es: " + p.getMapa());
		
		p.setMapa("Cache");
		System.out.println("Nuevo mapa: " + p.getMapa());
		
		
		//Prueba de propiedad derivada
		System.out.println("El jugador tuvo " + p.getKillsPorSegundo() + "Kills por segundo en la partida p");
		
		
		//Probar equals (Tener en cuenta que el nombre del mapa ha sido cambiado en la linea 16)
		Partida p1 = new Partida("Mirage", 2018, LocalDate.of(2018,3,8), 2906.0, 16, 13, 17, 21, 2, 45, Resultado.WIN, true, "pablo11");
		
		if (p.equals(p1)) {
			System.out.println("Las partidas p y p1 son iguales");
		} else {
			System.out.println("Las partidas p y p1 no son iguales");
		}
		
		
		//Prueba de orden natural
		if(p.compareTo(p1) > 0) {
			System.out.println("p es posterior a p1");			
		}else if(p.compareTo(p1)<0) {
			System.out.println("p es anterior a p1");
		}else {
			System.out.println("p y p1 están en el mismo orden");
		}
		
		
		//Prueba de errores
		//Año anterior a 2015
		try {
			Partida pe = new Partida("Mirage", 2014, LocalDate.of(2018,3,8), 2906.0, 16, 13, 17, 21, 2, 45, Resultado.WIN, true, "pablo11");
			
		} catch (IllegalArgumentException e) {
			System.out.println(e.getMessage());
			
		}
		//Numero negativo de puntos
		try {
			Partida pe = new Partida("Mirage", 2016, LocalDate.of(2018,3,8), 2906.0, 16, 13, 17, 21, 2, -45, Resultado.WIN, true, "pablo11");

		} catch (IllegalArgumentException e2) {
			System.out.println(e2);

		}
		//Duración de la partida debe ser mayor que 0
		try {
			Partida pe = new Partida("Mirage", 2016, LocalDate.of(2018,3,8), 0.0, 16, 13, 17, 21, 2, 45, Resultado.WIN, true, "pablo11");
			
		} catch (IllegalArgumentException e3) {
			System.out.println(e3);
		}
		//La id del usuario debe tener más de 5 caracteres
		try {
			Partida pe = new Partida("Mirage", 2016, LocalDate.of(2018,3,8), 34.0, 16, 13, 17, 21, 2, 45, Resultado.WIN, true, "pablo");
		} catch (IllegalArgumentException e4) {
			System.out.println(e4);
		}
		
		//Segundo constructor
		Partida p2 = new Partida(2018, LocalDate.of(2018,3,8), 2906.0, 16, 13, 17, 21, 45, true);
		System.out.println("Partida 2: " + p2);
		
	}
}
