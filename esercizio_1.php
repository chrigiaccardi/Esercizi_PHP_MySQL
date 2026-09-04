<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione Tabella CRUD</title>
</head>
<body>
    <button id="nuova-riga">Inserisci Nuova Persona</button>
    <div id="tabella-container"></div>
    
    <script>
        // Creiamo l'event listener per la funzione inserisciPersona
        let inserisciBtn = document.querySelector('#nuova-riga');
        inserisciBtn.addEventListener('click', inserisciPersona);

        // Andiamo a inserire la tabella creata nell'html dentro il suo container
        // Selezioniamo l'elemento HTML
        let tabellaContainer = document.querySelector("#tabella-container");
        
        // Creazione ed inserimento della tabella popolata da dati (Query SELECT)
        let persone;

        // Creiamo una funzione per la SELECT così da potrla utilizzare anche come riaggiornamento
        // e la chiamiamo subito per avere la tabella non appena nasce la pagina

        generaTabella();

        function generaTabella(){
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
            // Utilizziamo il metodo insertAdjacentHTML per inserire prima della fine del container la tabella
            tabellaContainer.insertAdjacentHTML("beforeend", tabella);
        })
        .catch((error) => {
            console.error("Errore: " , error);
        });
        };
        

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

        function inserisciPersona(){
        // Recupero valori per l'inserimento (Query INSERT INTO)
        const formData = new FormData();
        formData.append('nome', 'Poldo');
        formData.append('cognome', 'Becchio');
        formData.append('email', 'poldo.miao.2023@gmoail.com');

        fetch('./php/insert.php', {
            method: 'POST',
            header: {
                'Content-Type': 'application/json'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Dati Inviati: ', data);
            let tabella = document.querySelector('table');
            tabellaContainer.removeChild(tabella)
            generaTabella();
        })
        .catch((error) => {
            console.error("Errore: " , error);
        });
        }


    </script>

</body>
</html>