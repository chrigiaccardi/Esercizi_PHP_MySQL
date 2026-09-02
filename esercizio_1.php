<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione Tabella CRUD</title>
</head>
<body>
    <div id="tabella-container"></div>
    <table>
        <thead>
            <button id="nuova-riga">Inserisci Nuova Persona</button>
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>COGNOME</td>
                <td>EMAIL</td>
                <td>
                </td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script>
        let persone;

        fetch('./php/select.php', {
            method: 'POST',
            header: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            persone = data;
            console.log('Dati Ricevuti: ', data)
        })
        .catch((error) => {
            console.error("Errore: " , error);
        });
    </script>

</body>
</html>