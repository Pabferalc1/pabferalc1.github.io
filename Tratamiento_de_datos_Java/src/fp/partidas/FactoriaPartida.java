package fp.partidas;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.stream.Stream;

import fp.utiles.Checkers;

public class FactoriaPartida {
	
	public static Partida parsearPartida(String lineaCSV) {
		String[] campos = lineaCSV.split(";");
		String msg = String.format("Formato no válido. Se esperan 19 campos", campos.length, lineaCSV);
		Checkers.check(msg, campos.length == 19);
		String mapa = campos[0].trim();
		Integer year = Integer.valueOf(campos[3].trim());
		LocalDate date = LocalDate.parse(campos[4].trim(),
			DateTimeFormatter.ofPattern("d/M/yyyy"));
		Double matchTime = Double.valueOf(campos[6].trim());
		Integer teamARounds = Integer.valueOf(campos[7].trim());
		Integer teamBRounds = Integer.valueOf(campos[8].trim());
		Integer kills = Integer.valueOf(campos[10].trim());
		Integer deaths = Integer.valueOf(campos[12].trim());
		Integer mvp = Integer.valueOf(campos[13].trim());
		Integer points = Integer.valueOf(campos[15].trim());
		Resultado resultadoPartida = Resultado.valueOf(campos[16].trim().toUpperCase());
		Boolean kdRatio = false;
		if (campos[17].equals("True")) {
			kdRatio = true;
		}
		String id = campos[18].trim();
		
		return new Partida(mapa, year, date, matchTime, teamARounds, teamBRounds, kills, deaths, mvp, points,
				resultadoPartida, kdRatio, id);

	}
	public static PartidaContenedor leerPartidas(String ruta) {
		PartidaContenedor res = null;
		try {
			Stream<Partida> sp = Files.lines(Paths.get(ruta)).skip(1).map(FactoriaPartida::parsearPartida);
			res = new PartidaContenedor(sp);
		}catch (IOException e) {
			System.out.println("No se ha encontrado el fichero" + ruta);
			e.printStackTrace();
		}
		return res;
					
	}

}
