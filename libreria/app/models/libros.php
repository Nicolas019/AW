<?php

class libros{

    private $db;

    public function __construct(){
        $this->db = new Base;
    }

    public function incluir($datos){
        $this->db->query('INSERT INTO libro (
            titulo, id_Autor, id_Genero, id_Editorial, precio, numero_Paginas, valoracion, resumen)
             VALUES (:titulo, :id_autor, :id_genero, :id_editorial, :precio, :num_pag, :valoracion, :resumen)');
        $this->db->bind(':titulo', $datos['titulo']);
        $this->db->bind(':id_autor', $datos['autor']);
        $this->db->bind(':id_genero', $datos['genero']);
        $this->db->bind(':id_editorial', $datos['editorial']);
        $this->db->bind(':precio', $datos['precio']);
        $this->db->bind(':num_pag', $datos['num_pag']);
        $this->db->bind(':valoracion', $datos['valoracion']);
        $this->db->bind(':resumen', $datos['resumen']);
        if($this->db->execute()){

            return true;
        }
        else{
            return false;
        }
    }

    public function eliminar($datos){
        $this->db->query('DELETE FROM libro WHERE id_Libro = :id');
        $this->db->bind(':id', $datos['id']);
        if($this->db->execute()){

            return true;
        }
        else{
            return false;
        }
    }

    public function modificarP($datos){
        $this->db->query('UPDATE  libro SET precio = :precio WHERE id_Libro = :id');
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':precio', $datos['precio']);
        if($this->db->execute()){

            return true;
        }
        else{
            return false;
        }
    }

    public function modificarV($datos){
        $this->db->query('UPDATE  libro SET valoracion = :valoracion WHERE id_Libro = :id');
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':valoracion', $datos['valoracion']);
        if($this->db->execute()){

            return true;
        }
        else{
            return false;
        }
    }

    public function mostrarTodos(){

        $this->db->query('SELECT L.id_Libro, L.titulo, L.precio, L.numero_Paginas, V.descripcionV,
        A.descripcionA, G.descripcionG, E.descripcionE FROM libro L 
        INNER JOIN autor A ON A.id_Autor = L.id_Autor
        INNER JOIN genero G ON G.id_Genero = L.id_Genero
        INNER JOIN valoracion V ON V.valoracion = L.valoracion
        INNER JOIN editorial E ON E.id_Editorial = L.id_Editorial' );
        return $this->db->registers();
    }

    public function buscarAutor($busqueda){
        $this->db->query('SELECT L.id_Libro, L.titulo, L.precio, L.numero_Paginas, V.descripcionV,
        A.descripcionA, G.descripcionG, E.descripcionE FROM libro L 
        INNER JOIN autor A ON A.id_Autor = L.id_Autor
        INNER JOIN genero G ON G.id_Genero = L.id_Genero
        INNER JOIN valoracion V ON V.valoracion = L.valoracion
        INNER JOIN editorial E ON E.id_Editorial = L.id_Editorial
        WHERE A.descripcionA LIKE  :buscar' );
        $this->db->bind(':buscar', '%' . $busqueda . '%');
        return $this->db->registers();
    }

    public function buscarTitulo($busqueda){
        $this->db->query('SELECT L.id_Libro, L.titulo, L.precio, L.numero_Paginas, V.descripcionV,
        A.descripcionA, G.descripcionG, E.descripcionE FROM libro L 
        INNER JOIN autor A ON A.id_Autor = L.id_Autor
        INNER JOIN genero G ON G.id_Genero = L.id_Genero
        INNER JOIN valoracion V ON V.valoracion = L.valoracion
        INNER JOIN editorial E ON E.id_Editorial = L.id_Editorial
        WHERE L.titulo LIKE  :buscar' );
        $this->db->bind(':buscar', '%' . $busqueda . '%');
        return $this->db->registers();
    }

    public function buscarGenero($busqueda){
        $this->db->query('SELECT L.id_Libro, L.titulo, L.precio, L.numero_Paginas, V.descripcionV,
        A.descripcionA, G.descripcionG, E.descripcionE FROM libro L 
        INNER JOIN autor A ON A.id_Autor = L.id_Autor
        INNER JOIN genero G ON G.id_Genero = L.id_Genero
        INNER JOIN valoracion V ON V.valoracion = L.valoracion
        INNER JOIN editorial E ON E.id_Editorial = L.id_Editorial
        WHERE G.descripcionG LIKE  :buscar' );
        $this->db->bind(':buscar', '%' . $busqueda . '%');
        return $this->db->registers();
    }

    public function buscarID($id){
        $this->db->query('SELECT L.id_Libro, L.titulo, L.precio, L.numero_Paginas, V.descripcionV,
        A.descripcionA, G.descripcionG, E.descripcionE FROM libro L 
        INNER JOIN autor A ON A.id_Autor = L.id_Autor
        INNER JOIN genero G ON G.id_Genero = L.id_Genero
        INNER JOIN valoracion V ON V.valoracion = L.valoracion
        INNER JOIN editorial E ON E.id_Editorial = L.id_Editorial
        WHERE L.id_Libro LIKE  :buscar' );
        $this->db->bind(':buscar', '%' . $id . '%');
        return $this->db->registers();


    }

    public function getOptionLibros($tipo){
        switch($tipo){
        case 'autor':
            $this->db->query('SELECT * FROM autor');
            return $this->db->registers();
        break;
        case 'genero':
            $this->db->query('SELECT * FROM genero');
            return $this->db->registers();
        break;
        case 'editorial':
            $this->db->query('SELECT * FROM editorial');
            return $this->db->registers();
        break;
        case 'valoracion':
            $this->db->query('SELECT * FROM valoracion');
            return $this->db->registers();
        break;
    }
    }

    public function mostrarResumen($busqueda){

        $this->db->query('SELECT L.id_Libro, L.titulo, L.precio, L.numero_Paginas, V.descripcionV,
        A.descripcionA, G.descripcionG, E.descripcionE, L.resumen FROM libro L 
        INNER JOIN autor A ON A.id_Autor = L.id_Autor
        INNER JOIN genero G ON G.id_Genero = L.id_Genero
        INNER JOIN valoracion V ON V.valoracion = L.valoracion
        INNER JOIN editorial E ON E.id_Editorial = L.id_Editorial
        WHERE L.id_Libro LIKE  :buscar' );
        $this->db->bind(':buscar', '%' . $busqueda . '%');
        return $this->db->registers();
    }

    public function incluirC($datos){
        $this->db->query('INSERT INTO comentario ( id_Libro, descripcionC) VALUES (:id, :comentario)');
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':comentario', $datos['comentario']);
        if($this->db->execute()){

            return true;
        }
        else{
            return false;
        }
    }

    public function eliminarC($datos){
        $this->db->query('DELETE FROM comentario WHERE id_Comentario = :id');
        $this->db->bind(':id', $datos['id']);
        if($this->db->execute()){

            return true;
        }
        else{
            return false;
        }
    }

    public function buscarCom($id){
        $this->db->query('SELECT L.id_Libro, C.descripcionC FROM comentario C 
        INNER JOIN libro L ON L.id_Libro = C.id_Libro
        WHERE C.id_Libro =  :buscar' );
        $this->db->bind(':buscar',  $id );
        return $this->db->registers();

    }

    public function mostrarTodosC(){

        $this->db->query('SELECT L.id_Libro, C.descripcionC FROM comentario C 
        INNER JOIN libro L ON L.id_Libro = C.id_Libro' );
        return $this->db->registers();
    }

    public function comparar($datos){
        $this->db->query('SELECT L.id_Libro FROM libro L 
        INNER JOIN autor A ON A.id_Autor = L.id_Autor
        INNER JOIN genero G ON G.id_Genero = L.id_Genero
        INNER JOIN valoracion V ON V.valoracion = L.valoracion
        INNER JOIN editorial E ON E.id_Editorial = L.id_Editorial
        WHERE L.titulo LIKE  :buscar' );
        $this->db->bind(':buscar', $datos['titulo']);
        return $this->db->registers();
    }

    

}