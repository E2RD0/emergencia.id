let endPoint = "http://localhost" + HOME_PATH + "api/app/perfil.php?action=";   
let endPointU = "http://localhost" + HOME_PATH + "api/app/perfilUsuario.php?action=";  
const dashboardUser = new Vue({
    el: "#dashboard",
    
    data() {
        return {
            redirect: 'http://localhost' + HOME_PATH + "app/profile/edit/",
            newProfile: "Nuevo perfil",
            show: []
        }
    },
    created: function () {
        this.showprofiles();
    },
    methods: {
        createNewProfile: function() {
            this.newProfile = "Cargando..."
            axios.get(endPoint + "newProfile").then((response) => {
                this.newProfile = "Nuevo perfil"
                window.location = this.redirect + response.data[0].id_perfil_medico;
                console.log(response.data[0].id_perfil_medico)
            });
        },
        showprofiles: function () {
            axios.get(endPointU + "getshowProfile")
            .then((response)=>{
                this.show = response.data
            })
        },
        redirectToEdit: function(parameter){
            window.location = this.redirect + parameter;
        }
    },
})

//<?= HOME_PATH ?>resources/images/default-perfil.svg