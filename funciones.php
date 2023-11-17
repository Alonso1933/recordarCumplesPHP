<?php
    function cumplesHoy() {
        require "./conexion.php";
    
        $dia = date("d");
        $mes = date("m");
        // $dia = "15";
        // $mes = "09";
    
        // Consulta para obtener los cumpleaños del día actual
        $query = "SELECT SUBSTRING_INDEX(nombre, ' ', 1) AS primer_nombre, nombre, celular FROM amigos WHERE DAY(cumple) = :dia AND MONTH(cumple) = :mes";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':dia', $dia);
        $stmt->bindParam(':mes', $mes);
        $stmt->execute();
        $cumples = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (empty($cumples)) {
            return "<h4>Nadie cumple años hoy 🐱‍👤</h4>";
        } else {
            $res = "<h4>Alguien cumple hoy 🐱‍👤</h4>";
            $res .= "
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Felicitar 🎉</th>
                    </tr>
                </thead>
        
                <tbody>";
    
            foreach ($cumples as $cumple) {
                $res .= "
                    <tr>
                        <td>{$cumple['nombre']}</td>
                        <td>
                            <button>
                                <a href='https://wa.me/{$cumple['celular']}?text=Hola%20{$cumple['primer_nombre']}%20:D,%20espero%20que%20l%20estés%20pasando%20genial,%20te%20deseo%20un%20feliz%20cumpleaños' target='_blank'>
                                    <img class='btn-wh' src='https://cdn-icons-png.flaticon.com/128/3536/3536445.png' alt='Felicitar'>
                                </a>
                            </button>
                        </td>
                    </tr>";
            }
    
            $res .= "    
                </tbody>
            </table>";
            return $res;
        }
    }
    

    function registrarAmigo($nombre, $celular, $cumple) {
        require "./conexion.php";
        $insert = "INSERT INTO amigos (nombre, celular, cumple) VALUES (:nombre, :celular, :cumple)";
        $exeInsert = $pdo->prepare($insert);
        $exeInsert->bindParam(':nombre', $nombre);
        $exeInsert->bindParam(':celular', $celular);
        $exeInsert->bindParam(':cumple', $cumple);
        $exeInsert->execute();
    }


?>