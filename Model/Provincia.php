<?php
/**
* Vista modelo provincia
*/
class Provincia {
    private $id;
    private $nombres;

    //Constructor de la provincia
    function __construct($id, $nombres)
    {
        $this->setId($id);
        $this->setNombres($nombre);
        
    }

    //Getters y setters de provincia
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

    public function setNombre($nombre){
		$this->nombre = $nombre;
	}

    // Inserta valores nuevos a la tabla provincia
    public static function save($provincia){
        $db=Db::getConnect();
        
        $insert=$db->prepare('INSERT INTO provincia VALUES (NULL, :nombre)');
        $insert->bindValue('nombre',$provincia->getNombre());
        $insert->execute();
    }

    /* Hace una consulta devolviendo los datos del empleado 
	 * y ordenándolos por su id
	 */
    public static function all(){
        $db=Db::getConnect();
        $listaProvincias=[];

        $select=$db->query('SELECT * FROM provincia order by id');

        foreach($select->fetchAll() as $provincia){
            $listaProvincias[]=new Provincia($provincia['id'],$provincia['nombre']);
        }
        return $listaProvincias;
    }
}
?>