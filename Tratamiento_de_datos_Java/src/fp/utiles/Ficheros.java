package fp.utiles;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.List;

public class Ficheros {
	
	public static List<String> leerFichero(String ruta){
		List<String> res=null;
		try {
			res = Files.readAllLines(Paths.get(ruta));
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		res.remove(0);
		return res;
	}
	

}
