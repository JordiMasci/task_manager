Ecco un'idea di progetto per te: "Sistema di Gestione dei Compiti (Task Manager)".

1. Descrizione del progetto
   L'applicazione è un task manager semplice, che permette agli utenti di:

Registrarsi e accedere
Creare, leggere, aggiornare e cancellare (CRUD) i compiti
Aggiungere priorità e scadenze ai compiti
Filtrare i compiti per stato, data o priorità 2. Struttura del progetto
Suddividi il progetto in queste principali componenti:

2.1. Classi principali
Utente: rappresenta un utente con proprietà come id, username, password e metodi per la registrazione e il login.
Task (Compito): rappresenta un compito con proprietà come id, titolo, descrizione, scadenza, priorità, stato.
Database: una classe per gestire le connessioni al database in modo sicuro, con metodi per le query CRUD.
2.2. Concetti OOP da implementare
Ereditarietà: Puoi ad esempio avere una classe base Database e poi derivare da essa classi come UserModel e TaskModel per gestire le operazioni specifiche.
Incapsulamento: Rendi le proprietà delle classi private e usa metodi getter/setter per manipolarle.
Interfacce e polimorfismo: Se riesci, usa un’interfaccia per definire il comportamento CRUD. 3. Struttura delle Cartelle
Organizza le cartelle per una migliore gestione del codice:

/app → contiene le classi principali (User.php, Task.php, Database.php)
/controllers → controlla la logica di business (es. UserController.php, TaskController.php)
/views → contiene i file HTML/PHP per l’interfaccia utente
/models → modelli specifici per il database
/config → impostazioni di configurazione (es. dettagli di connessione al database) 4. Passi per lo Sviluppo
Ecco una guida passo-passo su come implementare il progetto:
