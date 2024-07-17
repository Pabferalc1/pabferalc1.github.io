package fp.partidas;

import java.util.Comparator;
import java.util.HashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;
import java.util.Set;
import java.util.function.Predicate;
import java.util.stream.Collectors;
import java.util.stream.Stream;


public class PartidaContenedor {
	
	private List<Partida> partidas;
	
	public PartidaContenedor() {
		partidas = new LinkedList<>();
	}
	
	public PartidaContenedor(Stream<Partida> partidas) {
		this.partidas = partidas.collect(Collectors.toList());
	}
	//Método get
	public List<Partida> getPartidaContenedor(){
		return new LinkedList<>(this.partidas);
	}
	
	//Añadir partida
	public void añadirPartida(Partida p) {
		partidas.add(p);
	}
	
	//Eliminar partida. Si no existe, lanzar excepción
	public void eliminarPartida(Partida p) {
		if (!partidas.contains(p)) {
			throw new IllegalArgumentException("La partida no existe");
		}
		partidas.remove(p);
	}
	
	//Obtener numero partidas
	public int obtenerNumeroPartidas() {
		return partidas.size();
	}

	//Ver si contiene una partida
	public boolean contienePartida(Partida p) {
		return partidas.contains(p);
	}
	
	//Añadir conjunto de partidas
	public void añadirPartidas(Set<Partida> masPartidas) {
		partidas.addAll(masPartidas);
	}
	
	//Ver si contiene todas las partidas de un conjunto
	
	public boolean contienePartida(Set<Partida> otraPartida) {
		return partidas.containsAll(otraPartida);
	}

	@Override
	public String toString() {
		return "PartidaContenedor [partidas=" + partidas + "]";
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((partidas == null) ? 0 : partidas.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		PartidaContenedor other = (PartidaContenedor) obj;
		if (partidas == null) {
			if (other.partidas != null)
				return false;
		} else if (!partidas.equals(other.partidas))
			return false;
		return true;
	}
	//Bloque 1
	//1. Calcular partidas por mapa
	public Integer calculaPartidasPorMapa(String mapa) {
		return (int) partidas.stream()
				.filter(p->p.getMapa().equals(mapa))
				.count();

	}	
	
	//2. Existe partida por mapa y año
	public Boolean existePartidaMapaAño (String mapa, Integer year) {
		Predicate<Partida> p1 = p -> p.getMapa().equals(mapa);
		Predicate<Partida> p2 = p -> p.getYear().equals(year);
		return partidas.stream()
				.distinct()
				.anyMatch(p1.and(p2));
	}
	
	
	//Bloque 2
	
	//3. Sumar puntos en partida por mapa
	public Integer sumarPuntosPartidaMapa (String mapa) {
		return partidas.stream()
				.filter(p->p.getMapa().equals(mapa))
				.mapToInt(Partida::getPoints)
				.limit(5)
				.sum();
	}
	
	
	//4. Calcular media de kills en un mapa dado
	
	public Double killsMediasMapa(String mapa){
		return partidas.stream()
				.filter(p->p.getMapa().equals(mapa))
				.mapToInt(Partida::getKills)
				.average()
				.getAsDouble();
		

	}
	//Bloque 3
	
	//5. Calcular mapa con mayor cantidad de puntos por año
	public String calcularMapaMayorPuntuacionDeAño(Integer anyo) {
		return partidas.stream()
				.filter(r-> r.getYear().equals(anyo))
				.max(Comparator.comparing(Partida::getPoints))
				.get()
				.getMapa();
	}
	
				
	
	
	//6. Calcular numero de jugadores con más kills
	public List<String> obtenerJugadoresMasKills(Integer n) {
		return partidas.stream()
				.sorted(Comparator.comparing(Partida::getKills).reversed())
				.map(Partida::getId)
				.limit(n)
				.collect(Collectors.toList());
	}
	
	
	
	
	//Bloque 4
	//7. Calcular rondas del equipo A ganadas por mapa sin repetirse
	public Map<String, Set<Integer>> calculaRondasPorMapa(){
		return partidas.stream()
				.collect(Collectors.groupingBy(
						Partida::getMapa, 
						Collectors.mapping(Partida::getTeamARounds, Collectors.toSet())));
	}
	
	
	//8. Map de partida con mas kills por mapa
	public Map<String, Partida> calculaPartidaMasKillsMapa(){
		return partidas.stream()
				.collect(Collectors.groupingBy(
						Partida::getMapa,
						Collectors.collectingAndThen(
							Collectors.maxBy(
								Comparator.comparing(Partida::getKills)),
							o -> o.get())
							));
	
	}
	
	//9. Calcular media de muertes por mapa
	public Map<String, Double> calculaMediaMuertesMapa(){
		return partidas.stream()
				.collect(Collectors.groupingBy(
						Partida::getMapa,
						Collectors.averagingInt(Partida::getDeaths)));
	}
	
	//10. Calcula la lista de n jugadores por año y puntos
	public Map<Integer, List<String>> calculaListaNPartidasPorAnyo(Integer n) {
		Map<Integer, List<Partida>> partidasPorAnyo= calculaPartidasPorAnyo();
		
		Map<Integer, List<String>> res= new HashMap<>();
		for(Integer a: partidasPorAnyo.keySet()) {
			List<String> partidasOrdenadas= calculaNPartidasOrdenados(partidasPorAnyo.get(a), n);
			res.put(a, partidasOrdenadas);
			}
		return res;}
	

	private Map<Integer, List<Partida>> calculaPartidasPorAnyo() {
		return partidas.stream()
				.collect(Collectors.groupingBy(Partida::getYear));}
	
	
	
	private List<String> calculaNPartidasOrdenados(List<Partida> l, Integer n) {
		return l.stream()
				.sorted(Comparator.comparing(Partida::getPoints).reversed())
				.limit(n)
				.map(Partida::getId)
				.collect(Collectors.toList());
	}
	
	
	
	//11. Calcular el mapa con más rondas ganadas por equipo b
	public String calcularMapaMasRondasEquipoBMayores(Integer n) {
		Map<String, Long> mp = calcularNumRondasEquipoBPorMapaMayores(n);
		
		return mp.entrySet().stream()
				.max(Comparator.comparing(x -> x.getValue()))
				.get()
				.getKey();
		
	}
	
	private Map<String, Long> calcularNumRondasEquipoBPorMapaMayores(Integer n){
		return partidas.stream()
				.sorted(Comparator.comparing(Partida::getTeamBRounds).reversed())
				.limit(n)
				.collect(Collectors.groupingBy(Partida::getMapa,
						Collectors.counting()));
	}

	
	
	
}
