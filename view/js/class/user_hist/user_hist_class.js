class user_hist_class {

    constructor(id_user, gmail, NIF, name, surname, password, admin, active) {
        this.id_user = id_user;
        this.gmail = gmail;
        this.NIF = NIF;
        this.name = name;
        this.surname = surname;
        this.password = password;
        this.admin = admin;
        this.active = active;
    }

    // method //
    show_user_Hist() {
        console.log(this);
    }

    // enviar informacion al controlador //
    async fetch_set_data_user_Hist(url,data) {
        try {
            const res = await fetch (
                url, {
                method: 'POST',
                body: JSON.stringify(data), 
                headers:{'Content-Type': 'application/json'}
            })
            const datos = await res.json()
            alert(datos.error);
        } catch(err) {
            alert(err);
        }
    }

    // recibir datos del servidor //
    async fetch_load_user_Hist(url,data) {
        try {
            const res = await fetch (
                url, {
                method: 'POST',
                body: JSON.stringify(data), 
                headers:{'Content-Type': 'application/json'}
            })
            const datos = await res.json()
        } catch(err) {
            alert(err);
        }
    }

}

export { user_hist_class };