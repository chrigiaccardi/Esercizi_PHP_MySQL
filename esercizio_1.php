<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione Tabella CRUD</title>
</head>
<body>
    <div id="tabella-container"></div>
    
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
            console.log('Dati Ricevuti: ', data);
            // Creiamo la tabella dinamicamente
            let tabella = `
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
                        ${generaRighe(data)}
                    </tbody>
                </table>
            `
        })
        .catch((error) => {
            console.error("Errore: " , error);
        });

        function generaRighe(persone){
            let righe = '';
            // Creiamo un foreach dove per ogni persona creiamo dinamicamente una riga html
            persone.foreach(persona => {
                // I due bottoni per ogni riga servono per modificare e eliminare la riga. data-val ci serve per capire l'id della persona selezionata
                let riga = `
                    <tr>
                        <td>${persona.id}</td>
                        <td>${persona.nome}</td>
                        <td>${persona.cognome}</td>
                        <td>${persona.email}</td>
                        <td>
                            <button class="modifica-persona" data-val="${persona.id}"></button>
                            <button class="elimina-persona" data-val="${persona.id}></button>
                            
                        </td>
                    </tr>
                `;
                // Ogni riga viene aggiunta alla stringa righe: sono stringhe "html" che poi verranno ritornate alla tabella
                righe += riga;
            });
            // Ritorniamo le righe che verranno inserite all'interno della tabella
            return righe;
        }
    </script>

</body>
</html>