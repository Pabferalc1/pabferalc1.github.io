import csv
from matplotlib import pyplot as plt
from collections import namedtuple, Counter
from datetime import datetime





Cancion = namedtuple('Cancion', 'titulo, artista, genero, bpm, animo, duracion, acustico, popularidad, fecha')

'Bloque 1'

def lee_canciones(fichero):
    with open(fichero, encoding='utf-8') as f:
        lector=csv.reader(f, delimiter=';')
        next(lector)
        canciones = [Cancion(titulo, artista, genero, int(bpm), int(animo), int(duracion), int(acustico), int(popularidad),
                      datetime.strptime(fecha, "%d/%m/%Y").date()) for posicion, titulo, artista, genero,
                      bpm, energia, bailabilidad, ruido, vivo, animo, duracion, acustico, palabras, popularidad, fecha in lector]
    return canciones

'Bloque 2'

def canciones_por_artista(canciones, artista):
    return [(titulo, artist, genero) for titulo, artist, genero, _, _, _, _, _, _ in canciones if artist == artista ]



def conjunto_de_generos(canciones):
    return set(c.genero for c in canciones)


'Bloque 3'

def umbral_duracion(canciones, duracion = 217):
    return sum(popularidad for _, _, _, _, _, duration, _, popularidad, _ in canciones if duration >= duracion)
    
    
    
def animo_medio_por_genero(canciones, genero = 'pop'):
    canciones_por_genero = [(gen, animo) for _, _, gen, _, animo, _, _, _, _ in canciones if gen==genero]
    if len(canciones_por_genero) == 0:
        return 0
    else:
        animo_total = 0
        for cancion in canciones_por_genero:
            animo_total = cancion[1] + animo_total
        resultado = animo_total/len(canciones_por_genero)
    return resultado




'Bloque 4'

def bpm_maximo(canciones):
    return max(((titulo, artista, bpm) for titulo, artista, _, bpm, _, _, _, _, _ in canciones), key = lambda n:n[2])



'Bloque 5'

def top_canciones_por_genero(canciones, limite=10, genero = 'dance pop'):
    return sorted(list((titulo, artista) for titulo, artista, gen, _, _, _, _, _, _ in canciones if gen==genero), key=lambda n:n[1],
                   reverse = True) [:limite]


'Bloque 6'


def diccionario_genero(canciones, genero = 'irish singer-songwriter'):
    lista_genero = list(c for c in canciones if c.genero==genero)
    diccionario = dict()
    for c in lista_genero:
        if c.genero in diccionario:
            diccionario[c.genero].append(c)
        else:
            diccionario[c.genero] = [c]
    return diccionario


def diccionario_bpm_max(canciones):
    diccionario = dict()
    for c in canciones:
        clave = c.genero
        if clave in diccionario:
            diccionario[clave] += c.bpm
        else:
            diccionario[clave] = c.bpm 
    return max(diccionario.items(), key = lambda n:n[1])



'Bloque 7'


def mostrar_distribucion_generos(canciones):
    frec_genero = Counter(c.genero for c in canciones)
    plt.pie(frec_genero.values(), labels=frec_genero.keys(), autopct='%1.1f%%', shadow=True, startangle=90)
    plt.legend()
    plt.show()
    
    
def dibuja_canciones_por_artista(canciones):
    artistas=[]
    for c in canciones:
        if c.artista in artistas:
            continue
        else:
            artistas.append(c.artista)
    num_canciones = []
    
    for artista in artistas:
        num_canciones.append(len(canciones_por_artista(canciones, artista)))
    plt.barh(range(len(num_canciones)), num_canciones, tick_label=artistas)
    plt.show()











