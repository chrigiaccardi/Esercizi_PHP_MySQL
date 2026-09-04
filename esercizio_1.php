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
        // Creazione ed inserimento della tabella popolata da dati (Query SELECT)
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
            `;
            // Andiamo a inserire la tabella creata nell'html dentro il suo container
            // Selezioniamo l'elemento HTML
            let tabellaContainer = document.querySelector("#tabella-container");
            // Utilizziamo il metodo insertAdjacentHTML per inserire prima della fine del container la tabella
            tabellaContainer.insertAdjacentHTML("beforeend", tabella);
        })
        .catch((error) => {
            console.error("Errore: " , error);
        });

        function generaRighe(persone){
            let righe = '';
            // Creiamo un foreach dove per ogni persona creiamo dinamicamente una riga html
            persone.forEach(persona => {
                // I due bottoni per ogni riga servono per modificare e eliminare la riga. data-val ci serve per capire l'id della persona selezionata
                let riga = `
                    <tr>
                        <td>${persona.id}</td>
                        <td>${persona.nome}</td>
                        <td>${persona.cognome}</td>
                        <td>${persona.email}</td>
                        <td>
                            <button class="modifica-persona" data-val="${persona.id}">Modifica</button>
                            <button class="elimina-persona" data-val="${persona.id}">Elimina</button>
                            
                        </td>
                    </tr>
                `;
                // Ogni riga viene aggiunta alla stringa righe: sono stringhe "html" che poi verranno ritornate alla tabella
                righe += riga;
            });
            // Ritorniamo le righe che verranno inserite all'interno della tabella
            return righe;
        };

        // Recupero valori per l'inserimento (Query INSERT INTO)

        const formData = new FormData();
        formData.append('nome', 'Chiara');
        formData.append('cognome', 'Becchio');
        formData.append('email', 'c.b.2003@gmoail.com');

        fetch('./php/select.php', {
            method: 'POST',
            header: {
                'Content-Type': 'application/json'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Dati Inviati: ', data);
        })
        .catch((error) => {
            console.error("Errore: " , error);
        });

    </script>

</body>
</html>