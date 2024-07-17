using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace Practica6Soft
{
    internal class Program
    {
        static void Main(string[] args)
        {
            String line;
            try
            {

                //Pasamos el nombre del fichero y la ruta al constructor
                StreamReader sr = new StreamReader("C:\\Ejemplo consola pi\\ejemplo.txt");
                //Leemos la primera línea de texto
                line = sr.ReadLine();
                //Continuamos leyendo hasta final de fichero
                while (line != null)

                {
                    //escribimos la línea en una consola windows
                    Console.WriteLine(line);
                    //Leemos las siguientes lineas
                    line = sr.ReadLine();
                }
                //cerramos fichero
                sr.Close();
                Console.ReadLine();
            }
            catch (Exception e)
            {
                Console.WriteLine("Exception: " + e.Message);
            }
            finally
            {
                Console.WriteLine("Executing finally block.");
            }
        }
    }
}
