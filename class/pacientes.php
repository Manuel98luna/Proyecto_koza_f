<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    //Muestra los datos en la tabla
    public function dataview($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute() > 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Apellido']; ?></td>
                <td><?php echo $row['Genero']; ?></td>
                <td><?php echo $row['Edad']; ?></td>
                <td><?php echo $row['Telefono']; ?></td>
                <td><?php echo $row['Direccion']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td>
                    <a class="btn btn-large btn-success" href="edit_paciente.php?edit_id=<?php echo $row['id'] ?>"> Editar</a>
                </td>
                <td>
                    <a class="btn btn-large btn-danger" href="eliminar_paciente.php?delete_id=<?php echo $row['id'] ?>"><i class="fa-trash" aria-hidden="true"></i> eliminar</a>
                </td>
            </tr>

<?php

        }
    }

    public function update($id, $Nombre, $Apellido, $Genero,$Edad, $Telefono,$Direccion,$Email)
    {
        try {
            $stmt = $this->db->prepare("UPDATE pacientes SET Nombre=:Nombre, Apellido=:Apellido, Genero=:Genero, Edad=:Edad, Telefono=:Telefono,Direccion=:Direccion,Email=:Email
            WHERE id=:id");
            $stmt->bindparam(":Nombre", $Nombre);
            $stmt->bindparam(":Apellido", $Apellido);
            $stmt->bindparam(":Genero", $Genero);
            $stmt->bindparam(":Edad", $Edad);
            $stmt->bindparam(":Telefono", $Telefono);
            $stmt->bindparam(":Direccion", $Direccion);
            $stmt->bindparam(":Email", $Email);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getID($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM pacientes WHERE id=:id");
        $stmt->execute(array(":id" => $id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pacientes WHERE id=:id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return true;
    }
}
