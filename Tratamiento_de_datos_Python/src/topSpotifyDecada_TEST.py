from topSpotifyDecada import *



def test_canciones_por_artista():
    print('\nTest de la funcion canciones_por_artista')
    artista = canciones_por_artista(canciones, 'Usher')
    print ('Hay', len(artista), 'Canciones de Usher en la lista')


def test_conjunto_de_generos():
    print('\nTest de la funcion conjunto_de_generos')
    conjunto = conjunto_de_generos(canciones)
    print ('Hay', len(conjunto), 'generos en la lista')
    
    
def test_umbral_duracion():
    print('\nTest de la funcion umbral_duracion')
    umbral = umbral_duracion(canciones)
    print("El total de popularidad de las canciones de más de 217 segundos es", umbral)
    
def test_animo_medio():
    print('\nTest de la funcion animo_medio')
    animo = animo_medio_por_genero(canciones)
    print(animo)


def test_bpm_maximo():
    print('\nTest de la funcion bpm_maximo')
    maximo = bpm_maximo(canciones)
    print("El bpm máximo de la lista pertenece a la cancion:", maximo)
    
    
def test_top_canciones_por_genero():
    print('\nTest de la funcion top_canciones_por_genero')
    top = top_canciones_por_genero(canciones, 10)
    print("Las canciones más populares del género Dance Pop son:", top)
    
def test_diccionario_genero():
    print('\nTest de la funcion test_diccionario_genero')
    dict_gen = diccionario_genero(canciones)
    for genero in dict_gen:
        print('   ', genero, '-', len(dict_gen))    

    for c in dict_gen:
        for x in dict_gen[c]:
            print(x)   


def test_diccionario_bpm_max():
    print('\nTest de la funcion diccionario_bpm_max')
    dict_bpm = diccionario_bpm_max(canciones)
    print(dict_bpm)
    
    
    
def test_mostrar_distribucion_generos():
    print ('\nTest de la funcion mostrar_distribucion_generos')
    tarta=mostrar_distribucion_generos(canciones)
    print(tarta)
    
    
    
def test_dibuja_canciones_por_artista():
    print('\nTest de la funcion dibuja_canciones_por_artista')
    barras = dibuja_canciones_por_artista(canciones)
    print(barras)
    
    

if __name__ == '__main__':
    canciones = lee_canciones('../data/top10s.csv')
    for f in canciones[:10]:
        print(f) 


    #test_canciones_por_artista()
    #test_conjunto_de_generos()
    #test_umbral_duracion()
    #test_animo_medio()
    #test_bpm_maximo()
    #test_top_canciones_por_genero()
    #test_diccionario_genero()
    #test_diccionario_bpm_max()
    test_mostrar_distribucion_generos()
    #test_dibuja_canciones_por_artista()




    