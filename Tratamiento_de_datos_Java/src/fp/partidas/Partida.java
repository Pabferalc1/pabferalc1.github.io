package fp.partidas;

import java.time.LocalDate;

import fp.utiles.Checkers;



public class Partida implements Comparable<Partida>{
	
	private String mapa;
	private Integer year;
	private LocalDate date;
	private Double matchTime; 
	private Integer teamARounds;
	private Integer teamBRounds;
	private Integer kills;
	private Integer deaths;
	private Integer mvp;
	private Integer points;
	private Resultado resultadoPartida;
	private Boolean kdRatio;
	private String id;
	
	//Propiedad derivada
	public Double getKillsPorSegundo() {
		return kills / matchTime;
	}
	
	public Partida(String mapa, Integer year, LocalDate date, Double matchTime, Integer teamARounds,
			Integer teamBRounds, Integer kills, Integer deaths, Integer mvp, Integer points, Resultado resultadoPartida,
			Boolean kdRatio, String id) {
		super();
		
		
		
		if (year<2015) {
			throw new IllegalArgumentException("El año debe ser mayor o igual que 2015");
		}
		 
		Checkers.checkNoNull(date); 
		Checkers.checkNoNull(year);
		Checkers.checkNoNull(matchTime);
		Checkers.checkNoNull(teamARounds);
		Checkers.checkNoNull(teamBRounds);
		Checkers.checkNoNull(kills);
		Checkers.checkNoNull(deaths);
		Checkers.checkNoNull(mvp);
		Checkers.checkNoNull(points);
		Checkers.checkNoNull(resultadoPartida);
		Checkers.checkNoNull(kdRatio);
		Checkers.checkNoNull(id);


		Checkers.check("El mapa no puede ser vacío",
				!mapa.isEmpty());
		
		Checkers.check("Los puntos deben ser positivos", points>= 0);
		
		Checkers.check("La duracion de la partida debe ser mayor que 0", matchTime> 0);
		
		Checkers.check("La id del jugador debe tener más de 5 caracteres",id.length() >5);
		
	
		
		this.mapa = mapa;
		this.year = year;
		this.date = date;
		this.matchTime = matchTime;
		this.teamARounds = teamARounds;
		this.teamBRounds = teamBRounds;
		this.kills = kills;
		this.deaths = deaths;
		this.mvp = mvp;
		this.points = points;
		this.resultadoPartida = resultadoPartida;
		this.kdRatio = kdRatio;
		this.id = id;
	}
	

	public Partida(Integer year, LocalDate date, Double matchTime, Integer teamARounds, Integer teamBRounds,
			Integer kills, Integer deaths, Integer points, Boolean kdRatio) {
		
		
		super();
		if (year<2015) {
			throw new IllegalArgumentException("El año debe ser mayor o igual que 2015");
		}
		 
		Checkers.checkNoNull(date); 
		Checkers.checkNoNull(year);
		Checkers.checkNoNull(matchTime);
		Checkers.checkNoNull(teamARounds);
		Checkers.checkNoNull(teamBRounds);
		Checkers.checkNoNull(kills);
		Checkers.checkNoNull(deaths);
		Checkers.checkNoNull(points);
		Checkers.checkNoNull(kdRatio);
		
		
		Checkers.check("Los puntos deben ser positivos", points> 0);
		
		Checkers.check("La duracion de la partida debe ser mayor que 0", matchTime> 0);
		

		
		this.mapa = "Dust II";
		this.year = year;
		this.date = date;
		this.matchTime = matchTime;
		this.teamARounds = teamARounds;
		this.teamBRounds = teamBRounds;
		this.kills = kills;
		this.deaths = deaths;
		this.mvp = 2;
		this.points = points;
		this.resultadoPartida = Resultado.WIN;
		this.kdRatio = kdRatio;
		this.id = "Blackewe216";
		
		
		
		
	}


	public Partida() {
	}

	public String getMapa() {
		return mapa;
	}


	public void setMapa(String mapa) {
		Checkers.check("El mapa no puede ser vacío",
				!mapa.isEmpty());
		this.mapa = mapa;
	}


	public Integer getYear() {
		return year;
	}


	public void setYear(Integer year) {
		Checkers.checkNoNull(year);
		if (year<2015) {
			throw new IllegalArgumentException("El año debe ser mayor o igual que 2015");
		}
		this.year = year;
	}


	public LocalDate getDate() {
		return date;
	}


	public void setDate(LocalDate date) {
		Checkers.checkNoNull(date); 
		this.date = date;
		 

	}


	public Double getMatchTime() {
		return matchTime;
	}


	public void setMatchTime(Double matchTime) {
		Checkers.checkNoNull(matchTime);
		Checkers.check("La duracion de la partida debe ser mayor que 0", matchTime> 0);
		this.matchTime = matchTime;
	}


	public Integer getTeamARounds() {
		return teamARounds;
	}


	public void setTeamARounds(Integer teamARounds) {
		Checkers.checkNoNull(teamARounds);
		this.teamARounds = teamARounds;
	}


	public Integer getTeamBRounds() {
		return teamBRounds;
	}


	public void setTeamBRounds(Integer teamBRounds) {
		Checkers.checkNoNull(teamBRounds);
		this.teamBRounds = teamBRounds;
	}


	public Integer getKills() {
		return kills;
	}


	public void setKills(Integer kills) {
		Checkers.checkNoNull(kills);
		this.kills = kills;
	}


	public Integer getDeaths() {
		return deaths;
	}


	public void setDeaths(Integer deaths) {
		Checkers.checkNoNull(deaths);
		this.deaths = deaths;
	}


	public Integer getMvp() {
		return mvp;
	}


	public void setMvp(Integer mvp) {
		Checkers.checkNoNull(mvp);
		this.mvp = mvp;
	}


	public Integer getPoints() {
		return points;
	}


	public void setPoints(Integer points) {
		Checkers.checkNoNull(points);
		Checkers.check("Los puntos deben ser positivos", points> 0);
		this.points = points;
	}


	public Resultado getResultadoPartida() {
		return resultadoPartida;
	}


	public void setResultadoPartida(Resultado resultadoPartida) {
		Checkers.checkNoNull(resultadoPartida);
		this.resultadoPartida = resultadoPartida;
	}


	public Boolean getKdRatio() {
		return kdRatio;
	}


	public void setKdRatio(Boolean kdRatio) {
		Checkers.checkNoNull(kdRatio);
		this.kdRatio = kdRatio;
	}


	public String getId() {
		return id;
	}
	


	public void setId(String id) {
		Checkers.checkNoNull(id);
		Checkers.check("La id del jugador debe tener más de 5 caracteres",id.length() >5);
		this.id = id;
	}
	
	
	@Override
	public String toString() {
		return "Partida [mapa=" + mapa + ", year=" + year + ", date=" + date + ", matchTime=" + matchTime
				+ ", teamARounds=" + teamARounds + ", teamBRounds=" + teamBRounds + ", kills=" + kills + ", deaths="
				+ deaths + ", mvp=" + mvp + ", points=" + points + ", resultadoPartida=" + resultadoPartida
				+ ", kdRatio=" + kdRatio + ", id=" + id + "]";
	}

	

	

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((date == null) ? 0 : date.hashCode());
		result = prime * result + ((mapa == null) ? 0 : mapa.hashCode());
		result = prime * result + ((matchTime == null) ? 0 : matchTime.hashCode());
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
		Partida other = (Partida) obj;
		if (date == null) {
			if (other.date != null)
				return false;
		} else if (!date.equals(other.date))
			return false;
		if (mapa == null) {
			if (other.mapa != null)
				return false;
		} else if (!mapa.equals(other.mapa))
			return false;
		if (matchTime == null) {
			if (other.matchTime != null)
				return false;
		} else if (!matchTime.equals(other.matchTime))
			return false;
		return true;
	}


	public int compareTo(Partida o) {
		int res;
		if (o==null) {
			throw new NullPointerException();
		}
		res = getDate().compareTo(o.getDate());
		if (res == 0) {
			res = getMapa().compareTo(o.getMapa());
			if (res==0) {
				res = getMatchTime().compareTo(o.getMatchTime());
			}
		}
		return res;
	
	}	
	

	
		
	

}
