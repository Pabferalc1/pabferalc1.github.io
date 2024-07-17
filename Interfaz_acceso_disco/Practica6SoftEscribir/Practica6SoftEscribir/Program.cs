using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace Practica6SoftEscribir
{
    internal class Program
    {
        static void Main(string[] args)
        {
            try
            {

                //Pasamos el nombre del fichero y la ruta al constructor
                StreamWriter sw = new StreamWriter("C:\\Ejemplo consola pi\\ejemplo.txt");
                //Escribimos una línea de texto
                sw.WriteLine("¡Hola mundo!!!");
                //Escribimos la segunda línea de texto
                sw.WriteLine("desde la clase StreamWriter");
                //Cerramos fichero
                sw.Close();
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
