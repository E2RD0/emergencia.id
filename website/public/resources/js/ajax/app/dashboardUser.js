let endPoint = HOST_NAME + HOME_PATH + "api/app/perfil.php?action=";
let endPointU = HOST_NAME + HOME_PATH + "api/app/perfilUsuario.php?action=";
const dashboardUser = new Vue({
    el: "#dashboard",

    data() {
        return {
            redirect: HOST_NAME + HOME_PATH + "app/profile/edit/",
            newProfile: "Nuevo perfil",
            show: [],
            ShowShared: [],
        }
    },
    created: function() {
        this.showprofiles();
        this.showprofilesShared();
    },
    methods: {
        createNewProfile: function() {
            this.newProfile = "Cargando..."
            axios.get(endPoint + "newProfile").then((response) => {
                this.newProfile = "Nuevo perfil"
                window.location = this.redirect + response.data.id_perfil_medico;
                console.log(response.data[0].id_perfil_medico)
                console.log(response)
            });
        },
        showprofiles: function() {
            axios.get(endPointU + "getshowProfile")
                .then((response) => {
                    this.show = response.data
                })
        },
        showprofilesShared: function() {
            axios.get(endPointU + "getshowProfileShared")
                .then((response) => {
                    this.ShowShared = response.data
                })
        },
        redirectToEdit: function(parameter) {
            window.location = this.redirect + parameter;
        }
    },
})

//<?= HOME_PATH ?>resources/images/default-perfil.svg
