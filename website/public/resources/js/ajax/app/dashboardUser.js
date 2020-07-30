let endPoint = "http://localhost" + HOME_PATH + "api/app/perfil.php?action=";
console.log(HOME_PATH)
const dashboardUser = new Vue({
    el: "#dashboard",
    data() {
        return {
            redirect: 'http://localhost' + HOME_PATH + "app/profile/edit/",
            newProfile: "Nuevo perfil"
        }
    },
    methods: {
        createNewProfile: function() {
            this.newProfile = "Cargando..."
            axios.get(endPoint + "newProfile").then((response) => {
                this.newProfile = "Nuevo perfil"
                window.location = this.redirect + response.data[0].id_perfil_medico;
                console.log(response.data[0].id_perfil_medico)
            });
        }
    },
})